<?php

class Hello
{
    public function getCallback()
    {
        return [$this, 'hello_callback_function'];
    }

    public function hello_callback_function($name)
    {
        var_dump($name);
    }

    public function getClosure()
    {
        return Closure::fromCallable([$this, 'hello_callback_function']);
    }
}

$hello = new Hello();
$callback = $hello->getCallback();
$callback('Deepak');
$closure = $hello->getClosure();
$closure('Deepak');
