<?php
/**
 * base64 encode/decode
 */
$base64Encode = base64_encode('hello, world');  //aGVsbG8sIHdvcmxk
base64_decode($base64Encode);   //hello, world

/**
 * (as http client) get headers
 * php가 클라이언트로 동작
 */
get_headers('http://example.com');

/**
 * (ast http client) get meta
 */
get_meta_tags('http:/example.com');

/**
 * build a query string (자주 쓰임)
 */
$queryString=http_build_query([
    'lang' => 'php',
    'message' => 'hello'
]);
//lang=php&message=hello

/**
 * parse URL
 */
parse_url('http://example.com?'.$queryString);
// array(3) {
//     'scheme' => string(4) "http"
//     'host' => string(11) "example.com"
//     'query' => string(22) "lang=php&message=hello"
//   }

/**
 * URL encode/decode
 */
$urlEncoded = urlencode('안녕하세요'); //%EC%95%88%EB%85%95%ED%95%98%EC%84%B8%EC%9A%94
urldecode($urlEncoded);    //?덈뀞?섏꽭?붿슂