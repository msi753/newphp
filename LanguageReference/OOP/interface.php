<?php

/**
 * Interface
 * 무조건 public이랑만 쓰임
 * implements하면 무조건 구현해야 함
 */

function foo(A $a)
{
    return $a->foo();
}

interface A
{
    public function foo();
}

class B implements A
{
    public function foo()
    {
        return __CLASS__;
    }
}

$b = new B();
var_dump(foo($b));