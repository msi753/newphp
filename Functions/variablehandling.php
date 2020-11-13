<?php

$message = 'hello';
gettype($message);  //string
settype($message, 'int');
echo $message;  //0
is_int($message);  //true(1)
is_string($message);    //false(0)

is_iterable([]);   //true(1)

$message = null;
echo empty($message);   //true(1)
echo empty($mskdlwe);   //true(1)   선언하지 않은 변수를 넣었을 때

strval(10); //int에서 string으로

$var = [
    'message' => 'hello'
];

print_r($var);
var_dump($var);
var_export($var);   //array ( 'message' => 'hello', )

print_r(serialize($var));  //a:1:{s:7:"message";s:5:"hello";}

get_defined_vars();
get_defined_constants();

const MESSAGE = 'HELLO, WORLD';
if(defined('MESSAGE')) {
    echo constant('MESSAGE');   //HELLO, WORLD
}
