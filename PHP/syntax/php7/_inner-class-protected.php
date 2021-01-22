<?php

class Outer
{
    protected $a = 1;

    protected function getValue()
    {
        return 2;
    }

    public function inner()
    {
        return new class extends Outer {
            public function getFromOuter()
            {
                echo $this->a;
                echo "<br/>";
                echo $this->getValue();
            }
        };
    }
}

echo (new Outer)->inner()->getFromOuter();
?>

