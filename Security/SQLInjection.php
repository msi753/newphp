<?php
$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'phpblog'
);

$_POST = [
    'email' => 'msi753@naver.com',
    'password' => 'secret'
];
['email'=>$email, 'password'=>$password] = $_POST;
//$_POST도 filter_var로 한 번 더 검증해야


/**
 * Injection이 발생하기 때문에
 * 사용하지 않는 것을 권장
 * 만약에 email = "' OR 1='1" 이 들어가면 
 * SELECT * FROM users WHERE email='' OR 1='1'
 */

//$result = mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}' LIMIT 1");

/**
 * prepare statement
 */
$stmt = mysqli_prepare($conn, 'SELECT * FROM users WHERE email=? LIMIT 1');
mysqli_stmt_bind_param($stmt, 's', $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($result)) {
    echo 'Hello, world';
}