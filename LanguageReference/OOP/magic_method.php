<?php

/**
 * Magic Methods: Methods
 * 매직 메서드
 * '__메서드'의 형태
 * 클래스 내부에서 php가 없는 함수도 자체적으로 호출
 */
class A 
{

    public function __call($name, $args)
    {
        var_dump($name, $args);
    }

    public static function __callStatic($name, $args)
    {
        var_dump($name, $args);
    }

    //가장 먼저 실행됨
    public function __invoke(...$args)
    {
        var_dump($args);
    }
}

$a = new A();
$a->foo('Hello, world');

A::foo();   // static 메서드 실행