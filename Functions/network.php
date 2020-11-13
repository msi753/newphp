<?php

/**
 * HTTP HEADER
 */
header('X-Header: Hello, world');   //커스텀 헤더
header_remove('X-Header');


 /**
  * HTTP Response Code
  */
http_response_code(404);
header('HTTP/1.1 404 Not Found');