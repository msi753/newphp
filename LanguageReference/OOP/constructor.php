<?php

/**
 * Constructor생성자
 */

class A
{
    public function __construct()
    {
        var_dump(__METHOD__);
    }
}

$a = new A();   //A::__construct

/**
 * Constructor Parameters
 */
class B
{
    public $message;
    
    public function __construct($message)
    {
        $this->message = $message;
    }
}

$b = new B('Hello, world');
echo $b->message;

/**
 * Inherit
 */
class C extends A
{
    public function __construct()
    {
        parent::__construct();  //부모의 생성자를 상속
    }
}

$c = new C();
