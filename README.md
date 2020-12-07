깃허브 컨트리뷰션 그래프가 채워지지 않는다ㅠㅠ
git config --list 명령에서
user.name과 user.email을 보던 중
user.email이 회사 계정이라서 그런가? 싶어서
git config --local user.email 이메일 수정하고 다시 커밋해본다

php.ini파일에 접근하는 방법
php --ini

내장 서버 띄우기
php -S localhost:8000 -t Functions

네이밍 컨벤션
https://edykim.com/ko/post/comparing-paleolithic-php-with-modern-php/
https://www.php-fig.org/psr/psr-1/ (중요)
```
class Foo // 클래스 아래 중괄호
{
    public function sampleFunction(int $a)
    {
        if ($a) {   // if 옆에 띄어쓰기

        }
    }
}
```

https://www.php-fig.org/psr/psr-3/ 로거 인터페이스
https://www.php-fig.org/psr/psr-4/ auto-loader: 정규화 된 Class 이름, 네임스페이스 접두사 및 기본 디렉토리에 해당하는 파일 경로를 설정해야 한다. (컴포저)
https://www.php-fig.org/psr/psr-6/ 캐시, 관련된 psr: https://www.php-fig.org/psr/psr-16/
https://www.php-fig.org/psr/psr-7/ http-message, 관련된 psr: https://www.php-fig.org/psr/psr-17/, https://www.php-fig.org/psr/psr-18/ 

https://www.php-fig.org/psr/psr-12/ 확장된 버전 (중요)

Files MUST use only <?php and <?= tags.

Files MUST use only UTF-8 without BOM for PHP code.

Files SHOULD either declare symbols (classes, functions, constants, etc.) or cause side-effects (e.g. generate output, change .ini settings, etc.) but SHOULD NOT do both.

Namespaces and classes MUST follow an “autoloading” PSR: [PSR-0, PSR-4].
```
<?php

function autoload($className)
{
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    require $fileName;
}
spl_autoload_register('autoload');
```
Class names MUST be declared in StudlyCaps.

Class constants MUST be declared in all upper case with underscore separators.  예) const DATE_APPROVED

Method names MUST be declared in camelCase.

Code MUST use 4 spaces for indenting, not tabs.

The PHP constants(keywords) true, false, and null MUST be in lower case.

기초문법
http://docs.php.net/manual/en/langref.php

내장함수
http://docs.php.net/manual/en/extensions.membership.php

보안
http://docs.php.net/manual/en/security.php

예제코드
https://github.com/pronist/php7-lecture/tree/basic

UIkit
https://getuikit.com/

CKEditor 5
https://ckeditor.com/ckeditor-5/

핸드북
https://pronist.tistory.com/36


C:\Windows\System32\drivers\etc\hosts
```
127.0.0.1 newphp.com
127.0.0.1 board.newphp.com
```

DNS 설정

D:\wamp64\bin\apache\apache2.4.46\conf\extra\httpd-vhosts.conf
```
<VirtualHost *:80>
DocumentRoot /myeongsim/newphp/
ServerName newphp.com
</VirtualHost>

<VirtualHost *:80>
DocumentRoot /myeongsim/newphp/LaravelBoard/public/
ServerName board.newphp.com
</VirtualHost>
```

파일 구조
D:\myeongsim\newphp\Board
D:\myeongsim\newphp\LaravelBoard