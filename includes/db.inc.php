<?php
    $server_name = "localhost";
    $username = "root";
    $password = "";
    $db_name = "chatty_db";

    $con = new mysqli($server_name, $username, $password, $db_name);

    if (!$con) {
        die ($con->errno);
    }
?>