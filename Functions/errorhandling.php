<?php

/**
 * Log Level (비트 단위)
 * E_NOTICE: Run-time notices
 * ~: ~를 제외하고
 */
error_reporting(E_ALL & ~E_NOTICE);


/**
 * Send Error Log
 * 메시지
 * 3: 파일
 * destination
 */
error_log('Hello, world', 3, __DIR__.'/logs/log.log');


/**
 * Backtrace
 */
function foo() {
    var_dump(debug_backtrace());
}
foo();

// array(1) {
//     [0]=>
//     array(4) {
//       ["file"]=>
//       string(47) "D:\myeongsim\newphp\Functions\errorhandling.php"
//       ["line"]=>
//       int(26)
//       ["function"]=>
//       string(3) "foo"
//       ["args"]=>
//       array(0) {
//       }
//     }
//   }


/**
 * @Ignore Errors
 * 디버그에서는 에러가 나지만
 * 실행결과에서는 에러를 무시한다.
 */
function foo2() {
    asdf;
}
@foo2();


/**
 * Error handling
 */
set_error_handler(function($errno, $errstr){
    switch ($errno) {
        case E_USER_ERROR:
            var_dump($errstr);
            break;
        default:
            break;
    }
});
//Hello, world


/**
 * Trigger Custom Error
 */
trigger_error('Hello, world', E_USER_ERROR);
