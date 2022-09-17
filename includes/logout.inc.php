<?php
    session_start();

    // destroy session to logout user
    session_destroy();

    echo "success";
?>