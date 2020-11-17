<?php
/**
 * Get file info from
 */
$path = dirname(__DIR__, 1).'/README.md';   //D:\myeongsim\newphp

//case1. from file handler
$fh = fopen($path, 'r');
var_dump(fstat($fh));

//case2. file name
var_dump(stat($path));

/**
 * Get file info detail
 */
//size
filesize($path);
//modification time
filemtime($path);

/**
 * Check file type
 */
is_dir($path);
is_file($path);

/**
 * Hard link
 */
link(__FILE__, './file_functions.php');

/**
 * Symlink 바로가기
 */
symlink(__FILE__, './sym_file_functions.php');
readlink('./sym_file_functions.php'); //-> D:\myeongsim\newphp\Functions\filesystem2.php