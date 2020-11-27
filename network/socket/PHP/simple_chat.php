<?php

require '../../vendor/autoload.php';

use Workerman\Worker;
use PHPSocketIO\SocketIO;

$io = new SocketIO(2021);
$io->on('connection', function ($socket) use ($io) {
    $socket->on('chat message', function ($msg) use ($io) {
        $io->emit('chat message', $msg);
    });
});

Worker::runAll();
