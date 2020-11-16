<?php
/**
 * From Path    //Doc comment short description must start with a capital letter
 */
__FILE__;               //D:\myeongsim\newphp\Functions\filesystem.php
basename(__FILE__);     //filesystem.php
dirname(__FILE__, 2);      //D:\myeongsim\newphp\Functions

/**
 * To absolute path
 */
realpath('.');     //D:\myeongsim\newphp\Functions

/**
 * Get path info
 */
pathinfo(__FILE__);
// array(4) {
//     'dirname' =>
//     string(29) "D:\myeongsim\newphp\Functions"
//     'basename' =>
//     string(14) "filesystem.php"
//     'extension' =>
//     string(3) "php"
//     'filename' =>
//     string(10) "filesystem"
//   }

/**
 * Find files
 * array리턴
 */
//glob
glob('./*.php');

/**
 * File name check
 * index.php파일이름이 *.php파일이름의 형식과 맞는지 체크
 */
fnmatch('*.php', 'index.php'); //1

/**
 * File(directory) control
 */
//copy
copy('./index.php', './file_functions.php');
//make a directory
mkdir('./test');
//remove a file
unlink('./file_functions.php');
//remove a directory
rmdir('./test');

/**
 * File handling
 */
//D:\myeongsim\newphp\Functions\filesystem.php에서 디렉터리Functions보다 2단계 상위
$path = dirname(__DIR__, 1).'/README.md';   //D:\myeongsim\newphp

$fh = fopen($path, 'r');

/**
 * File Reading
 */

// case1. functions
file_get_contents($path);  // -> string
file($path);               // -> array
//readfile($path);         // -> output stream, echo같은 걸 찍지 않아도 알아서 출력

fpassthru($fh); //-> output stream
echo fread($fh, filesize($path));    // -> string

//case2. with loop
while($line=fgets($fh) && !feof($fh)) {
    var_dump($line);
}

/**
 * File pointer
 */
//fseek($fh, 0, SEEK_SET);
ftell($fh);    //set을 0으로 하면 0이 나오고
echo feof($fh); //ftell을 하고 end pointer가 맞냐고 하면 1을 출력한다.
rewind($fh);    //포인터를 처음으로

/**
 * File writing
 */
$path = './helloWorld.txt';
$fh = fopen($path, 'w');    //a모드는 덮어쓰기

//case 1. file_put_contents
file_put_contents($path, 'Hello, World');

//case 2. file handler
rewind($fh);
fwrite($fh, 'Hello, world');    // -> output stream
fflush($fh);                    // -> output stream(force)
fclose($fh);

/**
 * File slice 원본 변화시킴
 */
$fh = fopen($path, 'r+');   //읽기+쓰기
ftruncate($fth, rand(1, filesize($path)));

/**
 * File handler close
 */
fclose($fh);