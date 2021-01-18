<?php

function maxDepth()
{
    static $i = 0;
    print ++$i."\n";
    return 1 + maxDepth();
}

maxDepth();
