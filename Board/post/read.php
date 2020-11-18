<?php 

require_once dirname(__DIR__) . '/uikit/app.php';

$_SESSION['CSRF_TOKEN'] = bin2hex(random_bytes(32));

if (array_key_exists('user', $_SESSION)) {
    $user = $_SESSION['user'];
}

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

// 해당 id의 posts 글 가져오기
$stmt = mysqli_prepare(
    $GLOBALS['DB_CONNECTION'],
    'SELECT * FROM posts WHERE id=? LIMIT 1'
);

mysqli_stmt_bind_param($stmt, 'i', $id);
if (mysqli_stmt_execute($stmt)) {
    $result = mysqli_stmt_get_result($stmt);
    [
        'user_id'   => $userId,
        'title'     => $title,
        'content'   => $content,
        'created_at'=> $createdAt
    ] = mysqli_fetch_assoc($result);
}
mysqli_stmt_close($stmt);

// 해당 id가 쓴 모든 글 가져오기
if ($userId) {
    $stmt = mysqli_prepare(
        $GLOBALS['DB_CONNECTION'],
        'SELECT * FROM users WHERE id=?'
    );
    mysqli_stmt_bind_param($stmt, 'i', $userId);
    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        [
            'username'  => $username,
            'email'     => $email
        ] = mysqli_fetch_assoc($result);
    }
}

if ($userId && isset($user)) {
    $isOwner = $userId == $user['id'];
}

require_once dirname(__DIR__).'/layouts/top.php'; 
?>

<div id="main__article" class="uk-container">
    <article>
        <h1 class="uk-article-title"><?=$title?></h1>
        <div class="uk-text-meta">by <?=$username?></div>
        <div class="uk-text-meta"><?=$createdAt?>
            <?php if(isset($isOwner)) : ?>
                <span class="owner">
                    <a href="/Board/post/delete_process.php?id=<?=$id?>&token=<?=$_SESSION['CSRF_TOKEN']?>" class="uk-link-text" id="delete">delete</a>
                    <a href="/Board/post/update.php?id=<?=$id?>" class="uk-link-text" id="update">update</a>
                </span>
            <?php endif;?>
        </div>
        <div class="uk-text-lead uk-margin-bottom"><?=$content?></div>
    </article>
</div>

<?php require_once dirname(__DIR__).'/layouts/bottom.php'; ?>