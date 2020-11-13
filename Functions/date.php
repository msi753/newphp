<?php

date_default_timezone_set('Asia/Seoul');
date_default_timezone_get();

//unix timestamp
$t = time();    //1605154973
localtime($t, true);
getdate($t);

strftime('%d/%m/%Y %H:%M:%S', $t);  //12/11/2020 13:26:30
date('d/m/Y H:i:s', $t);       //12/11/2020 13:26:30

$timestamp = mktime('1', '15', '30');   
date('d/m/Y H:i:s', $timestamp);   //12/11/2020 01:15:30

strtotime('+2 days');  //1605329648

//스크립트의 실행 시간 체크
$stime = microtime(true);
sleep(1);   //1초 동안의 딜레이
echo microtime(true)-$stime;    //1.0001361370087
