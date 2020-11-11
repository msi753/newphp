<?php

password_algos();

$hash = password_hash('hello', PASSWORD_DEFAULT);
//$hash = crypt('hello', 'secret');
password_verify('hello', $hash);   //1
//hash_equals($hash, crypt('hello', 'secret'));

var_dump(password_get_info($hash));
// array (size=3)
//   'algo' => string '2y' (length=2)
//   'algoName' => string 'bcrypt' (length=6)
//   'options' => 
//     array (size=1)
//       'cost' => int 10



/* These salts are examples only, and should not be used verbatim in your code.
   You should generate a distinct, correctly-formatted salt for each password.
*/
if (CRYPT_STD_DES == 1) {
    echo 'Standard DES: ' . crypt('rasmuslerdorf', 'rl') . "\n";
}

if (CRYPT_EXT_DES == 1) {
    echo 'Extended DES: ' . crypt('rasmuslerdorf', '_J9..rasm') . "\n";
}

if (CRYPT_MD5 == 1) {
    echo 'MD5:          ' . crypt('rasmuslerdorf', '$1$rasmusle$') . "\n";
}

if (CRYPT_BLOWFISH == 1) {
    echo 'Blowfish:     ' . crypt('rasmuslerdorf', '$2a$07$usesomesillystringforsalt$') . "\n";
}

if (CRYPT_SHA256 == 1) {
    echo 'SHA-256:      ' . crypt('rasmuslerdorf', '$5$rounds=5000$usesomesillystringforsalt$') . "\n";
}

if (CRYPT_SHA512 == 1) {
    echo 'SHA-512:      ' . crypt('rasmuslerdorf', '$6$rounds=5000$usesomesillystringforsalt$') . "\n";
}

// $hashed_password = crypt('mypassword'); // let the salt be automatically generated
// /* You should pass the entire results of crypt() as the salt for comparing a
//    password, to avoid problems when different hashing algorithms are used. (As
//    it says above, standard DES-based password hashing uses a 2-character salt,
//    but MD5-based hashing uses 12.) */
// if (hash_equals($hashed_password, crypt($user_input, $hashed_password))) {
//    echo "Password verified!";
// }


/**
 * We just want to hash our password using the current DEFAULT algorithm.
 * This is presently BCRYPT, and will produce a 60 character result.
 *
 * Beware that DEFAULT may change over time, so you would want to prepare
 * By allowing your storage to expand past 60 characters (255 would be good)
 */
echo password_hash("rasmuslerdorf", PASSWORD_DEFAULT);  //$2y$10$3TkH8NVtgQb0bKsariq3mekBH41QYxZSbGlybSAVVRYb.lqEEohsS 계속 바뀜...

/**
 * rehash
 * In this case, we want to increase the default cost for BCRYPT to 12.
 * Note that we also switched to BCRYPT, which will always be 60 characters.
 * cost는 알고리즘의 비용
 * 하드웨어가 좋아지면 cost를 갱신하면 좋다.
 */
$options = [
    'cost' => 12,
];
$hash = password_hash("rasmuslerdorf", PASSWORD_BCRYPT, $options); //$2y$12$JV7VVO/6CNuc4wzzdZ5XN.GUgb/AEyE.OjBRzgfNzrElW3/GuCqoy 계속 바뀜...

$options = ['cost' => 13];
var_dump(password_needs_rehash($hash, PASSWORD_BCRYPT, $options));  //true

/**
 * This code will benchmark your server to determine how high of a cost you can
 * afford. You want to set the highest cost that you can without slowing down
 * you server too much. 8-10 is a good baseline, and more is good if your servers
 * are fast enough. The code below aims for ≤ 50 milliseconds stretching time,
 * which is a good baseline for systems handling interactive logins.
 */
$timeTarget = 0.05; // 50 milliseconds 

$cost = 8;
do {
    $cost++;
    $start = microtime(true);
    password_hash("test", PASSWORD_BCRYPT, ["cost" => $cost]);
    $end = microtime(true);
} while (($end - $start) < $timeTarget);

echo "Appropriate Cost Found: " . $cost;    //10