<?php

$messages = [
    'Hello, world'
];
/**
 * Spread Operator 스프레드 오퍼레이터
 * 배열을 합치거나 복사할 때 사용할 수 있다.
 */
$messages = [
    ...$messages,
    'who are you?',
    'bye'
];

print_r($messages);
//Array ( [0] => Hello, world [1] => who are you? [2] => bye )