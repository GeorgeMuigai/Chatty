<?php
    session_start();
    require_once 'db.inc.php';
    if (isset($_POST['get_searched_users'])) {
        extract($_POST);

        $uid = $_SESSION['uid'];

        $search = mysqli_real_escape_string($con, $get_searched_users);
        // $get = "SELECT * FROM `users` WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%'";
        $get = "SELECT * FROM `users` WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%' OR full_name LIKE '%$search%'";

        $result = $con->query($get);

        while ($row = $result->fetch_assoc()) {
            $user_id = $row['id'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $avatar = $row['avatar'];

            if ($user_id == $uid) {
                echo '';
            } else {
                echo '<div class="user">
                <div class="img">
                    <img src="assets/profiles/'.$avatar.'" alt="'.$first_name.'user profile">
                </div>
                <div class="usr-details">
                    <div class="username">
                        <h4>'.$first_name.' '. $last_name.' </h4>
                    </div>
                    <div class="last-message">
                        <p>The last message will appear here gdggdgggggggggggggggggggggggggggggggggggggggggggggggddggdgdgdgdgdgdgdgdgdg</p>
                    </div>
                </div>
            </div>';                
            }
        }

        // if ($stmt = $con->prepare($get)) {
        //     $stmt->bind_param("s", $get_searched_users);
        //     $stmt->execute();

        //     $result = $stmt->get_result();
        // }
    }
?>