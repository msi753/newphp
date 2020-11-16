<?php
/**
 * cross site scripting
 * 
 * php.ini
 * session.cookie_httponly=1으로 자바스크립트로 접근을 방지 가능
 * 예시 코드 <script>document.write(document.cookie)</script>
 * 
 * htmlentities($_POST['content']);
 * strip_tags($_POST['content']);
 * filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 */
session_start();

switch($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        echo <<<'HTML'
<form action="./XSS.php" method="POST">
    <textarea name="content" id="" cols="25" rows="50"></textarea>
    <input type="submit">
</form>
HTML;
        break;
    case 'POST':
        //echo htmlentities($_POST['content']);
        //echo strip_tags($_POST['content']);
        echo filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        break;
    default:
        http_response_code(404);
}