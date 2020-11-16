<?php
/**
 * set session save path
 */
session_save_path('./sessions');

/**
 * php.ini
 * session.use_strict_mode = 1,  does not accept uninitialized session ID and regeneratesession ID if browser sends uninitialized session ID.
 * session.use_only_cookies = 1, fetch and use a cookie for storing and maintaining the session id.
 * session.cookie_httponly = 1, inaccessible to browser scripting languages such as JavaScript.
 * session.cookie_secure = 1, https를 사용하고 있으면 켜주자
 */
//session.cookie_httponly = 1은 아래와 같은 상황을 방지
echo '<script>document.write(document.cookie)</script>';

/**
 * cookie time, GC
 * php.ini
 * session.gc_maxlifetime = 1440 세션의 라이프타임
 */
 ini_set('session.gc_maxlifetime', 3);   //가비지콜렉터 라이프타임
 session_set_cookie_params(3);           //쿠키 라이프타임

/**
 * start a session
 */
session_start();
session_gc();
// ; NOTE: If you are using the subdirectory option for storing session files
// ;       (see session.save_path above), then garbage collection does *not*
// ;       happen automatically.  You will need to do your own garbage
// ;       collection through a shell script, cron entry, or some other method.
// ;       For example, the following script would is the equivalent of
// ;       setting session.gc_maxlifetime to 1440 (1440 seconds = 24 minutes):
// ;          find /path/to/sessions -cmin +24 -type f | xargs rm

/**
 * timestamp based session
 */
echo $_SERVER['REQUEST_TIME'];
$_SERVER['timestamp'] = $_SERVER['REQUEST_TIME'];

//sleep(10);
$time = strtotime('+10 seconds');
$diff = $time - $_SESSION['timestamp'];
$sessionTimeOut = 10;

if($diff >= $sessionTimeOut) {
    echo 'Session TimeOut';
    exit;
}

/**
 * renewal session
 */
session_regenerate_id();
$_SESSION['TIMESTAMP'] = time();