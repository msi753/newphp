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
https://www.php-fig.org/psr/psr-1/

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

