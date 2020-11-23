<?php

//첫번째index는 controller의 index.php파일
//두번째index는 그 파일 내부의 index함수의 이름
return [
    ['/', 'get', 'index.index'],
    ['/auth/login', 'get', 'auth.showLoginForm'],
    ['/auth/login', 'post', 'auth.login'],
    ['/auth/logout', 'get', 'auth.logout'],
    ['/user/register', 'get', 'user.create'],
    ['/user/register', 'post', 'user.store'],
    ['/user/update', 'get', 'user.edit'],
    ['/user/update', 'post', 'user.update'],
    ['/post/read', 'get', 'post.show'],
    ['/post/write', 'get', 'post.create'],
    ['/post/write', 'post', 'post.store'],
    ['/post/update', 'get', 'post.edit'],
    ['/post/update', 'post', 'post.update'],
    ['/post/delete', 'get', 'post.destroy'],
];