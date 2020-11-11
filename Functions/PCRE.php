<?php
/**
 * Regular Expression 정규 표현식
 * POSIX Extended(POSIX Regex Functions는 deprecated 되었다.->PCRE 사용)
 * 포직스: Portable Operating System Interface 이식 가능 운영 체제 인터페이스
 * PCRE: 펄 호환 정규표현식
 * preg_match, preg_match_all, (preg_replace, preg_filter), preg_replace_callback, preg_grep, preg_quote
 */

preg_match('/^(https?\:)\/\/(.*?)(\..*)$/', 'http://exmple.com', $matches);
//   /사이에 넣어주기/
//   (그룹)
//   ^ 시작
//   $ 끝
//   \ 이스케이핑
//   ? s는 올 수도 있고 안 올 수도 있다
var_dump($matches);
// array(4) {
//     [0]=>
//     string(17) "http://exmple.com"
//     [1]=>
//     string(5) "http:"
//     [2]=>
//     string(6) "exmple"
//     [3]=>
//     string(4) ".com"
//   }



/**
 * Now Doc
 * preg_match_all
 */
$html = <<<'HTML'
<section>
    <h1>Lorem Ipsum</h1>
    <article>
        <h2>what is Lorem Ipsum</h2>
    </article>
</section>
HTML;

preg_match_all('/<(h[1-6])>(.*)<\/\\1>/', $html, $matches);
//  \\1은 (h[1-6]) 괄호로 묶은 첫번째와 동일한 부분을 갖는다 -> 예를 들어 </h1>
var_dump($matches);
// array(3) {
//     [0]=>
//     array(2) {
//       [0]=>
//       string(20) "<h1>Lorem Ipsum</h1>"
//       [1]=>
//       string(28) "<h2>what is Lorem Ipsum</h2>"
//     }
//     [1]=>
//     array(2) {
//       [0]=>
//       string(2) "h1"
//       [1]=>
//       string(2) "h2"
//     }
//     [2]=>
//     array(2) {
//       [0]=>
//       string(11) "Lorem Ipsum"
//       [1]=>
//       string(19) "what is Lorem Ipsum"
//     }
//   }



preg_replace('/^(.*)@(.*)$/', 'http://$2?user=$1', 'pronist@naver.com');    //http://naver.com?user=pronist
//$1은 (첫번째 그룹)pronist, $2는 (두번째 그룹)naver.com
//preg_replace와 preg_filter는 비슷
preg_filter('/^(.*)@(.*)$/', 'http://$2?user=$1', 'pronist@naver.com');    //http://naver.com?user=pronist

//콜백을 넘겨줘서 값을 반환
preg_replace_callback('/^(.*)@(.*)$/', function($matches) {
    var_dump($matches);
}, 'pronist@naver.com');
// array(3) {
//     [0]=>
//     string(17) "pronist@naver.com"
//     [1]=>
//     string(7) "pronist"
//     [2]=>
//     string(9) "naver.com"
//   }
echo preg_replace_callback('/^(.*)@(.*)$/', function($matches) {
    [, $username, $domain] = $matches;
    return 'http://'.$domain.'?user='.$username;
}, 'pronist@naver.com');
//http://naver.com?user=pronist



//정규 표현식에 맞는 값만 리턴됨
preg_grep('/^(.*)@(.*)$/', [
    'php://stdout',
    'pronist@naver.com'
]);
//pronist@naver.com



preg_quote('^().*?:[]');   //  \^  \(\)  \.  \*  \?  \:  \[\]



// split the phrase by any number of commas or space characters,
// which include " ", \r, \t, \n and \f
$keywords = preg_split("/[\s,]+/", "hypertext language, programming");
print_r($keywords);
// Array
// (
//     [0] => hypertext
//     [1] => language
//     [2] => programming
// )