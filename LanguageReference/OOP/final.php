<?php

/**
 * Final
 * 한 번 선언되면 재할당 불가능
 * 아래 함수에서 상속을 못받고 오류가 나는 이유
 */
class A
{
    public $message;
    
    public final function foo()
    {
        //pass
    }
}

class B extends A
{
    public function foo()
    {
        //pass
    }
}