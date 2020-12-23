<?php

/* CREATE TABLE sessions(
    `id` VARCHAR(255) UNIQUE NOT NULL,
    `payload` TEXT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
); */

//ini_set('session.gc_maxlifetime', 10);

/**
 * Session Handler Interface
 * DB에 세션 저장
 * 왜 사용하냐면 세션은 서버에 저장되는 것이기 때문이다.
 * 만약 L4로 3개의 서버에 로드밸런싱하고 있으면
 * 한 사용자의 세션 정보가 하나의 서버에만 저장이 되기 때문에
 * 로드밸런싱으로 다른 서버로 옮겨지면 갑자기 연결이 끊어지는 문제가 발생할 수 있다
 * 따라서 세션을 시작하면 DatabaseSessionHandler클래스를 통해서 open메서드, read메서드를 실행시키고
 * DB에 값을 저장한 후에
 * 세션값을 사용할 때 DB에 접근해서 사용하게 되면
 * 서버 한개에만 세션값을 저장했을 때의 문제점을 없앨 수 있게된다.
 */
class DatabaseSessionHandler implements SessionHandlerInterface
{
    /**
     * @var PDO $pdo
     */
    private PDO $pdo;

    /**
     * Create a new DatabaseSessionHandler
     *
     * @return DatabaseSessionHandler
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Open Session
     *
     * @param string $save_path
     * @param string $session_name
     *
     * @return bool
     */
    public function open($save_path, $session_name)
    {
        return true;
    }

    /**
     * read session payload
     *
     * @param string $session_id
     *
     * @return string
     */
    public function read($session_id)
    {
        $sth = $this->pdo->prepare('SELECT * FROM sessions WHERE `id` = :id');
        if ($sth->execute([ ':id' => $session_id ])) {
            if ($sth->rowCount() > 0) {
                $payload = $sth->fetchObject()->payload;
            } else {
                $this->pdo->prepare('INSERT INTO sessions(`id`) VALUES(:id)')->execute([ ':id' => $session_id ]);
            }
        }
        return $payload ?? '';
    }

    /**
     * write session data
     *
     * @param string $session_id
     * @param string $session_data
     *
     * @return bool
     */
    public function write($session_id, $session_data)
    {
        return $this->pdo
            ->prepare('UPDATE sessions SET `payload` = :payload WHERE `id` = :id')
            ->execute([ ':payload' => $session_data, ":id" => $session_id ]);
    }

    /**
     * run Session GC
     *
     * @param int $maxlifetime
     *
     * @return bool
     */
    public function gc($maxlifetime)
    {
        $sth = $this->pdo->prepare('SELECT * FROM sessions');
        if ($sth->execute()) {
            while ($row = $sth->fetchObject()) {
                $timestamp = strtotime($row->created_at);
                if (time() - $timestamp > $maxlifetime) {
                    $this->destroy($row->id);
                }
            }
            return true;
        }
        return false;
    }

    /**
     * destroy Session
     *
     * @param string $session_id
     *
     * @return bool
     */
    public function destroy($session_id)
    {
        return $this->pdo
            ->prepare('DELETE FROM sessions WHERE `id` = :id')
            ->execute([ ':id' => $session_id ]);
    }

    /**
     * close Session
     *
     * @return bool
     */
    public function close()
    {
        return true;
    }
}

session_set_save_handler(new DatabaseSessionHandler(new PDO('mysql:dbname=phpblog;host=localhost;', 'root', '')));

session_start();

$_SESSION['message'] = 'Hello, world';
$_SESSION['foo'] = new stdClass();

// session_gc();