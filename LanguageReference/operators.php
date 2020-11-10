<?php
/**
 * String operator
 */
echo 'Hello'.', world';

/**
 * null coalescing 널 합체
 * php7
 */
$message = null;
echo $message ?? 'Hello, world';    //Hello, world

$message1 = 1;
echo $message1 ?? 'Hello, world';   //1

/**
 * Logical Operators 논리 연산자
 * and, or, xor
 * xor은 달라야 true
 */
var_dump(true && true);   //true
var_dump(true && false);  //false
//and로도 표현 가능

var_dump(true || true);    //true
var_dump(true || false);   //true
var_dump(true || []);      //true
var_dump(false || []);     //false
//or로도 표현 가능

var_dump(true xor false);   //true

/**
 * Comparison Operators 비교 연산자
 */
var_dump(10 == '10');   //true
var_dump(10 === '10');  //false

var_dump(10<>20);   //true
var_dump(10!=20);   //true

var_dump('ab'<'ac');    //true
var_dump('6x'<20);      //true

/**
 * Spaceship operator 우주선 연산자 <=>
 * 10이 작으면 -1, 10이 동일하면 0, 10이 크면 1을 반환
 */
var_dump(10<=>20);  //-1

/**
 * Bitwise Operators
 */
$bin = 0b0101;  //5
$bin | 0b0101;  //0b0101
$bin & 0b0101;  //0b0100
$bin ^ 0b0101;  //0b0001
$bin << 1;      //0b1010
$bin >> 1;      //0b0010
~$bin;          //0b1010

/**
 * Arithmetic Operators.
 */
echo 2+2;    //4
echo 17-3.5; //13.5
echo 10/3;   //3.333
echo 6*9;    //54
echo 4%3;    //1
echo 2**4;   //16

/**
 * Incrementing/Decrementing Operators 증감연산자
 */
$count = 0;
echo $count++;  //0
echo ++$count;  //2

/**
 * Operator Precedence. 연산 우선순위
 * 산관논
 * 산술>비교>논리
 * Arithmetic>Comparison>Logical
 */
var_dump (true && 10 < 20 == true && 10 > 20);  //false
true && true == true && false;
true && true && false;
true && false;
false;