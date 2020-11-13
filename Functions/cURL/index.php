<?php

/**
 * 서버 용도로 사용
 * classify http methods
 * php -S localhost:8000 -t D:\myeongsim\newphp\Functions\cURL 내장 웹서버
 */
//Which request method was used to access the page; e.g. 'GET', 'HEAD', 'POST', 'PUT'.
switch($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        echo filter_input(INPUT_GET, 'message');
        break;
    case 'POST':
        print_r($_POST);
        break;
    default:
        http_response_code(404);
}