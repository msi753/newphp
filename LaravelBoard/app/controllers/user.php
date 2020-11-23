<?php

function create()
{
    return view('auth', ['requestURL' => '/auth/register']);
}

function store()
{
    return base(function ($args) {
        return createUser(...array_values($args)) && redirect('/auth/login');
    });
}

function edit()
{
    return view('auth', ['requestURL' => '/user/update', 'email' => user()['email']]);
}

function update()
{
    return base(function ($args) {
        return updateUser(...array_values($args)) && redirect('/auth/login');
    });
}

function base($callback)
{
    $args = filter_input_array(INPUT_POST, [
        'email' => FILTER_VALIDATE_EMAIL | FILTER_SANITIZE_EMAIL,
        'password' => FILTER_DEFAULT
    ]);
    $args['username'] = current(explode('@', $args['email']));
    $args['password'] = password_hash($args['password'], PASSWORD_DEFAULT);

    return call_user_func($callback, $args) ? signOut() : reject();
}