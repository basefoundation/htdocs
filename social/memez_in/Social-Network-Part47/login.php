<?php
include('classes/DB.php');

if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$username))) {

                if (password_verify($password, DB::query('SELECT password FROM users WHERE username=:username', array(':username'=>$username))[0]['password'])) {
                        echo 'Logged in!';
                        $cstrong = True;
                        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                        $user_id = DB::query('SELECT id FROM users WHERE username=:username', array(':username'=>$username))[0]['id'];
                        DB::query('INSERT INTO login_tokens VALUES (\'\', :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));

                        setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                        setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
                        header("Location: index.php");

                } else {
                        echo 'Incorrect Password!';
                }

        } else {
                echo 'User not registered!';
        }

}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SocialNetwork</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="login-clean">
        <form method="post" action="login.php">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-navigate"></i></div>
            <div class="form-group">
                <input class="form-control" type="text" id="username" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
               <input type="submit" name="login" value="Login">
            </div><a href="#" class="forgot">Forgot your email or password?</a></form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- <script src="assets/js/bs-animation.js"></script> -->
    <script type="text/javascript">
        // $('#login').click(function() {

        //         $.ajax({

        //                 type: "POST",
        //                 url: "api/auth",
        //                 processData: false,
        //                 contentType: "application/json",
        //                 data: '{ "username": "'+ $("#username").val() +'", "password": "'+ $("#password").val() +'" }',
        //                 success: function(r) {
        //                         //console.log(r)
        //                         window.location ="index.php";
        //                 },
        //                 error: function(r) {
        //                         setTimeout(function() {
        //                         $('[data-bs-hover-animate]').removeClass('animated ' + $('[data-bs-hover-animate]').attr('data-bs-hover-animate'));
        //                         }, 2000)
        //                         $('[data-bs-hover-animate]').addClass('animated ' + $('[data-bs-hover-animate]').attr('data-bs-hover-animate'))
        //                         console.log(r)
        //                 }

        //         });

        // });
    </script>
</body>

</html>
