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

/** anonymous function */
$arrowFunction = fn(int...$numbers): int => array_sum($numbers) + 2222;
echo $arrowFunction(1,1,1).PHP_EOL;;

/** function named arguments */

function named_argument(string $first_name,string $last_name):string
{
    return $first_name.' '.$last_name.PHP_EOL;
}

echo named_argument(last_name: 'karam',first_name: 'abdullah');
echo "<br>";

/** nested callable with splat operator in php */

function callableTest(callable $callable,array...$characters):string
{
    return call_user_func($callable,$characters);
}

$userNameCharacters = ['a','b','d','u','l','l','a','h'];

/** result :  (abdullah) */

echo callableTest(function ($characters){
    return implode('', $characters[0]);
    },$userNameCharacters);