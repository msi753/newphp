<?php
/**
 * 상수 
 * 한개만 선언해야한다.
 * define이나 const를 사용
 * 대문자
 * scope가 다름
 * const는 함수 내부에서 사용 불가능
 */

define('CONSTANT',  'Hello, world');

//( ! ) Notice: Constant CONSTANT already defined in D:\myeongsim\newphp\LanguageReference\constants.php on line 13
// const CONSTANT = [
//     'message' => 'Hello, world2'
// ];

function foo() {
    define('TKDNT',  'Hello, world3');
    //const TKDTN = 'Hello, world4'; 불가능
}

//콜백함수 (use를 쓸 필요가 없다.)
$foo2 = function() {
    return TKDNT;
};

var_dump(CONSTANT); //Hello, world
foo();
var_dump(TKDNT);    //Hello, world3
echo $foo2();       //Hello, world3



/**
 * Magic constants
 */

 echo __DIR__;      //D:\myeongsim\newphp\LanguageReference
 echo __FILE__;     //D:\myeongsim\newphp\LanguageReference\constants.php
 echo __LINE__;     //23