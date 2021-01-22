<?php

class constants
{
    const A = 'A';
    public const B = 2;
    protected const C = 'C';
    private const D = 4;

    public function fn_a()
    {
        echo constants::A;
        echo "<br/>";
        echo constants::B;
        echo "<br/>";
        echo constants::C;
        echo "<br/>";
        echo constants::D;
        echo "<br/>";
        $this->fn_b();
    }

    private function fn_b()
    {
        echo constants::A;
        echo "<br/>";
        echo constants::B;
        echo "<br/>";
        echo constants::C;
        echo "<br/>";
        echo constants::D;
        echo "<br/>";
        $this->fn_c();
    }

    protected function fn_c()
    {
        echo constants::A;
        echo "<br/>";
        echo constants::B;
        echo "<br/>";
        echo constants::C;
        echo "<br/>";
        echo constants::D;
        echo "<br/>";
    }
}

class ClassA
{
    public function fn_a()
    {
        echo constants::A;
        echo "<br/>";
        echo constants::B;
        echo "<br/>";
//echo constants::C; Uncaught Error: Cannot access protected const constants::C
        echo "<br/>";
//echo constants::D;Uncaught Error: Cannot access private const constants::D
        echo "<br/>";
    }
}

class ClassB extends constants
{
    public function fn_d()
    {
        echo constants::A;
        echo "<br/>";
        echo constants::B;
        echo "<br/>";
        echo constants::C;
        echo "<br/>";
//echo constants::D;Uncaught Error: Cannot access private const constants::D
        echo "<br/>";
    }
}

$constants = new constants();
$constants->fn_a();
$classA = new ClassA();
$classA->fn_a();
$classB = new ClassB();
$classB->fn_d();
?>
