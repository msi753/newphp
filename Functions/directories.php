<?php
/**
 * change a directory
 */
chdir(__DIR__);    //1

/**
 * get current working directory
 */
echo getcwd();  //D:\myeongsim\newphp\Functions

/**
 * reading a directory
 */
$files = scandir(__DIR__.'/..');
// array(9) {
//     [0] =>
//     string(1) "."
//     [1] =>
//     string(2) ".."
//     [2] =>
//     string(4) ".git"
//     [3] =>
//     string(7) ".vscode"
//     [4] =>
//     string(5) "Board"
//     [5] =>
//     string(9) "Functions"
//     [6] =>
//     string(17) "LanguageReference"
//     [7] =>
//     string(8) "Security"
//     [8] =>
//     string(9) "index.php"
//   }

/**
 * directory handling
*/
//open
$dir = opendir(__DIR__.'/..');
//read
while($name = readdir($dir)) {
    var_dump($name);
}
// D:\myeongsim\newphp\FunctionsD:\myeongsim\newphp\Functions\directories.php:44:
// string(1) "."
// D:\myeongsim\newphp\Functions\directories.php:44:
// string(2) ".."
// D:\myeongsim\newphp\Functions\directories.php:44:
// string(4) ".git"
// D:\myeongsim\newphp\Functions\directories.php:44:
// string(7) ".vscode"
// D:\myeongsim\newphp\Functions\directories.php:44:
// string(5) "Board"
// D:\myeongsim\newphp\Functions\directories.php:44:
// string(9) "Functions"
// D:\myeongsim\newphp\Functions\directories.php:44:
// string(9) "index.php"
// D:\myeongsim\newphp\Functions\directories.php:44:
// string(17) "LanguageReference"
// D:\myeongsim\newphp\Functions\directories.php:44:
// string(8) "Security"
//reset
rewinddir($dir);
//close
closedir($dir);




$root = dirname(__DIR__, 2);

$dir = dir($root.'/Board');

$dir->rewind();
while ($dirname = $dir->read()) {
     var_dump($dirname);
}

$dir->close();  //Close directory handle.

/**
 * Directory 클래스
 * Directory::close, 즉 $dir->close
 * Directory::read, 즉 $dir->read
 * Directory::rewind, 즉 $dir->rewind
 * 는
 * 각각
 * Directory 함수의
 * closedir
 * readdir
 * rewinddir과 동일하다
 */