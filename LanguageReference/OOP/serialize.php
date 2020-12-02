<?php

/**
 * Magic Methods: Serialize
 */

class A
{
    private $message = 'Hello, world';

    public function __sleep()
    {
        return [ 'message' ];
    }

    public function __wakeup()
    {
        var_dump(__METHOD__);
    }
}

$a = new A();
$serialized = serialize($a);
var_dump($serialized);  // "O:1:"A":1:{s:10:"\000A\000message";s:12:"Hello, world";}"

var_dump(unserialize($serialized));
// class A#2 (1) {
//     private $message =>
//     string(12) "Hello, world"
// }


// 객체 직렬화 후 데이터베이스에 넣을 때 사용
// implements Serializable인 것을 보니 인터페이스 (이 방식 추천, 확장성이 더 높다)
class B implements Serializable
{
    private $message = 'Hello, world';

    public function serialize()
    {
        return serialize($this->message);
    }

    public function unserialize($serialized)
    {
        $this->message = unserialize($serialized);
    }
}

$b = new B();
$serialized = serialize($b);
var_dump($serialized);  // "C:1:"B":20:{s:12:"Hello, world";}"

var_dump(unserialize($serialized));