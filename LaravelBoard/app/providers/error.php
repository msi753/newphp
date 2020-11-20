<?php

//ini_set('display_errors', 'Off') 대신 아래 코드를 사용
set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    $errmsg = "[{$errno}] {$errstr} in {$errfile} on line {$errline}";
    error_log($errmsg.PHP_EOL, 3, config('error.path'));

    return error_log($errmsg);
});