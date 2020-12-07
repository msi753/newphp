https://getcomposer.org/
```
설치확인
$ composer --version

폴더 구조: /d/myeongsim/newphp/composer
해당 폴더로 가서
composer init
The package should be lowercase and have a vendor name, a forward slash, and a package name, matching: [a-z0-9_.-]+/[a-z0-9_.-]+
$ Package name (<vendor>/<name>) [user/composer]: msi/composer-test
[Composer\Exception\NoSslException]                                      
  The openssl extension is required for SSL/TLS protection but is not available. If you can not enable the openssl extension, you can disable this error, at your own risk, by setting the 'disable-tls' opt   
  ion to true.
$ composer config -g -- disable-tls true
You are now running Composer with SSL/TLS protection disabled.
composer.json 생성
{
    "require": {}
}

whoops 가져오기(npm 설치하는 것과 비슷)
$ composer require filp/whoops
{
    "require": {
        "filp/whoops": "^2.9"
    }
}
vendor 폴더가 생성되었고 psr-4인 autoload.php 확인 가능

autolaod하기
composer/index.php 파일을 생성하고
<?php

require_once './vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

echo $message;
서버를 실행시키면 http://newphp.com/composer/ 꾸며진 에러페이지 확인 가능

composer\vendor\filp\whoops\composer.json을 보면 매핑되어 있는 것 확인 가능
위의 autoload new \Whoops\Run;
아래의 composer\vendor\filp\whoops\src\Whoops\Run.php
"autoload": {
    "psr-4": {
        "Whoops\\": "src/Whoops/"
    }
},
```
A Dependency Manager for PHP
의존성 관리자

https://packagist.org/packages/monolog/monolog, psr-3 로거

https://packagist.org/packages/guzzlehttp/psr7, http-message

https://packagist.org/packages/filp/whoops, 에러 페이지를 꾸며줌