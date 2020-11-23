<?php

function showLoginForm() 
{
    return view('auth', [ 'requestURL' => '/auth/login' ]);
}

function login()
{
    $args = filter_input_array(INPUT_POST, [
        'email' => FILTER_VALIDATE_EMAIL | FILTER_SANITIZE_EMAIL,
        'password' => FILTER_DEFAULT
    ]);

    return signIn(...array_values($args)) ? redirect('/') : reject();
}

function logout()
{
    return signOut() && redirect('/');
}