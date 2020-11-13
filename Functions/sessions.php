<?php
/**
 * set session save path
 */
session_save_path('./sessions');

/**
 * start a session
 */
session_start();

/**
 * set session value with key
*/
$_SESSION['mySession'] = 'Hello, world';

/**
 * get session id
*/
session_id();

/**
 * get session name
 */
session_name();

/**
 * run GC(garbage collection)
 * 잘 안 씀
 */
session_gc();

/**
 * get session cookie info
*/
session_get_cookie_params(1440);
session_get_cookie_params();
// array (size=6)
//   'lifetime' => int 0
//   'path' => string '/' (length=1)
//   'domain' => string '' (length=0)
//   'secure' => boolean false
//   'httponly' => boolean false
//   'samesite' => string '' (length=0)

/**
 * remove a session value  
*/ 
unset($_SESSION['mySession']);

/**
 * reset session
 */
session_unset();

/**
 * remove session file
 * 비권장
 */
session_destroy();

/**
 * get session status
 */
session_status();

/**
 * close session
 */
session_commit();

/**
 * regenerate session id
 * 세션 연장 시에 주로 사용(보안 강화)
 */
session_regenerate_id();