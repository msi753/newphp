<?php
/**
 * 변수
 * camel 방식을 사용
 */
$message = 'Hello, world';  //String
$userCount = 0; //int
$pi = 3.14;  //double
$is_visited = false;    //boolean
$temp = null;   //null

/**
 * 작은따옴표 안의 변수는 텍스트로 인식
 */
echo "The message is $message";     //The message is Hello, world
echo "The message is {$message}";   //The message is Hello, world
echo 'The message is {$message}';   //The message is {$message} 

/**
 * Here Doc, Now Doc 잘 쓰이지 않음
 */

//Here Doc  $를 변수로 해석, \$greeting이라고 해야 now doc과 일치
echo <<<HTML
<html>
    <head>
        <title>$message</title>
    </head>
</html>
HTML;

//Now Doc   $가 나와도 텍스트로 인식 -> 변수가 이스케이핑 되는 효과
echo <<<'HTML'
<html>
    <head>
        <title>$message</title>
    </head>
</html>
HTML;



/**
 * Free 메모리 해제
 */
unset($message);
echo $message;

/**
 * variable variables 가변 변수
 */
$varName = 'message';
$$varName = 'Hello, world';
//${$varName} 상동
echo $message;  //Hello, world;
