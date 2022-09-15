<?php
    session_start();

    if (isset($_SESSION['fname'])) {
        echo "hello " . $_SESSION['fname'] . " " . $_SESSION['lname'];
    } else {
        echo "please login to enjoy";
    }
?>