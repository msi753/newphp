<?php

$middlewares = [
    'auth',
    'csrfToken',
    'require'
];
foreach ($middlewares as $file) {
    assert(require_once dirname(__DIR__)."/middlewares/{$file}.php");   //성공 실패 여부 리턴
}