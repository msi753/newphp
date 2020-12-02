  
<?php

/**
 * Magic Methods: Property
 */
class A
{
    private $message;

    //isset($a->message)
    public function __isset($name)
    {
        return isset($this->$name);
    }

    //unset($a->message)
    public function __unset($name)
    {
        unset($this->$name);
    }

    // getters와 setters
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }
}

$a = new A();
$a->message = 'Hello, world';   //__set
var_dump($a->message);          //__get