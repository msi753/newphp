<?php

/**
 * define function
 */

function foo()
{
    echo 'Hello';
}
foo();

/**
 * variables function 가변 함수
 */

$fn = 'foo';
$fn();

/**
 * parameter (매개변수)
 * 
 * # 함수의 정의 부분에 나열되어 있는 변수, 여기서는 plus 함수 정의시에 사용되는 a, b를 parameter(매개변수) 라고 한다.
 * def plus(a, b):
 *   return a + b

 * # 함수를 호출할때 전달 되는 실제 값, 여기서는 plus 라는 함수에 넣어주는 값 1, 2를 argument(전달인자)라고 한다.
 * result = plus(1, 2)
 */

/**
 * define function with rest parameters
 */
function foo2(...$args) {
    var_dump($args);
}
foo2('Hello', 'who', 'bye');

// array(3) {
//     [0]=>
//     string(5) "Hello"
//     [1]=>
//     string(3) "who"
//     [2]=>
//     string(3) "bye"
//   }

/**
 * call function with spread
 */
function foo3($args1, $args2) {
    var_dump($args1, $args2);
}
$args = ['Hello', 'who', 'bye'];
foo3(...$args);
// string(5) "Hello"
// string(3) "who"

/**
 * return 
 */
function foo4($is) {
    if($is) {
        return 'Hi';
    }
    return 'Bye';
}
echo foo4(true);    //Hi

/**
 * First class function 일급함수
 */
//익명함수
$foo = function() {
    return 'Anonymous';
};
echo $foo();    //Anonymous
//콜백함수
//parameter로 넘어온 함수를 실행시킨다.
function foo5($callback) {
    echo $callback();   //callback
}

foo5(
    function()
    {
        return 'callback';
    }
);


/**
 * higher-order function 고차함수
 * 함수를 리턴하는 함수
 */
function foo6() {
    return function(){
        return 'higher';
    };
}

$func = foo6(); //함수를 리턴
echo $func();   //higher



/**
 * arrow function 
 * php7.4
 */

$message7 = 'arrow';

function foo7($callback)
{
    echo $callback();
}

foo7(function() use($message7) {
    return $message7;
});
//arrow

foo7(fn() => $message7);    //use를 사용하지 않아도 됨
//arrow