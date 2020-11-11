<?php
/**
 * Cryptographically Secure Pseudo-Random Number Generator(CSPRNG)
 */

rand(1,5);
random_int(1,5);    //Generates cryptographically secure pseudo-random integers 안전하다??? recommended

$bytes = random_bytes(32);
echo $bytes;
echo bin2hex($bytes);