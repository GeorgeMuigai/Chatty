<?php
    require_once 'db.inc.php';
    session_start();

    if (isset($_POST['lg_email'])) {
        extract($_POST);

        $get_user = "SELECT * FROM users WHERE email = ?";

        if ($stmt = $con->prepare($get_user)) {
            $stmt->bind_param("s", $lg_email);
            $stmt->execute();

            $user = $stmt->get_result();

            if ($row = $user->fetch_assoc()) {
                $id = $row['id'];
                $fname = $row['first_name'];
                $lname = $row['last_name'];
                $pass = $row['password'];
                $avatar = $row['avatar'];

                if (password_verify($lg_pass, $pass)) {
                    $_SESSION['uid'] = $id;
                    $_SESSION['fname'] = $fname;
                    $_SESSION['lname'] = $lname;
                    $_SESSION['avatar'] = $avatar;

                    echo "success";
                } else {
                    echo "error";
                }
            } else {
                echo "error";
            }
        }
    }
?>