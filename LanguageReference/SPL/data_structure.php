<?php

/**
 * Data Structures
 */

// Case 1. Stack (이중 연결 리스트)

$st = new SplStack();

$st->push('Hello, world');
$st->push('Bye');

// var_dump($st->pop());

// Case 2. Queue (이중 연결 리스트)

$qu = new SplQueue();

$qu->enqueue('Hello, world');
$qu->enqueue('Bye');

// var_dump($qu->dequeue());

// Case 3. Fixed Array

$array = new SplFixedArray(5);

foreach (range(0, 4) as $number) {
    $array[$number] = $number;
}

$array2 = new ArrayObject([ 'message' => 'Hello, world' ], ArrayObject::ARRAY_AS_PROPS);    // flag
var_dump($array2->message);

// var_dump($array);

// Case 4. Object Storage

$storage = new SplObjectStorage();

$o1 = new stdClass();
$o2 = new stdClass();

$storage->attach($o1, 'Hello, world');
$storage->attach($o2, 'Bye');

// var_dump($storage->contains($o1));




/**
 * SplFileObject
 * SplFileInfo를 implements했기 때문에 $file->fread($file->getSize()) 사용 가능
 */

$file = new SplFileObject(dirname(__DIR__, 2) . '/README.md');
// var_dump($file->fread($file->getSize()));

/**
 * SplFileInfo
 */
$fileinfo = $file->getFileInfo();
var_dump($fileinfo->getBasename(), $fileinfo->isDir());




/**
 * ArrayIterator
 */

$array = new ArrayObject([ 'message' => 'Hello, world' ]);
$arrayIterator = $array->getIterator();

while ($arrayIterator->valid()) {
    // var_dump($arrayIterator->current());
    $arrayIterator->next();
}

/**
 * DirectoryIterator
 */
$dir = new DirectoryIterator(dirname(__DIR__));

while ($dir->valid()) {
    // var_dump($dir->current());
    $dir->next();
}

// RecursiveDirectoryIterator

$it = new RecursiveDirectoryIterator(dirname(__DIR__));

function recusiveDirectories(RecursiveDirectoryIterator $it)
{
    while ($it->valid()) {
        var_dump($it->current());
        if ($it->hasChildren()) {
            recusiveDirectories($it->getChildren());
        }
        $it->next();
    }
}

recusiveDirectories($it);