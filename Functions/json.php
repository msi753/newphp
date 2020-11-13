<?php
/**
 * json encode/decode
 */
$jsonEncoded = json_encode([
    'message'=>'hello, world'
]);
//{"message":"hello, world"}

var_dump(json_decode($jsonEncoded, true));
// class stdClass#1 (1) {
//     public $message =>
//     string(12) "hello, world"
//   }

//true를 붙이면 object를 연관배열로 바꿔줌
// array(1) {
//     'message' =>
//     string(12) "hello, world"
//   }