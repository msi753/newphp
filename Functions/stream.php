<?php
/**
 * Stream 데이터의 흐름
 * http://docs.php.net/manual/en/context.php
 * http://docs.php.net/manual/en/wrappers.php
 */
$context = stream_context_create();

stream_context_set_option($context, [
    'http' => [
        'method' => 'GET',
    ]
]);

file_get_contents('http://example.com', false, $context);


stream_get_filters();


$fh = fopen(dirname(__DIR__, 1).'/README.md', 'r');
stream_filter_append($fh, 'string.toupper');
//fread
stream_get_contents($fh);



stream_get_wrappers();
$fh = fopen('php://output', 'w');
fwrite($fh, 'Hello, world');
//file_put_contents('php://output', 'Hello, world');