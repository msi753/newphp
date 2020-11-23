<?php

assert_options(ASSERT_BAIL, true);  //assert가 실패하면 스크립트를 멈춤
//assert_options(ASSERT_WARNING, false); //경고 끄기(개발에서는 주석처리)

foreach ([ 'lib', 'services' ] as $dir) {
    $includePath = dirname(__DIR__) . "/app/{$dir}/";
    foreach (scandir($includePath) as $file) {
        if (fnmatch('*.php', $file)) {
            require_once $includePath . $file;
        }
    }
}

//프로바이더는 순서가 중요... 
//error, database, session이 통과되어야 middleware와 route가 실행될 수 있기 때문
$providers = [
    'error',
    'database',
    'session',
    'middleware',
    'route'
];

foreach ($providers as $file) {
    assert(require_once dirname(__DIR__)."/app/providers/{$file}.php");
}