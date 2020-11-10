<?php
/**
 * if elseif, else
 * 조건문
 * [], '', false, 0, null -> false
 */

 if(false) {
     echo 'Hello, world';
 } elseif(true) {
     echo 'who are you?';
 } else {
     echo 'bye';
 }
 //who are you?

 //if문에서 변수 할당하기
 if($message = 'Hello') {
     echo $message;
 }
 //Hello

 if($message = false) {
    echo $message;
}

//Alternative if
if(false):
    echo 'Hello, world';
elseif(true):
    echo 'Hello';
else:
    echo 'bye';    
endif;
//Hello

/**
 * switch case 선택할 때 사용
 */
$context = 1;
switch($context) {
    case 1:
        echo 'Hi';
        break;
    case 2:
        echo 'who?';
        break;
    default:
        echo 'bye';
}
//Hi

/**
 * ternary operator 삼항 연산자
 */
echo true? 'true':'false';  //true
echo 'true'?:'false';       //true 축약