<?php

    require_once 'db.inc.php';

    extract($_POST);
    
    $uploaded = false;

    $target_dir = '../assets/profiles/';
    $file_name = $_FILES['user_img']['name'];
    $tmp_name = $_FILES['user_img']['tmp_name'];

    $file_path = $target_dir . $file_name;

    $file_type = pathinfo($file_path, PATHINFO_EXTENSION);
    $accepted_types = array('png', 'jpeg', 'jpg', 'svg');

    if (in_array($file_type, $accepted_types)) {
        if (move_uploaded_file($tmp_name, $file_path)) {
            $uploaded = true;
        } else {
            echo "error";
        }
    } else {
        echo "unsupported";
        die ();
    }

    if (isset($_POST['fname']) && $uploaded) {
        extract($_POST);

        $hash_pass = password_hash($pwd, PASSWORD_DEFAULT);
        $full_name = $fname . ' ' . $lname;

        $reg_user = "INSERT INTO users (first_name, last_name, full_name, email, password, avatar) VALUES (?, ?, ?, ?, ?, ?)";

        if (userExists($email_send, $con)) {
            echo "taken";
        } else {
            if ($stmt = $con->prepare($reg_user)) {
                $stmt->bind_param("ssssss", $fname, $lname, $full_name, $email_send, $hash_pass, $file_name);
                $stmt->execute();

                echo "success";
            }
        }
    }

    function userExists ($email, $conn) {
        $check_user = "SELECT * FROM users WHERE email = ?";

        if ($stmt = $conn->prepare($check_user)) {
            $stmt->bind_param("s", $email);
            $stmt->execute();

            $result = $stmt->get_result();

            if ($row = $result->fetch_assoc()) {
                return true;
            } else {
                return false;
            }
        }
    }
?>