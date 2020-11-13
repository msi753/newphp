<?php

/**
 * php에서는 다른 언어에서 쓰이는 오버로딩 불가능
 */
// function foo(string $msg) {}
// function foo(string $msg, int num) {}


function foo() {
    $argCount = func_num_args();    //넘어온 argument의 개수를 알 수 있다.
    switch($argCount) {
        case 1:
            echo func_get_arg(0);   //첫번째 argument
            break;
        default:
            var_dump(func_get_args());
    }

}   

call_user_func('foo', 'hello, world', 10);

function_exists('foo2');    //false

get_defined_functions();


// call function when exiting script
// 스크립트가 끝났을 때 호출하는 함수
// 가장 마지막에 실행됨
register_shutdown_function(function(){
    echo 'Exit';
});