<?php

    $server = 'localhost';
    $user = 'root';
    $pwd = '';
    $db = 'monitoramento';
    $mysqli = new mysqli($server, $user, $pwd, $db);
    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

?>