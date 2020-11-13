<?php

setcookie('myCookie', 'Hello, world');

echo $_COOKIE['myCookie'];

// set the expiration date to one hour ago 삭제
setcookie('myCookie', '', time()-3600);