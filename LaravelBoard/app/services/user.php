<?php

function createUser($email, $password, $username)
{
    return execute('INSER INTO users(eamil, password, username) VALUES(?, ?, ?)', $email, $password, $username);
}

function updateUser($email, $password, $username, $id)
{
    return execute('UPDATE users SET email=?, password=?, username=? WHERE id=?', $email, $password, $username, $id);
}