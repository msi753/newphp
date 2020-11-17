<?php
/**
 * Socket server
 */
$server = stream_socket_server('tcp://127.0.0.1:8888', $errno, $errstr);

/**
 * Get data from client
*/
while ($sock = stream_socket_accept($server)) {
    stream_socket_get_name($sock, false);

    //send data to clinet
    fwrite($sock, 'Hello, world from Server', 1024);

    //get data from client
    echo stream_get_contents($sock);
}


/**
 * Close a server
 */
fclose($server);