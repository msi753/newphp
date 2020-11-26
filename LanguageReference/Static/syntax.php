<?php

/**
 * Static
 * 객체 생성이 필요 없음
 * this사용안하고 self사용함
 */
class A
{
    public static $message = 'Hello, world';

    public static function foo()
    {
        return self::$message;
    }
}

var_dump(A::foo());     //정적메서드
var_dump(A::$message);  //정적프로퍼티

$classname = 'A';

$a = new $classname();
//var_dump($a->message);  정적 프로퍼티는 접근 불가능
var_dump($a->foo());    //가능하지만 비권장