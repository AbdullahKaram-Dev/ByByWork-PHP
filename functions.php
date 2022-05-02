<?php
declare(strict_types=1);
/** Splat Operator */
function sum(int...$numbers):int
{
   return array_sum($numbers);
}

echo sum(100,100,100,100).PHP_EOL;


function sum_two(int $param,int...$numbers):int
{
    return array_sum($numbers) + $param;
}

echo sum_two(200,100,100,100).PHP_EOL;

if(!function_exists('sum_three')){
    function sum_three(...$numbers):int
    {
        return array_sum($numbers);
    }
}

echo sum_three(10,20,20).PHP_EOL;

/** last update commit two */
