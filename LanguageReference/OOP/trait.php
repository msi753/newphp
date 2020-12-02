<?php

/**
 * Trait
 * 다중 상속을 지원하지 않아서 등장한 것
 * use로 사용
 */

trait A
{
    private $message = 'Hello';

    public function sayHello() 
    {
        return $this->message;
    }

    abstract public function foo();
}

trait AA 
{
    public function foo()
    {
        return __TRAIT__;
    }
}

trait AAA 
{
    use A, AA
    {
        A::foo insteadOf AA;    //어떤 메서드를 선택하는지 지정해주기
        A::foo as protected h;  //별칭
    }
}

class B 
{
    use A;
    function foo()
    {
        return __CLASS__;
    }
}

$b = new B();



// 우선순위
class C 
{
    private $message = 'Hell';
    public function sayHell()
    {
        return $this->message;
    }
}

trait D
{
    public function sayHell()
    {
        return __TRAIT__;
    }
}

class E extends C
{
    use D;
    public function sayHell()
    {
        return __CLASS__;
    }
}

$e = new E();
var_dump($e->sayHell());    // E 가장 나중에 덮어 쓴거
// E 클래스에 sayHell()메서드 지우고 D만 남으면 D출력되고
// E 클래스에 아무 내용도 없으면 Hell 출력