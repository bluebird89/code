<?php
set_time_limit(0);
require_once('socket.class.php');

$ws = new socket('127.0.0.1', '1234', 1000);
$ws->function['add'] = 'user_add_callback';
$ws->function['send'] = 'send_callback';
$ws->function['close'] = 'close_callback';
$ws->start_socket();

//回调函数们
function user_add_callback($ws)
{
    $data = count($ws->accept);
    send_to_all($data, 'num', $ws);
}

function close_callback($ws)
{
    $data = count($ws->accept);
    send_to_all($data, 'num', $ws);
}

function send_callback($data, $index, $ws)
{
    $data = json_encode(array(
                        'text' => $data,
                        'user' => $index,
                        ));
    send_to_all($data, 'text', $ws);
}

function send_to_all($data, $type, $ws)
{
    $res = array(
            'msg' => $data,
            'type' => $type,
            );
    $res = json_encode($res);
    $res = $ws->frame($res);
    foreach ($ws->accept as $key => $value) {
        socket_write($value, $res, strlen($res));
    }
}
