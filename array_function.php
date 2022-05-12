<?php

require  __DIR__.'/vendor/autoload.php';

$items = ['a' => 1,'b' => 2,'c' => 3,'d' => 4,'e' => 5,'f' => 6];

dd(array_chunk(array:$items,length: 3,preserve_keys: true));

