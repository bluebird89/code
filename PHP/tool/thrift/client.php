<?php

error_reporting(E_ALL);

require_once '../../vendor/autoload.php';

use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TSocket;
use Thrift\Transport\TBufferedTransport;
use Thrift\Exception\TException;

try {
	$transport = new TBufferedTransport(new TSocket('localhost', 8080));
	$protocol = new TBinaryProtocol($transport);
	$client = new \Greeter\GreeterClient($protocol);

	$transport->open();

	//同步方式进行交互
	$recv = $client->hello('Henry');
	echo "\n hello:".$recv." \n";

	//异步方式进行交互
	$client->send_hello('Henry');
	echo "\n send_hello \n";
	$recv = $client->recv_hello();
	echo "\n recv_hello:".$recv." \n";

	$transport->close();
} catch (TException $tx) {
	print 'TException: '.$tx->getMessage()."\n";
}
