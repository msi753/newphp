<?php

/**
 * access global variables
 */
$message = 'Hello';

/** 사용 불가능
 * function foo() {
 *   echo $message;
 * }
 */

function foo1() {
    global $message;
    return $message;
}
echo foo1();    //Hello

function foo2() {
    $message = $GLOBALS['message'];
    return $message;
}
echo foo2();    //Hello

function foo3() {
    $GLOBALS['message'] = 'gloglo';
    $message = 'change';
}
foo3();
echo $message;    //gloglo

function foo4() {
    $message = &$GLOBALS['message'];
    $message = 'change';
}
foo4();
echo $message;    //change




/**
 * static variables
 */
function foo5() {
    static $count = 0;
    return ++$count;
}
echo foo5();    //1
echo foo5();    //2
echo foo5();    //3




/**
 * closure
 */
function foo6($arg) {
    return function() use ($arg) {   //foo6에서 parameter로 들어온 값을 사용하려면 use사용
        return $arg;
    };
}

$func = foo6('closure');
echo $func();   //closure