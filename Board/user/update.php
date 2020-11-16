<?php

//dirname(__DIR__);  //D:\myeongsim\newphp\Board
require_once dirname(__DIR__).'/uikit/app.php';

if (!array_key_exists('user', $_SESSION)) {
    return header('Location: /Board/auth/login.php');
}

$_SESSION['CSRF_TOKEN'] = bin2hex(random_bytes(32));
output_add_rewrite_var('token', $_SESSION['CSRF_TOKEN']);
$user = $_SESSION['user'];

require_once dirname(__DIR__).'/layouts/top.php';
?>

<div id="main_form-auth" class="uk-position-center">
    <form action="/Board/user/update_process.php" method="POST">
        <input type="text" name="email" value="<?=$user['email'];?>" class="uk-input" placeholder="email">
        <input type="password" name="password" class="uk-input" placeholder="password">
        <input type="submit" value="submit" class="uk-button uk-button-default uk-width-1-1 uk-margin-small-bottom">
    </form>
</div>

<?php
require_once dirname(__DIR__).'/layouts/bottom.php';
?>