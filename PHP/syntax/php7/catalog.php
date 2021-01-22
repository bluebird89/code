<?php
namespace Catalog;

class ClassA
{
    function hello()
    {
        return "Hello from classA";
    }
}

class ClassB
{
    function hello()
    {
        return "Hello from classB";
    }
}

class ClassC
{
    function hello()
    {
        return "Hello from classC";
    }
}

function fn_a()
{
    return "Message from fn_a()";
}

function fn_b()
{
    return "Message from fn_b()";
}

function fn_c()
{
    return "Message from fn_c()";
}

define("Catalog\ConstA", 1);
define("Catalog\ConstB", 2);
define("Catalog\ConstC", 3);
?>
