<?php

error_reporting(E_ALL);

require_once '../../vendor/autoload.php';

use Thrift\Exception\TException;
use Thrift\Factory\TTransportFactory;
use Thrift\Factory\TBinaryProtocolFactory;

use Thrift\Server\TServerSocket;
use Thrift\Server\TSimpleServer;

class GreeterHandler implements \Greeter\GreeterIf
{
	public function hello($name)
	{
		return '你好, '.$name;
	}
}

try {
	$handler = new GreeterHandler();
	$processor = new \Greeter\GreeterProcessor($handler);

	$transportFactory = new TTransportFactory();
	$protocolFactory = new TBinaryProtocolFactory(true, true);

	//作为cli方式运行，监听端口，官方实现
	$transport = new TServerSocket('localhost', 8080);
	$server = new TSimpleServer($processor, $transport, $transportFactory, $transportFactory, $protocolFactory,
		$protocolFactory);
	$server->serve();
} catch (TException $tx) {
	print 'TException: '.$tx->getMessage()."\n";
}
