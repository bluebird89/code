<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Oop\Trit\Person;
use Oop\Trit\Worker;

class WorkerTest extends TestCase
{
    public function testSay(Person $person)
    {
        $person->say();
    }

    public function testWorkerSay(Worker $worker)
    {
        $test = new WorkerTest();
        $worker->say();
    }
}

$docter = new Person('docter');

$worker = new Worker();
$test = new WorkerTest();
$test->testSay($docter);
$test->testWorkerSay($worker);
