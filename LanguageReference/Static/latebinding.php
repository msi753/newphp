<?php

/**
 * Static Binding 정적 바인딩
 */
class A
{
    public static function foo()
    {
        static::who();
    }
    public static function who()
    {
        var_dump(__CLASS__);
    }
}

class B extends A
{
    public static function test()
    {
        //A::foo(); 비권장
        parent::foo();
    }
    public static function who()
    {
        var_dump(__CLASS__);
    }
}

$b = new B();
$b->test(); //B



class C
{
    public static function foo()
    {
        self::who();
    }
    public static function who()
    {
        var_dump(__CLASS__);
    }
}

class D extends C
{
    public static function test()
    {
        parent::foo();
    }
    public static function who()
    {
        var_dump(__CLASS__);
    }
}

$d = new D();
$d->test(); //C