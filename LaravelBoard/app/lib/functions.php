<?php

function user()
{
    if (array_key_exists('user', $_SESSION)) {
        return $_SESSION['user'];
    }
    return false;
}


/**
 * View
 *
 * @param string $view
 * @param array $vars
 *
 * @return mixed
 */
function view($view, $vars = [])
{
    foreach ($vars as $name => $value) {
        $$name = $value;    //가변변수
    }
    return require_once dirname(__DIR__, 2) . '/resources/views/layouts/app.php';
}

/**
 * is Owner
 *
 * @param int $id
 *
 * @return bool
 */
function owner($id)
{
    [ 'user_id' => $userId ] = selectOne('posts', $id);
    if ($user = $_SESSION['user']) {
        return $userId == $user['id'];
    }
    return false;
}

/**
 * Redirect
 * header는 리턴값이 void라서 true를 return하도록 만든 함수
 * @param string $path
 *
 * @return bool
 */
function redirect($url)
{
    header("Location: {$url}");
    return http_response_code() == 302;
}

/**
 * Reject
 * 
 * @param mixed $message
 *
 * @return void
 */
function reject($message = null)
{
    switch (gettype($message)) {
        case 'integer':            
            return http_response_code($message);
        case 'string':
            return header("Location: {$message}");
        default:
            return header("Location: {$_SERVER['HTTP_REFERER']}");
    }
}



/**
 * match
 *
 * @param string $path
 * @param string $method
 *
 * @return bool
 */
function match($path, $method = null)
{
    $is = ($_SERVER['PATH_INFO'] ?? '/') == $path;
    if ($method) {
        $is = $is && strtoupper($method) == $_SERVER['REQUEST_METHOD'];
    }
    return $is;
}




/**
 * Check request params
 * array_filter는 빈 배열을 제거해줌
 * @param array $requires
 *
 * @return bool
 */
function requires($requires)
{
    if (count($requires) == count(array_filter($requires))) {
        return true;
    }
    return false;
}

/**
 * set Routes
 *
 * @param array $routes
 *
 * @return void
 */
function routes($routes)
{
    foreach ($routes as [ $path, $method, $callbackString ]) {        
        if (match($path, $method)) {
            [ $file, $callback ] = explode('.', $callbackString);
            require_once dirname(__DIR__, 2)."/app/controllers/{$file}.php";
            call_user_func($callback, ...array_values($_GET));
            return true;
        }
    }
    return false;
}

/**
 * Get Configuration 불러오기
 * 
 * @param string $configString
 *
 * @return mixed
 */
function config($configString)
{
    $configParts = explode('.', $configString);

    $config = include dirname(__DIR__, 2) . '/config/' . $configParts[0] . '.php';
    return count($configParts) > 1 ? $config[next($configParts)] : $config;
}

function session($path, $lifetime) 
{
    ini_set('session.gc_maxlifetime', $lifetime);
    session_get_cookie_params($lifetime);

    session_save_path($path);

    return session_start();
}



function selectOne($table, $id) 
{
    return first("SELECT * FROM {$table} WHERE id=?", $id);
}


function transform($posts) 
{
    return array_map(function ($post) {
        ['username' => $username] = selectOne('users', $post['user_id']);
        $content = filter_var(
            mb_substr(strip_tags($post['content']), 0, 200),
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
        $mappings = array_merge(compact('username', 'content'), [
            'created_at' => date('h:i A, M j', strtotime($post['created_at'])),
            'url'        => "/post/read?id=".$post['id']
        ]);
        return array_merge($post, $mappings);
    }, $posts);
}


/**
 * CSRF_TOKEN
 *
 * @param array $guards
 *
 * @return bool
 */
function verify($guards)
{
    foreach ($guards as [ $path, $method ]) {
        if (match($path, $method)) {
            $token = array_key_exists('token', $_REQUEST) ? filter_var($_REQUEST['token'], FILTER_SANITIZE_STRING) : null;
            if (hash_equals($token, $_SESSION['CSRF_TOKEN'])) {
                return true;
            }
            return false;
        }
    }
    return true;
}


/**
 * Register auth guard
 *
 * @param array $guards
 *
 * @return bool
 */
function guard($guards)
{
    foreach ($guards as $path) {
        if (match($path)) {
            return user() ?: false;
        }
    }
    return true;
}