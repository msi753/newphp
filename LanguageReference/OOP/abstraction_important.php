<?php

/**
 * Class Abstraction
 * 추상 메서드는 반드시 구현해주어야 한다.
 */

abstract class A
{
    protected $message = 'Hello, world';

    public function sayHello()
    {
        return $this->message;
    }

    abstract public function foo();
}

//$a = new A(); 추상클래스는 인스턴스 생성이 불가하므로 상속해야

class B extends A
{
    public function foo()
    {
        return __CLASS__;
    }
}

$b = new B();
$classname = $b->foo();
echo $classname;    //B