<?php
//dirname(__DIR__);  //D:\myeongsim\newphp\Board
require_once dirname(__DIR__).'/uikit/app.php';

$_SESSION['CSRF_TOKEN'] = bin2hex(random_bytes(32));
output_add_rewrite_var('token', $_SESSION['CSRF_TOKEN']);

require_once dirname(__DIR__).'/layouts/top.php';
?>

<div id="main_form-auth" class="uk-position-center">
    <form action="/Board/auth/login_process.php" method="POST">
        <input type="text" name="email" class="uk-input" placeholder="email">
        <input type="password" name="password" class="uk-input" placeholder="password">
        <input type="submit" value="submit" class="uk-button uk-button-default uk-width-1-1 uk-margin-small-bottom">
    </form>
</div>

<?php
require_once dirname(__DIR__).'/layouts/bottom.php';
?>