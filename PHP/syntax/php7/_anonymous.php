<?php

interface LogMsg
{
    public function setMsg(string $msg);
}

class ServerLogMsg implements LogMsg
{
    public function setMsg(string $msg)
    {
        echo $msg;
    }
}

class ServerLog
{
    private $logMsg;

    public function getLogMsg(): LogMsg
    {
        return $this->logMsg;
    }

    public function setLogMsg(LogMsg $logMsg)
    {
        $this->logMsg = $logMsg;
    }
}

$serverLog = new ServerLog;

$serverLog->setLogMsg(new ServerLogMsg());
var_dump($serverLog->getLogMsg());

$serverLog->setLogMsg(new class implements LogMsg {
    public function setMsg(string $msg)
    {
        echo $msg;
    }
});
var_dump($serverLog->getLogMsg());
?>

