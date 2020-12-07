<?php
// class Exception implements Throwable
// class Error implements Throwable
// 크게 Exception과 Error 클래스가 있다고 생각하자.

/**
 * Exception 예외
 * finally는 항상 실행됨
 * 임의로 throw로 에러를 발생시키면 catch에서 실행된다.
 */

try {
    throw new Exception('Hello, world');
} catch (Exception $e) {
    var_dump($e->getMessage());
} finally {
    var_dump('Finally');
}

/**
 * ErrorException
 */
// $ php exception.php
// D:\myeongsim\newphp\LanguageReference\OOP\exception.php:11:
// string(12) "Hello, world"
// D:\myeongsim\newphp\LanguageReference\OOP\exception.php:13:
// string(7) "Finally"
// class ErrorException extends Exception
// 에러 핸들러에서 예외를 던지게 만들면, 에러도 예외로 처리 가능해진다.
set_error_handler(function ($errno, $errstr) {
    throw new ErrorException($errno, $errstr);
});

// 예외 핸들러
set_exception_handler(fn (Exception $e) => var_dump($e->getMessage()));


/**
 * 위의 두 방식은 PHP Fatal error를 처리하지 못함
 * 그래서 사용하는 것이 Error
 * Throwable(인터페이스)을 Exception이 구현하고 있다
 * class Error implements Throwable
 */

try {
    new MyClass();
} catch (Error $e) {
    var_dump($e->getMessage());     // "Class 'MyClass' not found"
}



/**
 * Exception extends
 * Exception이 더 상위라서 나중에 처리하는 순서로 만든다
 * class Exception implements Throwable
 */
class MyException extends Exception
{

}

try {
    throw new MyException('Hello, world');
} catch (MyException $e) {
    var_dump(MyException::class);   // "MyException"
} catch (Exception $e) {
    var_dump(Exception::class);
}