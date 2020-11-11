<?php
    header('Content-Type:text/html; charset=utf-8');


/**
 * Add slashes at Quotes
 */
$slashe = addslashes("'");  // \'
echo stripslashes($slashe); // '


/**
 * binary to hex
 */
//$bytes = random_bytes(32);
//$hex = bin2hex($bytes);  //'d5c0067663de8f6c161fc437b5d4ada920e793f4370fd085683e18ce2475e2ab' (length=64)
//var_dump(hex2bin($hex)); //'gILT3Vj��RMZO��1��� �)��/�' (length=32)


/**
 * One way haxh (Encryption) 복호화 불가능
 * salt vlaue: 문구를 해시하는 단방향 함수에 대한 추가 입력으로 사용되는 임의의 데이터
 * sha1, md5 Not recommended
 */
crypt('Hello, world', 'secret');   //se2CSfXdQ7eu


/**
 * split, join
 */
$url = 'http://example.com';

//배열 반환
$exp = explode('//', $url);

str_split('Hello, world', 3);   //길이는 3
// array(4) {
//     [0]=>
//     string(3) "Hel"
//     [1]=>
//     string(3) "lo,"
//     [2]=>
//     string(3) " wo"
//     [3]=>
//     string(3) "rld"
//   }

//배열 병합
echo implode('//', $exp);


/**
 * HTML entities
 * 엔티티는 HTML의 예약어, 특정 문자열을 코드로 표기한 집합
 * ex) &의 entity name은 &amp, entity number는 &#38
 */
$html = <<<'HTML'
<html>
    <body>Hello</body>
</html>
HTML;

//htmlspecialchars($html);
$encode = htmlentities($html);
// &lt;html&gt;
//     &lt;body&gt;
//     &lt;/body&gt;
// &lt;/html&gt;

//htmlspecialchars_decode($encode);
echo html_entity_decode($encode);


/**
 * strip html tags
 * 남길 태그를 뒤에 써준다
 */
echo strip_tags($html, '<body>');
//<body>Hello</body>


/**
 * \n -> <br> tag
 */
echo nl2br("Hello, \n world");
// Hello, <br />
//  world


/**
 * char
 */
ord('A');  //65
chr(65);   //A


/**
 * parse query string
 */
$str = "first=value&arr[]=foo+bar&arr[]=baz";

// Recommended
parse_str($str, $output);
echo $output['first'];  // value
echo $output['arr'][0]; // foo bar
echo $output['arr'][1]; // baz


/**
 * number format
 */
number_format(123456789);  //123,456,789
//money_format이라는 게 있는데 윈도우에서는 안되고 리눅스에서만 가능하다


/**
 * case
 */
strtoupper('hello');   //HELLO


/**
 * remove spaces
 */
trim('   Hello, world   ');    //Hello, world


/**
 * replace
 */
echo strtr("baab", "ab", "01"),"\n";    //1001

$trans = array("h" => "-", "hello" => "hi", "hi" => "hello");
echo strtr("hi all, I said hello", $trans);  //hello all, I said hi

echo str_replace('Hello', 'hi', 'Hello, replace');  //hi, replace

echo substr_replace('Hello, world', 'sub', 0, 5);   //sub, world

/**
 * print formatted string
 * 
 * %s String
 * %d int
 * %f float 
 */
//스프레드 연산자 사용
$msg = "spread";
printf("%s, %d", ...[$msg, 10]); //printf string, 10
vprintf("%s, %d", [$msg, 10]);   //파라미터가 배열
//spread, 10

/**
 * buffering
 * 임시 저장소
 */
$msg = 'buffer';
$buf = sprintf("%s", $msg);
sprintf("%s, %d", ...[$msg, 10]);
vsprintf("%s, %d", [
    $msg, 10
]);
//buffer 10

/**
 * repeat
 */
str_repeat('*', 5);    //*****


/**
 * word count
 */
str_word_count("hi, i\'m myeongsim", 1);
// array(4) {
//     [0]=>
//     string(2) "hi"
//     [1]=>
//     string(1) "i"
//     [2]=>
//     string(2) "'m"
//     [3]=>
//     string(9) "myeongsim"
//   }


/**
 * compare
 * str1<str2  음수
 * str1==str2 0
 * str1>str2  양수
 */
strcmp('cmp', 'compare');  //-1


/**
 * position
 * 0부터 세서 위치 리턴
 */
strpos('hii', 'i'); //1


/**
 * first position
 */
$text = 'This is a Simple text.';

// this echoes "is is a Simple text." because 'i' is matched first
strpbrk($text, 'mi');  //m이나 i 중에 하나 일치하는 조건

// this echoes "Simple text." because chars are case sensitive
strpbrk($text, 'S');



/**
 * length
 */
strlen('Hello');   //5


/**
 * reverse
 */
strrev('Hello');   //olleH


/**
 * sub string
 */
strstr('http://example.com', '//');    ////example.com


/**
 * Token
 */
strtok('http://example.com', '//');    //http:
strtok('//');  //http:example.com


/**
 * slice
 */
substr('Hello, world', 7); //world


/**
 * compare
 */
substr_compare('Hello, world', 'world', -5);   //0


/**
 * count
 */
substr_count('Hello, world', 'l', -5); //1, w부터 l이 1개 있다
substr_count('Hello, world', 'l'); //3


/**
 * wrapping: 길이 조절
 */
$text = "The quick brown fox jumped over the lazy dog.";
$newtext = wordwrap($text, 20, "<br />\n");
echo $newtext;
// The quick brown fox<br />
// jumped over the lazy<br />
// dog.

$text = "A very long woooooooooooord.";
$newtext = wordwrap($text, 8, "\n", true);
echo "$newtext";
// A very
// long
// wooooooo
// ooooord.

$text = "A very long woooooooooooooooooord. and something";
$newtext = wordwrap($text, 8, "\n", false);
echo "$newtext";
// A very
// long
// woooooooooooooooooord.
// and
// something