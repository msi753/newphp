<div id="main__form-auth" class="uk-position-center">
    <form action="<?=$requestURL?>" method="POST">
        <input type="hidden" name="token" value="<?=$_SESSION['CSRF_TOKEN']?>">
        <input type="text" value="<?=$email ?? ''?>" name="email" class="uk-input" placeholder="email">
        <input type="password" name="password" class="uk-input" placeholder="password">
        <input type="submit" value="submit" class="uk-button uk-button-default uk-width-1-1 uk-margin-small-bottom">
    </form>
</div>