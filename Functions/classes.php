<?php

/**
 * Classes/Objects Functions
 */
class A
{
    public $message = 'Hello, world';

    public function foo()
    {
        return $this->message;
    }
}

class B extends A
{
}

// 라라벨에서 사용
class_alias('A', 'MyClass');

/**
 * Exists
 */
// var_dump(
//     class_exists('MyClass'),                     // true
//     property_exists('MyClass', 'message')        // true
// );

/**
 * Get
 */
$a = new MyClass();
$b = new B();

// var_dump(
//     get_class($a),                   // A
//     get_class_vars('MyClass'),       // 'message' => Hello, world
//     get_class_methods('MyClass')     // foo
// );

// var_dump(
//     get_declared_classes()           // interfaces traits
// );

// var_dump(
//     get_object_vars($a),             // 'message' => Hello, world
//     get_parent_class($b)             // A
// );

/**
 * is
 * is_a 와 instanceof는 동일값을 반환
 */
var_dump(
    is_a($a, 'MyClass'),            //true
    is_subclass_of($b, 'MyClass'),  //true
    $a instanceof MyClass,          //true
    $b instanceof MyClass           //true
);