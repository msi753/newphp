<?php

require_once 'Board/uikit/app.php';
require_once 'Board/layouts/top.php';

$page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
$page = $page ?: 0;

$stmt = mysqli_prepare(
    $GLOBALS['DB_CONNECTION'],
    'SELECT * FROM posts ORDER BY id DESC LIMIT 3 OFFSET ?'
);
$page = $page * 1;
mysqli_stmt_bind_param($stmt, 'i', $page);
if (mysqli_stmt_execute($stmt)) {
    $result = mysqli_stmt_get_result($stmt);
    $posts = [];
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($posts, $row);
    }
}
mysqli_stmt_close($stmt);

$posts = array_map(function ($post) {
    $stmt = mysqli_prepare(
        $GLOBALS['DB_CONNECTION'],
        'SELECT * FROM usere WHERE id=?'
    );
    $user_id = $post['user_id'];
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        ['username' => $username ] = mysqli_fetch_assoc($result);
    }
    mysqli_stmt_close($stmt);

    $content = filter_var(mb_substr(strip_tags($post['content']), 0, 200), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $mappings = array_merge(
        compact('username', 'content'), 
        [
            'created_at' => date('h:i:A, M j', strtotime($post['created_at'])),
            'url'        => '/Board/post/read.php?id='.$post['id']
        ]
    );

}, $posts);

?>

<div id="main__index" class="uk-container">
    <ul class="uk-list">
        <?php foreach($posts as $post) : ?>
            <li>
                <article class="uk-article">
                    <h1 class="uk-article-title">
                        <a href="<?=$post['url']?>" class="uk-link-reset"><?=$post['title']?></a>
                    </h1>
                    <div class="uk-link-meta">by <?=$post['username']?></div>
                    <p class="uk-margin"><?=$post['content']?></p>
                    <div class="uk-text-meta"><?=$post['created_at']?></div>
                </article>
            </li>
        <?php endforeach;?>
    </ul>
</div>
<button id="readmore" class="uk-button uk-button-default">Read more</button>
<?php require_once '/Board/layouts/bottom.php'; ?>