<?php

/**
 * Connect to MySQL database
 *
 * @param string $hostname 호스트명
 * @param string $username 유저이름
 * @param string $password 패스워드
 * @param string $database 데이터베이스명
 *
 * @return object
 */
function connect($hostname, $username, $password, $database) 
{
    return $GLOBALS['DB_CONNECTION'] = mysqli_connect($hostname, $username, $password, $database);
}


/**
 * DB 연결 끊기
 * 
 * @return bool
 */
function close() 
{
    if (array_key_exists('DB_CONNECTION', $GLOBALS) && $GLOBALS['DB_CONNECTION']) {
        return mysqli_close($GLOBALS['DB_CONNECTION']);
    }
    return false;
}


/**
 * Get First
 *
 * @param string $query 쿼리
 * @param array $params 파라미터
 *
 * @return mixed
 */
function first($query, $params) 
{
    return raw($query, $params, function ($result) {
        if ($row = mysqli_fetch_assoc($result)) {
            if (is_array($row) && count($row) > 0) {
                return $row;
            }
        }
        return [];     
    });
}

/**
 * get Rows
 *
 * @param object $conn
 * @param string $query
 * @param array $params
 *
 * @return array
 */
function rows($query, ...$params)
{
    return raw($query, $params, function ($result) {
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($rows, $row);
        }
        return $rows;
    });
}

/**
 * 쿼리 실행
 */
function execute($query, ...$params) 
{
    return raw($query, $params);
}

/**
 * 함수의 원형
 */
function raw($query, $params=[], $callback=null) 
{
    $stmt = mysqli_prepare($GLOBALS['DB_CONNECTION'], $query);
    if (count($params) > 0) {
        $mappings = [
            'integer' => 'i',
            'string'  => 's',
            'double'  => 'd'
        ];
        $bindstring = array_reduce($params, function ($bindstring, $arg) use ($mappings) {
            return $bindstring .= $mappings[gettype($arg)];
        });
        mysqli_stmt_bind_param($stmt, $bindstring, ...array_values($params));
    }
    if (mysqli_stmt_execute($stmt)) {
        if (is_callable($callback)) {
            $res = call_user_func($callback, mysqli_stmt_get_result($stmt));
        }
        $is = $res ?? true;
    }
    mysqli_stmt_close($stmt);
    return $is ?? [];
}