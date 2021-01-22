<?php

class CustomException extends Exception
{
}

class CustomException_2 extends Exception
{
}

class MultiCatch
{
    public function test()
    {
        try {
            throw new CustomException_2();
        } catch (CustomException | CustomException_2 $e) {
            var_dump(get_class($e));
        }
    }
}

$multiCatch = new MultiCatch;
$multiCatch->test();
?>
