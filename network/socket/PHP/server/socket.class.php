<?php
//Socket连接类
class socket
{

    /*
     * $cocket 存放的是所有用户的连接信息
     * $accept 存放的是每个用户的连接信息
     */

    //socket连接标识
    public $socket;

    //客户端连接的地址
    public $host = '127.0.0.1';

    //客户端连接的端口
    public $port = 1234;

    //客户端连接数
    public $maxuser = 1000;

    //客户端连接信息
    public $accept = array();

    //循环连接池
    public $cycle = array();

    //备用的客户端连接信息
    public $isHand = array();

    //回调函数
    public $function = array();

    //构造函数
    public function __construct($host, $port, $max)
    {
        $this->host = $host;
        $this->port = $port;
        $this->maxuser = $max;
    }

    //挂起socket
    public function start_socket()
    {
        $this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        //允许使用本地地址
        socket_set_option($this->socket, SOL_SOCKET, SO_REUSEADDR, true);
        //绑定ip和端口
        socket_bind($this->socket, $this->host, $this->port);
        //最多10个人连接，超过的客户端连接会返回WSAECONNREFUSED错误
        socket_listen($this->socket, $this->maxuser);
        //非堵塞模式
        while (true) {
            $this->cycle = $this->accept;//存放每个客户端的连接信息
            $this->cycle[] = $this->socket;
            //阻塞用，有新连接时才会结束
            /*
             * $sockets数组中存放的是文件描述符。当它有变化（就是有新消息到或者有客户端连接/断开）时，socket_select函数才会返回，继续往下执行。
             * $write是监听是否有客户端写数据，传入NULL是不关心是否有写变化。
             * $except是$sockets里面要被排除的元素，传入NULL是”监听”全部。
             * 最后一个是$sockets里面要被排除的元素，传入NULL是”监听”全部。
             */
            socket_select($this->cycle, $write, $except, null);
            foreach ($this->cycle as $k => $v) {
                if ($v === $this->socket) {
                    if (($accept = socket_accept($v)) < 0) {
                        continue;
                    }
                    //如果请求来自监听端口那个套接字，则创建一个新的套接字用于通信
                    $this->add_accept($accept);
                    continue;
                }
                $index = array_search($v, $this->accept);
                if ($index === null) {
                    continue;
                }
                if (!@socket_recv($v, $data, 10240, 0) || !$data) {//没消息的socket就跳过
                    $this->close($v);
                    continue;
                }
                if (!$this->isHand[$index]) {
                    $this->upgrade($v, $data, $index);
                    if (!empty($this->function['add'])) {
                        call_user_func_array($this->function['add'], array($this));
                    }
                    continue;
                }
                $data = $this->decode($data);
                if (!empty($this->function['send'])) {
                    call_user_func_array($this->function['send'], array($data, $index, $this));
                }
            }
            sleep(1);
        }
    }

    //增加一个初次连接的用户
    private function add_accept($accept)
    {
        $this->accept[] = $accept;
        $index = array_keys($this->accept);
        $index = end($index);
        $this->isHand[$index] = false;
    }

    //关闭一个连接
    private function close($accept)
    {
        $index = array_search($accept, $this->accept);
        socket_close($accept);
        unset($this->accept[$index]);
        unset($this->isHand[$index]);
        if (!empty($this->function['close'])) {
            call_user_func_array($this->function['close'], array($this));
        }
    }

    //响应升级协议
    private function upgrade($accept, $data, $index)
    {
        if (preg_match("/Sec-WebSocket-Key: (.*)\r\n/", $data, $match)) {
            $key = base64_encode(sha1($match[1] . '258EAFA5-E914-47DA-95CA-C5AB0DC85B11', true));
            $upgrade  = "HTTP/1.1 101 Switching Protocol\r\n" .
                    "Upgrade: websocket\r\n" .
                    "Connection: Upgrade\r\n" .
                    "Sec-WebSocket-Accept: " . $key . "\r\n\r\n";  //必须以两个回车结尾
            socket_write($accept, $upgrade, strlen($upgrade));
            $this->isHand[$index] = true;
        }
    }

    //体力活
    public function frame($s)
    {
        $a = str_split($s, 125);
        if (count($a) == 1) {
            return "\x81" . chr(strlen($a[0])) . $a[0];
        }
        $ns = "";
        foreach ($a as $o) {
            $ns .= "\x81" . chr(strlen($o)) . $o;
        }
        return $ns;
    }

    //体力活
    public function decode($buffer)
    {
        $len = $masks = $data = $decoded = null;
        $len = ord($buffer[1]) & 127;
        if ($len === 126) {
            $masks = substr($buffer, 4, 4);
            $data = substr($buffer, 8);
        } elseif ($len === 127) {
            $masks = substr($buffer, 10, 4);
            $data = substr($buffer, 14);
        } else {
            $masks = substr($buffer, 2, 4);
            $data = substr($buffer, 6);
        }
        for ($index = 0; $index < strlen($data); $index++) {
            $decoded .= $data[$index] ^ $masks[$index % 4];
        }
        return $decoded;
    }
}
