<?php
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/CSS/login.css?v=<?php
        echo time();
    ?>">
    <link rel="icon" type="image/x-icon" href="assets/images/chat.png">
    <title>Chatty - Chat online with everyone</title>
</head>
<body>
    <div class="container">
        <div class="box">
            <div class="sign-up">
                <div class="title">
                    <img src="assets/images/chat.png" alt="chatty logo">
                    <h2>Chatty</h2>
                </div>
                <div class="name-group">
                    <div class="form-group">
                        <label>first Name</label>
                        <input type="text" placeholder="first name">
                    </div>
                    <div class="form-group">
                        <label>last Name</label>
                        <input type="text" placeholder="last name">
                    </div>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" id="signup_email" placeholder="enter your email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" id="password" placeholder="enter your email">
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" id="confirm_password" placeholder="enter your email">
                </div>
                <div class="form-group file">
                    <label>Select Profile Photo</label>
                    <input type="file" id="avatar" accept="image/*">
                </div>
                <div class="form-group">
                    <button>Continue to chat</button>
                </div>
                <p>Already have an account? <span id="login">Login</span> </p>
            </div>
            <div class="login">
            <div class="title">
                    <img src="assets/images/chat.png" alt="chatty logo">
                    <h2>Chatty</h2>
                </div>
                <div class="message-box">
                    <p class=" " id="message">this is a message</p>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" id="login_email" placeholder="enter your email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" id="lg_password" placeholder="enter your email">
                </div>
                <div class="form-group">
                    <button>Continue to chat</button>
                </div>
                <p>doesn't have an account? <span id="signup">sign up</span> </p>
            </div>
        </div>
    </div>
</body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $("#signup").click(() => {
            $(".sign-up").css('display', 'block');
            $(".login").css('display', 'none');
        });
        $("#login").click( () => {
            $(".login").css('display', 'block');
            $(".sign-up").css('display', 'none');
        });
    </script>
</html>