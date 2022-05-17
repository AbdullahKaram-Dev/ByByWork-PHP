<?php

require  __DIR__.'/vendor/autoload.php';

$string = "
Serial#:CB8F73CA
Vendor:ZTEG
Model:V3.1
ProductCode:8224
CLEI:F663NV3a
RegistrationID:admin(fromONT)
ONUMAC:00-00-00-00-00-00
MTAMAC:00-00-00-00-00-00
CurrentSWversion:V1.0.0P1T6(committed)
AlternateSWversion:V1.0.0P1T6
PONport:5/3
Provisionedinformation:<none>


1ONTfound.
";
$new_string = str_replace(PHP_EOL, ' ', $string);
$string_trim = trim($new_string);
$string_trim = str_replace('   ','',$string_trim);
$new_data = explode(' ',$string_trim);
$finalResult = [];
foreach ($new_data as $str){
    $exploded_string = explode(':',$str);
    $finalResult[$exploded_string[0]] = (isset($exploded_string[1])) ? $exploded_string[1] : null;
}

/** if you wat get any element just pass it */
dump($finalResult['Serial#']);

dump($finalResult);


$items = ['a' => 1,'b' => 2,'c' => 3,'d' => 4,'e' => 5,'f' => 6];

dump(array_chunk(array:$items,length: 3,preserve_keys: true));


$array_one = ['a','b','c'];
$array_two = [1,2,3];
/**
 * this function take two elements first the keys and second the values
 * it will throw ann fatal error in php (8) if the numbers of key and values not the same
 */
dump(array_combine($array_one,$array_two));

$array = [-1,-2,3,4];                                                //ARRAY_FILTER_USE_KEY
$new_array = array_filter($array,fn($value,$key) => $value > 0,ARRAY_FILTER_USE_BOTH);
$new_array = array_values($new_array);
dump($new_array);


$keys = ['one' => 1,'two' => 2,'three' => 3];
dump(array_key_last($keys));

dump(array_key_first($keys));
/**
 * you can specify the value to get its key
 * you can also run strict mode by passing true or false 3 != '3' in strict mode
 */
dump(array_keys($keys,'3',false));


$ages1 = ['a' => 1,'b' => 2,3];
$ages2 = [4,5,6];
$ages3 = [7,8,9];

$new_ages = array_merge($ages1,$ages2,$ages3);
dump($new_ages);


$array = [0,'a',1,'c','d'];
dump(array_search('1',$array));
$key = array_search('0',$array,true);
if($key === false){
  dump("key not found");
}


class Collection extends stdClass
{
    public function __construct(protected array $data)
    {
    }

    public function toUpper():array|string
    {
        $this->data = array_map(function ($element){
            return strtoupper($element);
        },$this->data);
        return $this->data;
    }

}

$object = (new Collection(['abdullah','karam']))->toUpper();
dump($object);

/**
 * its showing diff between values only not keys
 */
$array1 = ['a' => 1222,'b' => 2,'c' => 3,'d' => 4,'e' => 5];
$array2 = ['a' => 22,'g' => 5,'1' => 6,'j' => 7,'k' => 8];
$array3 = ['l' => 3,'m' => 9,'n' => 10];

dump(array_diff($array1, $array2));

dump(array_diff($array2, $array1));

/**
 * its showing diff between keys and values
 */

dump(array_diff_assoc($array1,$array2));

/**
 * its showing diff between keys only
 */

dump(array_diff_key($array1,$array2));

$url = $_SERVER["SCRIPT_NAME"];
$break = Explode('/', $url);
$file = end($break);
$cachefile = 'cached-'.substr_replace($file ,"",-3).'html';
$cachetime = 18000;

dump($cachefile);


