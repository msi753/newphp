<?php

//ex) md5, sha256, crypt...

/**
 * get hash algorithms
 */
hash_algos(); //해시 알고리즘


/**
 * create a hash
 */
$hash1 = hash('sha256', 'hello');
$hash2 = crypt('hello', 'secret');


/**
 * check a hash
 */
hash_equals($hash1, hash('sha256', 'hello'));   //1


/**
 * hash handler
 */
$h = hash_init('sha256');
hash_update($h, 'hello');
hash_final($h);    //2cf24dba5fb0a30e26e83b2ac5b9e29e1b161e5c1fa7425e73043362938b9824


/**
 * HMAC 키있는 해시값
 * hash-based message authentication code
 * key->'secret'
 */
hash_hmac_algos();
$h = hash_hmac('sha256', 'hello', 'secret');
hash_equals($h, hash_hmac('sha256', 'hello', 'secret'));   //1