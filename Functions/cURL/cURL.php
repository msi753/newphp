<?php 
/**
 * Client URL
 * 예를 들어 api요청을 할 때 다른 서버에 요청할 때 사용
 */
//init
$ch = curl_init();
$queryString = http_build_query([
    'message' => 'Hello, world'
]);
//set options(GET)
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_URL, 'http://localhost:8000/?'.$queryString);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//execution
//curl_exec($ch);

//reset
curl_reset($ch);

//set options(POST)
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, [
    'message' => 'hello, world'
]);
curl_setopt($ch, CURLOPT_URL, 'http://localhost:8000');
//execute
curl_exec($ch);

//close
curl_close($ch);