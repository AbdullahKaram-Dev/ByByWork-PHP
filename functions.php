<?php
declare(strict_types=1);
/** Splat Operator */
function sum(...$numbers):int
{
    $result = 0;
    foreach ($numbers as $number){
        $result += $number;
    }
    return $result;
}

echo sum(100,100,100,100);