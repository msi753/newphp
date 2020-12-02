<?php

/**
 * Visibility
 */
class A
{
    public $public = 'public';
    protected $protected = 'protected';
    private $private = 'private';
}

$a = new A();
var_dump($a->public);
//var_dump($a->protected);
//var_dump($a->private);



// 상속받으면 protected 사용 가능
// private은 클래스 내부에서만 사용 가능
class B extends A 
{
    public function foo()
    {
        return $this->protected;
        
    }
}
$b = new B();
$protected = $b->foo();
echo $protected;