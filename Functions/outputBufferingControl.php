<?php
/**
 * Output Control
 */
//example1.
ob_start();

echo 'Hello, world';
file_put_contents('php://stdout', 'Hello, world');  // -> Hello, world

ob_clean();





//example2.
ob_end_flush(); //종료시키면서 out stream으로 내보내기
ob_end_clean(); //종료시키면서 내보내지 않기
$msg = ob_get_clean();  //아무것도 출력하지 않지만 var_dump($msg)에는 값이 있다.





//example3.
ob_start();
echo "Hello ";
$out1 = ob_get_contents();
echo "World";
$out2 = ob_get_contents();
ob_end_clean();
var_dump($out1, $out2);
// string(6) "Hello "
// string(11) "Hello World"




//example4.
//Level 0
ob_start();
echo "Hello ";

//Level 1
ob_start();
echo "Hello World";
$out2 = ob_get_contents();
ob_end_clean();

//Back to level 0
echo "Galaxy";
$out1 = ob_get_contents();
ob_end_clean();

//Just output
var_dump($out1, $out2);

// string(12) "Hello Galaxy"
// string(11) "Hello World"