<?php
/**
 * php.ini -i
 */
ini_set('display_errors', 'On');
ini_set('display_errors', 'Off');

//error_reporting은 꺼주고 set_error_handler로 로그를 남기는 방식을 사용해도 괜찮다
error_reporting(0);
set_error_handler(function(){
    //로그 남길 때 생성
});
