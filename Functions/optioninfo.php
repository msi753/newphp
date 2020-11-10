<?php

/**
 * PHP Extension
 */
//var_dump(extension_loaded('mbstring')); //true 한글/일본어/중문 등의 2바이트 문자열을 다루는 함수들은 mbstring
//var_dump(get_loaded_extensions());



/**
 * include path ??? 이상한데???
 */
//var_dump(__DIR__);  //"D:\myeongsim\newphp\Functions
ini_set('include_path', __DIR__, '/mylib');     //또는 set_include_path(__DIR__, '\mylib');
include 'HelloWorld.php';
var_dump(get_include_path());   //C:\php\pear"



/**
 * get included files.
 */

//var_dump(get_included_files());     //D:\myeongsim\newphp\Functions\optioninfo.php



/**
 * get php information
 */
//phpinfo();



/**
 * php.ini
 * ini_set을 통해 설정할 수 있는 부분과 없는 부분이 있다.
 */
ini_set('session.gc_maxlifetime', 1440);
//echo ini_get('session.gc_maxlifetime'); //1440
ini_restore('session.gc_maxlifetime');
ini_set('zend.assertions', 1);  //설정해도 값이 바뀌지 않음



/**
 * environment variables
 */
putenv('APP_ENV='.'production');
//var_dump(getenv('APP_EVN'));    //production

$_ENV['APP_ENV'] = 'development';
//var_dump($_ENV['APP_ENV']); //development



/**
 * assert — Checks if assertion is FALSE
 * php.ini
 * zend.assertions = -1 이 기본값
 * 
 * 1: generate and execute code (development mode)
 * 0: generate code but jump around it at runtime
 * -1: do not generate code (production mode)
 * 
 */

assert_options(ASSERT_ACTIVE, true);
assert_options(ASSERT_BAIL, false); //assertion이 실패하면 멈춘다
assert_options(ASSERT_WARNING, true);
assert_options(ASSERT_CALLBACK, 'assertFailure');

function assertFailure(...$args) {
    var_dump($args);
}

assert(false, __LINE__);    //라인수 78 메시지 전달

// 결과
// array (size=4)
//   0 => string 'D:\myeongsim\newphp\Functions\optioninfo.php' (length=44)
//   1 => int 79
//   2 => string '' (length=0)
//   3 => string '79' (length=2)


/*
// Active assert and make it quiet
assert_options(ASSERT_ACTIVE, 1);
assert_options(ASSERT_WARNING, 0);
assert_options(ASSERT_QUIET_EVAL, 1);

// Create a handler function
function my_assert_handler($file, $line, $code, $desc = null)
{
    echo "Assertion failed at $file:$line: $code";
    if ($desc) {
        echo ": $desc";
    }
    echo "\n";
}

// Set up the callback
assert_options(ASSERT_CALLBACK, 'my_assert_handler');

// Make an assertion that should fail
assert('2 < 1');
assert('2 < 1', 'Two is less than one');


 Assertion failed at test.php:21: 2 < 1
 Assertion failed at test.php:22: 2 < 1: Two is less than one
*/

// php 7 이상
// assert(true == false);
// echo 'Hi!';

// With zend.assertions set to 0, the above example will output:
// Hi!

// With zend.assertions set to 1 and assert.exception set to 0, the above example will output:
// Warning: assert(): assert(true == false) failed in - on line 2
// Hi!

// With zend.assertions set to 1 and assert.exception set to 1, the above example will output:
// Fatal error: Uncaught AssertionError: assert(true == false) in -:2
// Stack trace:
// #0 -(2): assert(false, 'assert(true == ...')
// #1 {main}
//   thrown in - on line 2

