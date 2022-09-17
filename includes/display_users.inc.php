<?php
    require_once 'db.inc.php';
    session_start();

    if (isset($_POST['get_users'])) {
        $uid = $_SESSION['uid'];

        $get = "SELECT * FROM users";

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
    }
?>