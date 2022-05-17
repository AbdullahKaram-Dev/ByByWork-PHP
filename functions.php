<?php
declare(strict_types=1);

date_default_timezone_set('Africa/Cairo');

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

echo sum_three(10,20,20)."<br>";

/** anonymous function */
$arrowFunction = fn(int...$numbers): int => array_sum($numbers);
echo $arrowFunction(1,1,1)."<br>";

$random = mt_rand(1,100);
$anonymousFunction = function(int...$numbers) use (&$random){
 $random = 'random';
 return array_sum($numbers) .' random is '.$random;
};
echo $anonymousFunction(2,2,2)."<br>";
echo "random value is : $random"."<br>";

/** function named arguments */

function named_argument(string $first_name,string $last_name):string
{
    return $first_name.' '.$last_name."<br>";
}

echo named_argument(last_name: 'karam',first_name: 'abdullah')."<br>";

/** nested callable with splat operator in php */

function callableTest(callable $callable,array...$characters):string
{
    return call_user_func($callable,$characters);
}

$userNameCharacters = ['a','b','d','u','l','l','a','h'];

/** result :  (abdullah) */

echo callableTest(function ($characters){
    return implode('', $characters[0])."<br>";
    },$userNameCharacters);

/** try named arguments with built-in function in php */

$cookieValues = [
    'name' => 'foo',
    'value' => 'bar',
    'httponly' => true
];

function setCookieA(array $values):bool
{
    return setcookie(name:$values['name'],value:$values['value'],httponly:$values['httponly']);
}

var_dump(setCookieA($cookieValues)."<br>");



/** array map with anonymous function  */

$arr = [1,2,3,4,5,6];
$result = array_map(fn($number):int => ($number < 1) ? $number * 2 : $number,$arr);
echo "<pre>";
var_dump($result);





//function recursion($number)
//{
//    if ($number <= 100000) {
//        echo "$number <br/>";
//        recursion($number + 1);
//    }
//}
//
//$start_time = microtime(true);
//recursion(1);
//
//$end_time = microtime(true);
//echo ($end_time - $start_time);
//
//$start_time = microtime(true);
//for ($i=1;$i <= 100000;$i++){
//    echo "$i <br/>";
//}
//$end_time = microtime(true);
//echo ($end_time - $start_time);

function random()
{
    $randomNumber = mt_rand(0,9);
    if ($randomNumber === 9){
        echo $randomNumber;
        die();
    }
    echo "not equal 9".PHP_EOL;
    random();
}

random();

