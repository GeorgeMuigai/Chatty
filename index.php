<?php
    include_once 'templates/header.php';
    session_start();


    if (isset($_SESSION['fname'])) {
        $active_user = $_SESSION['fname'] . " " . $_SESSION['lname'];
        $avatar = $_SESSION['avatar'];
    } else {
        header("location: login.php");
    }
?>

<div class="container">
    <div class="box">
        <div class="active-user">
            <div class="img-container">
                <img src="assets/profiles/<?php
                    echo $avatar;
                ?>" alt="<?php
                    echo $active_user . " user profile";
                ?>">
            </div>
            <div class="user-details">
                <div class="username">
                    <h4><?php
                        echo $active_user;
                    ?></h4>
                </div>
                <div class="status">
                    <p>Active now</p>
                </div>
            </div>
            <div class="logout">
                <button id="btn_logout">Logout</button>
            </div>
        </div>
        <div class="search">
            <input type="search"  id="inp_search" placeholder="search for users">
        </div>
        <div class="users">
           
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $("#btn_logout").click(() => {
        $.ajax({
            url: "includes/logout.inc.php",
            method: "POST",
            data: {
                logout: "1"
            },
            success: ((data, status) => {
                if (data === "success") {
                    alert ("logged out");
                    location.reload();
                }
            })
        });
    });

    function get_users () {
        $.ajax({
            url: "includes/display_users.inc.php",
            method: "POST",
            data: {
                get_users: "1"
            },
            success: ((data, status) => {
                // console.log(data);
                $('.users').html(data);
            }) 
        });
    }

    function get_searched_users (input) {
        $.ajax({
            url: 'includes/display_searched_users.inc.php',
            method: 'POST',
            data: {
                get_searched_users: input
            },
            success: ((data, status) => {
                $('.users').html(data);
                // console.log(data);
            })
        });
    }

    $("#inp_search").on('input', (() => {
        var input = $("#inp_search").val();
        get_searched_users(input);
        // console.log("changed to " + $("#inp_search").val());
    }));
    $(window).ready(() => {
        get_users();
    });
</script>