docs.php.net/manual/en/mysqli.summary.php
<?php

/**
 * Connection
 */
$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'phpblog'
);

/**
 * Query
 * 트랜잭션: 명령 집합, 일련의 절차
 * 실패하면 전체가 roll back 됨
 */
//Case 1. mysqli_query
$queryString = 'CREATE TABLE tests(
    id INT AUTO_INCREMENT PRIMARY KEY,
    message VARCHAR(255)
)';
mysqli_query($conn, $queryString);
//Case 2. mysqli_prepare
mysqli_autocommit($conn, false);    //mysql는 자동으로 커밋하는데 그걸 꺼주고(쿼리가 하나만 있을 때는 굳이 안써도 된다)
$stmt = mysqli_prepare($conn, 'INSERT INTO tests(message) VALUES(?)');
$params = ['hello, world'];
mysqli_stmt_bind_param($stmt, 's', ...$params);
mysqli_stmt_execute($stmt);
mysqli_commit($conn);   //커밋하거나
//mysqli_rollback($conn); //롤백하거나

/**
 * Select
 */
//case 1. mysqli_stmt_get_result    assoc연관배열
$stmt = mysqli_prepare($conn, 'SELECT * FROM tests');
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
while ($row = mysqli_fetch_assoc($result)) {
    var_dump($row);
}
//case 2. mysqli_stmt_bind_result   fetch
$stmt = mysqli_prepare($conn, 'SELECT message FROM tests');
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $message);
while ($row = mysqli_stmt_fetch($stmt)) {
    var_dump($message);
}

/**
 * Close connection
 */
mysqli_close($conn);
mysqli_query($conn, 'DROP TABLE tests');

