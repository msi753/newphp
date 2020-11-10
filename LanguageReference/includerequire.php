<?php

/**
 * include(_once)
 */
include 'HelloWorld.php';   //파일을 중복해서 읽어옴
include 'HelloWorld.php';   //Fatal error: Cannot redeclare foo() 오류 발생
include 'HelloWorld.php';

include_once 'HelloWorld.php';  //여러번 파일을 가져오는 게 아님

 /**
  * requre(_once)
  * 오류를 보여줌
  */

require_once 'HelloWorld.php';

