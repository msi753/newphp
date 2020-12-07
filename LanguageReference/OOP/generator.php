<?php
/**
 * Generator
 * 사용 목적: 
 */

function gen()
{
    yield 1;
    yield 2;
    yield 3;
}

$gen = gen();
// var_dump($gen->current());  // 1
// $gen->next();
// var_dump($gen->current());  // 2

foreach($gen as $num) 
{
    var_dump($num);
}

function gen2()
{
    yield 1;
    yield from gen();
    yield 2;
}

foreach (gen2() as $number)
{
    var_dump($number);  // 1 1 2 3 2
}

function gen3()
{
    yield 'message' => 'Hello, world';
}

foreach (gen3() as $key => $value)
{
    var_dump($key, $value);
}

function gen4()
{
    $data = yield;
    yield $data;
}

$gen4 = gen4();
var_dump($gen4->current()); // NULL
$gen4->send('Hello, world');
var_dump($gen4->current()); // Hello, world

function __range($start, $end, $step = 1)
{
    for ($i = 0; $i <= $end; $i += $step) {
        yield $i;
    }
}

$s = microtime(true);

// foreach (__range(0, 100000) as $number) {}
foreach (range(0, 100000) as $number) {
}

// 0.40912079811096,    443408 // -> Generator

// 0.0055599212646484,  6698208 // -> built-in function
var_dump(microtime(true) - $s, memory_get_peak_usage());

 


/**
 * Iterator Interface Implements
 */
class IntegerIterator implements Iterator
{
    private $i;

    /**
     * Create a new IetegerIterator
     *
     * @param int $start
     * @param int $end
     * @param int $step
     *
     * @return IntegerIterator
     */
    public function __construct($start, $end, $step = 1)
    {
        $this->start = $i = $start;
        $this->end = $end;
        $this->step = $step;
    }

    /**
     * Reset
     */
    public function rewind()
    {
        $this->i = 0;
    }

    /**
     * Validate
     */
    public function valid()
    {
        return $this->i <= $this->end;
    }

    /**
     * Get a Current Value
     */
    public function current()
    {
        return $this->i;
    }

    /**
     * Get a key
     */
    public function key()
    {
        return $this->i;
    }

    /**
     * Next step
     */
    public function next()
    {
        $this->i += $this->step;
    }
}

foreach (new IntegerIterator(0, 100) as $number) {
}
