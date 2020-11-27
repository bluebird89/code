<?php
/*
 * 使用PHPCLI模式运行
 * 命令：php start.php
 */
//设置网站聊天路径
define('_ROOT_', dirname(__FILE__));
//设置网站域名
define('_HOST_', '127.0.0.1/shop');
require_once _ROOT_.'/include/function.php';
//监听地址和端口
$server = new swoole_websocket_server("127.0.0.1", 9091);
//服务端接收连接事件
$server->on('open', function (swoole_websocket_server $server, $request) {
    //var_dump($request);
});
//服务端接收信息事件
$server->on('message', function (swoole_websocket_server $server, $frame) {
    $not=@explode('#?#^', $frame->data);
    //判断接收的类型
    switch ($not[0]) {
        case "open":
            global $client;
            $client=$not[1];
            if (!file_exists(_ROOT_.'/client/'.$not[1].'/'.$frame->fd.'.client')) {
                @file_put_contents(_ROOT_.'/client/'.$not[1].'/'.$frame->fd.'.client', $frame->fd);
            }
            $array=array(
                'type'=>'num',
                'msg'=>clearDir(_ROOT_.'/client/'.$client.'/'),
            );
            //设置json数据格式
            $data=json_encode($array);
            //上线通知同校的所有用户
            foreach (notice(_ROOT_.'/client/'.$client.'/') as $v) {
                $server->push($v, $data);
            }
                //读取聊天记录并遍历输出
                $res=record($client);
                foreach ($res as $value) {
                    $server->push($frame->fd, $value);
                }
        break;
        case "text":
            global $client;
            $re="<img src='http://"._HOST_."/Chat/face/$1.gif'/>";
            //替换表情
            $datas= preg_replace("/\{s:(\d+)\}/", $re, $not[1]);
            $data=array(
                'type'=>'text',
                'msg'=>$datas,
            );
            $data=json_encode($data);
            //写入聊天记录
            addrecord($client, $data);
            foreach (notice(_ROOT_.'/client/'.$client.'/') as $v) {
                $server->push($v, $data);
            }
            break;
        case "image":

            break;
    }
});

//服务端接收关闭事件
$server->on('close', function ($ser, $fd) {
    global $client;
    unlink(_ROOT_.'/client/'.$client.'/'.$fd.'.client');
    $array=array(
        'type'=>'num',
        'msg'=>clearDir(_ROOT_.'/client/'.$client.'/'),
    );
    $data=json_encode($array);
    //下线通知同校在线的所有人
    foreach (notice(_ROOT_.'/client/'.$client.'/') as $v) {
        $ser->push($v, $data);
    }
});
$server->start();
