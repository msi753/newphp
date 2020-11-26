<?php

/**
 * Anonymous Classes 익명 클래스
 */
class A
{
    public function create()
    {
        return new class {};
    }
}

$a = new A();
var_dump($a->create()); //object(class@anonymous)



class B
{
    public function foo() {
        //pass
    }
}

class C
{
    public function create()
    {
        return new class extends B {};
    }
}

// 메서드 체이닝
$c = new C();
var_dump($c->create()->foo());

