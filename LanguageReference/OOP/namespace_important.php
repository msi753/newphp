<?php

/**
 * NameSpace
 * autoloading에서 중요한 개념
 * 파일 하나당 하나의 네임스페이스를 쓰는 것을 권장
 * 네임스페이스 A의 자식 네임스페이스 B: A\B (달러)
 */

namespace A
{
    const MESSAGE = __NAMESPACE__;

    class A
    {
        public function foo()
        {
            return __METHOD__;
        }
    }
    
    function foo()
    {
        return __FUNCTION__;
    }

    function var_dump()
    {
        echo __FUNCTION__;
    }

    //글로벌로 사용하고 싶을 때
    \var_dump('hello'); // string(5) "hello"

}

namespace A\B
{
    class A
    {
        public function foo()
        {
            return __METHOD__;
        }
    }
    
    function bar()
    {
        return __FUNCTION__;
    }

    function var_dump()
    {
        echo __FUNCTION__;
    }

    var_dump(); //  A\B\var_dump
}

//글로벌 네임스페이스에서 네임스페이스A의 클래스A를 사용한다.
namespace
{
    use A\A;
    use A\B\A as AB;    // A로 이름이 같아질 땐 별칭을 준다 
    use function A\foo;
    use const A\constant;

    // $a = new A();
    // var_dump($a->foo());    //A\A::foo
}