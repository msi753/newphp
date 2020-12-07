<?php

/**
 * References
 */

$message = 'Hello, world';
$sayHello =& $message;

$sayHello = 'Who are you?';
// var_dump($message); // -> Who are you?
/**
 * Functions and Methods
 */
function foo()
{
    // global $message;
    $message =& $GLOBALS['message'];
    $message = 'Bye';
}

foo();
// var_dump($message);

function foo2(&$message)
{
    $message = 'Hello, world';
}

foo2($message);
// var_dump($message); // "Hello, world"



class MyClass
{
    public $message = 'Hello, world';

    public function &getMessage()
    {
        return $this->message;
    }
}

$myclass = new MyClass();

$sayHello =& $myclass->getMessage();
$sayHello = 'Bye';

// var_dump($myclass->message); // Bye

/**
 * Unset
 */
$sayHello =& $message;
unset($sayHello);

var_dump($message); // Hello, world


/**
 * WeakReference
 */

// $messages = [
//     'sayHello' => 'Hello, world'
// ];
// var_dump((object) $messages);

$class = new stdClass();

$weakRef = WeakReference::create($class);
var_dump($weakRef->get());  // stdClass

unset($class);

var_dump($weakRef->get());  // NULL