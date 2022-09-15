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
                <div class="message-box">
                    <p class=" " id="sn_message">this is a message</p>
                </div>
                <div class="name-group">
                    <div class="form-group">
                        <label>first Name</label>
                        <input type="text" placeholder="first name" id="fname">
                    </div>
                    <div class="form-group">
                        <label>last Name</label>
                        <input type="text" placeholder="last name" id="lname">
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
                    <button id="btn_register">Continue to chat</button>
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
        let messageTag = $("#sn_message");
        $("#signup").click(() => {
            $(".sign-up").css('display', 'block');
            $(".login").css('display', 'none');
        });
        $("#login").click( () => {
            $(".login").css('display', 'block');
            $(".sign-up").css('display', 'none');
        });

        $("#btn_register").click( () => {
            verifySignUp();
        });

        function verifySignUp () {
            let fname = $("#fname").val();
            let lname = $("#lname").val();
            let email = $("#signup_email").val();
            let password = $("#password").val();
            let con_pass = $("#confirm_password").val();

            if (empty(fname) || empty(lname) || empty(email) || 
                empty(password) || empty(con_pass)) {
                // console.log("empty fields");
                showMessage("empty");
            } else if (!passwordsMatch(password, con_pass)) {
                showMessage("pass");
            } else if (!isEmail(email)) {
                showMessage("email")
            } else if ($("#avatar").get(0).files.length === 0) {
                showMessage("image");
            } else {
                registerUser(fname, lname, email, password);
            }
        }

        function registerUser (first, last, email, password) {
            let user_image = $("#avatar").get(0).files;
            var fd = new FormData();
            fd.append('fname', first);
            fd.append('lname', last);
            fd.append('email_send', email);
            fd.append('pwd', password);
            fd.append('user_img', user_image[0]);
            $.ajax({
                method: "POST",
                contentType: false,
                processData: false,
                url: "includes/register.inc.php",
                data: fd,
                success: ((data, status) => {
                    // console.log(data);
                    showMessage(data);
                })
            });
        }

        function empty (name) {
            if ($.trim(name).length === 0) {
                return true;
            } else {
                return false;
            }
        }

        function passwordsMatch (pass, confirm) {
            if (pass === confirm) {
                return true;
            } else {
                return false;
            }
        }

        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }

        function showMessage (message) {
            if (message === "empty") {
                messageTag.html("please fill in all the fields!!");
                messageTag.addClass("error");
                messageTag.addClass("visible");

                removeMessage();
            } else if (message === "pass") {
                messageTag.html("passwords do not match!!");
                messageTag.addClass("error");
                messageTag.addClass("visible");

                removeMessage();
            } else if (message === "success") {
                messageTag.html("account created successfully");
                messageTag.addClass("visible");

                removeMessage();
            } else if (message === "email") {
                messageTag.html("invalid email address!!");
                messageTag.addClass("error");
                messageTag.addClass("visible");

                removeMessage();
            } else if (message === "image") {
                messageTag.html("select an image file!!");
                messageTag.addClass("error");
                messageTag.addClass("visible");

                removeMessage();
            } else if (message === "taken") {
                messageTag.html("email already registered!!");
                messageTag.addClass("error");
                messageTag.addClass("visible");

                removeMessage();
            } else if (message === "unsupported") {
                messageTag.html("please upload image type file!!");
                messageTag.addClass("error");
                messageTag.addClass("visible");

                removeMessage();
            }
        }

        function removeMessage () {
            setTimeout(() => {
                messageTag.removeClass('error');
                messageTag.removeClass('visible');
            }, 3000);
        }

    </script>
</html>