<?php
/**
 * 위조 요청 공격
 * cross site request forgery
 * 
 * 크로스 사이트 스크립팅이 허용되면 위조 요청 공격이 일어날 수 있음
 * 개발자도구에서 input같은 것은 쉽게 추가될 수 있는데
 * 만약 다 넘어오면 문제가 발생
 * 따라서 세션에 토큰값을 넣어서 비교 후 일치할 때만 값을 전달받음
 * 
 * 첫번째로 XSS를 막고, 두번째로 CSRF를 막는다
 * XSS를 막을 때는 htmlentities, strip_tags, filter_input를 사용하고
 * CSRF를 막을 때는 csrf_token을 사용한다.
 */

session_start();

switch($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $_SESSION['token'] = bin2hex(random_bytes(32));
        output_add_rewrite_var('csrf_token', $_SESSION['token']);
        // <input type="hidden" name="token" vlaue="$_SESSION['token']">
        echo <<<'HTML'
<form action="./CSRF.php" method="POST">
    <input type="hidden" name="uid" vlaue="1">    
    <input type="submit">
</form>
HTML;
        break;
    case 'POST':
        if(hash_equals($_SESSION['token'], $_POST['csrf_token'])) {
            $uid = $_POST['uid'];
            echo 'Hello, world';
        }
        break;
    default:
        http_response_code(404);
}