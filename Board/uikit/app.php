<?php
/**
 * TimeZone
 */
date_default_timezone_set('Asia/Seoul');

/**
 * Error Handling
 */
ini_set('display_errors', 'Off');

/**
 * Database Connection(mysqli)
 */
//연결 | 종료
$GLOBALS['DB_CONNECTION'] = mysqli_connect(
    'localhost',    //호스트 주소
    'root',         //user
    '',             //password
    'phpblog'       //database
);
//싱글톤 패턴
register_shutdown_function(
    function () { 
        if (array_key_exists('DB_CONNECTION', $GLOBALS) && $GLOBALS['DB_CONNECTION']) {
            mysqli_close($GLOBALS['DB_CONNECTION']);
        }
    }
);

/**
 * SESSION
 */
ini_set('session.gc_maxlifetime', 1440);
session_set_cookie_params(1440);
session_start();

/**
 * php.ini -i
 * session.use_strict_mode = 1
 * session.use_cookies = 1
 * session.use_only_cookies = 1
 * session.cookie_httponly = 1
 */