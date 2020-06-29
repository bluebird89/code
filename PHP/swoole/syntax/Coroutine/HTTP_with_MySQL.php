<?php

$http = new swoole_http_server("0.0.0.0", 9501);

$http->on('request', function ($request, $response) {
    $db = new Swoole\Coroutine\MySQL();
    $db->connect([
        'host' => '127.0.0.1',
        'port' => 3306,
        'user' => 'root',
        'password' => '123456Ac&',
        'database' => 'test',
    ]);
    $data = $db->query('select * from user');
    $response->end(json_encode($data));
    $db->close();
});

$http->start();

# http://127.0.0.1:9501
