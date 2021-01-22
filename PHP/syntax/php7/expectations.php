<?php

ini_set('assert.exception', 1);
ini_set('zend.assertions', 1);
assert(true, new AssertionError('Assertion failed.'));

$numValue = '123string';
assert('is_numeric_Value($numValue)' , "Assertion that $numValue is a number failed." );

$num = 10;
assert($num > 50 , new AssertionError("Assertion that $num is greater than 50 failed.") );
