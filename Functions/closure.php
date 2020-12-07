<?php

/**
 * Closure
 * php의 익명함수는 클로저의 객체다
 * 라우터 구성할 때 사용
 * Predefined Interfaces and Classes
 */
function foo()
{
    return 'Hello, world';
}

// $foo = fn () => 'Hello, world';
// var_dump(Closure::fromCallable('foo'));

class A
{
    private $message = 'Hello, world';
}

$foo = fn () => $this->message;

$a = new A();

// Function call
var_dump($foo->call($a));

// scope가 null인 경우 public만 사용 가능
$foo2 = $foo->bindTo($a, $a);
var_dump($foo2());


// 활용
function foo2(\Closure $callback)
{
    var_dump($callback());
}
foo2(fn () => 'Hello, world');