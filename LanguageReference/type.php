<?php
/**
 * 형변환
 */

 (String)true; //"0"
(String)false; //""

//(null)10; //불가능

(int)'Hello, world'; //0
(int)'50x';  //50
(int)true;   //1
(int)false;  //0
(int)null;  //0

(bool)10;   //true
(bool)[];   //false
(bool)'';   //false
(bool)null; //false

/**
 * 배열
 */
$message = [
    'Hello, world',
    'who are you?',
    'bye'
];

$message2 = array('Hello, world', 'Who are you?', 'Bye');

$message3 = [
    0 => 'Hello, world',
    'message' => 'who are you?',
    'bye'
];

/**
 * Destructing 비구조화(배열 분해) php7
 */
//list($message) = $message;  //'Hello, world'
//[$message] = $message;
//[0 => $message] = $message3;


//list(, $message) = $message;    //'who are you?'
//[, $message] = $message;
//['message', $message] = $message3;

/**
 * CRUD
 */
$message[] = 'whoops';
//$message[3] = 'whoops'; 상동

echo $message[3];   //whoops 입력

$message[3] = 'Do you know?';

echo $message[3];   //Do you know? 업데이트

unset($message[3]); //삭제