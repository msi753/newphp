<?php

/**
 * Command execution
 */
$output = [];
echo exec('dir', $output);  //->simplexml_load_string
echo shell_exec('dir');  //->simplexml_load_string
system('dir');  //->outputstream

echo `dir`; //echo exec('dir', $output);와 동일
passthru('dir');    //output stream

/**
 * Escaping
 */
escapeshellarg('echo \'Hello, world\';');   //"echo 'Hello, world';"
echo escapeshellcmd('php --ini');

/**
 * One way process handling
 */
$ph = popen('php ' . dirname(__DIR__, 3) . '/lang/BasicSyntax/HelloWorld/index.php', 'w');
// echo stream_get_contents($ph);
pclose($ph);


/**
 * Two way process handling
 */
$ph = proc_open(
    'php ./Functions/programExecution.php',
    [
        0 => ['pipe', 'r'], // READ
        1 => ['pipe', 'w'], // WRITE
        2 => ['file', __DIR__ . '/logs/log.log', 'a'] // ERR
    ],
    $pipes,
    dirname(__DIR__, 1)
);

[ $readStream, $writeStream, ] = $pipes;

fwrite($readStream, 'Hello, world');
fclose($readStream);

stream_get_contents($writeStream);
fclose($writeStream);

// Terminate
proc_terminate($ph);
// Close Process
proc_close($ph);