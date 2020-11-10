<?php

/**
 * for
 */
for ($i = 1; $i<=10; $i++) {
    echo $i;
}

$messages = [
    'Hello',
    'who',
    'bye'
];

for($i=0; $i<count($messages); $i++) {
    echo $messages[$i].PHP_EOL;
}

/**
 * PHP_EOL
 * end of line
 * 한 줄 띄기
 */