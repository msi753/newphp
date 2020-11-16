<?php
/**
 * 회원가입하기
 * register_process.php
 * date: 2020-11-16
 * 
 * @author:임명심
 * @category
 * @package
 * @license
 * @link
 */

//db연결
require_once dirname(__DIR__).'/uikit/app.php';

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password');
$token = filter_input(INPUT_POST, 'token');

if ($email && $password && hash_equals($token, $_SESSION['CSRF_TOKEN'])) {
    $username = current(explode('@', $email));
    $password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = mysqli_prepare(
        $GLOBALS['DB_CONNECTION'], 
        'INSERT INTO users(email, password, username) VALUES(?, ?, ?)'
    );

    mysqli_stmt_bind_param($stmt, 'sss', $email, $password, $username);

    if (mysqli_stmt_execute($stmt)) {
        session_unset();
        session_destroy();
        header('Location: /Board/auth/login.php');
    } else {
        header('Location: /Board/user/register.php');
    }
    return mysqli_stmt_close($stmt);
}
return header('Location: /Board/user/register.php');