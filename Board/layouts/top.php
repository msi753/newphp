<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-blog - <?=$_SERVER['REQUEST_URI']??'' ?></title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/css/uikit.min.css" />
    <link rel="stylesheet" href="../app.css">
</head>
<body>
    <div id="app">
        <nav id="nav" role="navigation" class="uk-navbar-container" uk-navbar>
            <div class="uk-navbar-right">
                <ul class="uk-navbar-nav">
                    <li><a href="/Board">Home</a></li>
                    <li><a href="/user/register.php">Register</a></li>
                    <?php if(array_key_exists('user', $_SESSION)) : ?>
                        <li><a href="/user/update.php">My page</a></li>
                        <li><a href="/post/write.php">Write</a></li>
                        <li><a href="/auth/logout.php">Sign out</a></li>
                    <?php else:?>
                        <li><a href="/auth/login.php">Sign in</a></li>
                    <?php endif;?>
                </ul>
            </div>
        </nav>
        <main id="main" role="main">
