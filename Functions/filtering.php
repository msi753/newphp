<?php
/**
 * [중요]
 * $_GET['message];은 지양하고
 * filter_input(INPUT_GET, 'message');를 써서 보안을 강화하자
 */

echo filter_var('hello, world');

$email_a = 'joe@example.com';
$email_b = 'bogus';

if (filter_var($email_a, FILTER_VALIDATE_EMAIL)) {
    echo "Email address '$email_a' is considered valid.\n"; //Email address 'joe@example.com' is considered valid.
}
if (filter_var($email_b, FILTER_VALIDATE_EMAIL)) {
    echo "Email address '$email_b' is considered valid.\n";
} else {
    echo "Email address '$email_b' is considered invalid.\n";   //Email address 'bogus' is considered invalid.
}



$a = 'joe@example.org';
$b = 'bogus - at - example dot org';
$c = '(bogus@example.org)';

$sanitized_a = filter_var($a, FILTER_SANITIZE_EMAIL);
if (filter_var($sanitized_a, FILTER_VALIDATE_EMAIL)) {
    echo "This (a) sanitized email address is considered valid.\n";     //This (a) sanitized email address is considered valid.
}

$sanitized_b = filter_var($b, FILTER_SANITIZE_EMAIL);
if (filter_var($sanitized_b, FILTER_VALIDATE_EMAIL)) {
    echo "This sanitized email address is considered valid.";
} else {
    echo "This (b) sanitized email address is considered invalid.\n";   //This (b) sanitized email address is considered invalid.
}

$sanitized_c = filter_var($c, FILTER_SANITIZE_EMAIL);
if (filter_var($sanitized_c, FILTER_VALIDATE_EMAIL)) {
    echo "This (c) sanitized email address is considered valid.\n";     //This (c) sanitized email address is considered valid.
    echo "Before: $c\n";                //Before: (bogus@example.org)
    echo "After:  $sanitized_c\n";      //After: bogus@example.org
}



//callback validate filter
echo $message = filter_var('Doe, Jane Sue', FILTER_CALLBACK, [
    'options' => function($value) {
        return $value;
    }
]);



echo filter_var('<html><head></head></html>', FILTER_SANITIZE_FULL_SPECIAL_CHARS);  //깨져서 보여야 하는데



/**
 * $_GET, $_POST, $_COOKIE, $_SERVER, $_ENV
 */
//filter_input(INPUT_GET);
echo filter_input(INPUT_SERVER, 'REMOTE_ADDR'); //127.0.0.1
filter_input(INPUT_SERVER, 'REMOTE_ADDR', FILTER_VALIDATE_IP);
