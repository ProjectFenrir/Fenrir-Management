<?php
    // include_once 'includes/db_connect.php';
    // include_once 'includes/functions.php';

    // secure_session_start();

    // if (login_check($mysqli) == true) {
    //     $logged = 'in';
    // } else {
    //     $logged = 'out';
    // }
?>
<!DOCTYPE html>
<html>
<head>
    <title>FENRIRsec - Management</title>

    <link rel="stylesheet" type="text/css" href="res/css/style.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script type="text/javaScript" src="res/js/sha512.js"></script>
    <script type="text/javaScript" src="res/js/functions.js"></script>
</head>
<body>
    <div id='container'>
        <div class='login-wrapper'>
            <form action='includes/process_login.php' method='post' name='login_form'>
                <input type='text' name='username' placeholder='Username'><br>
                <input type='password' name='password' placeholder='Password'><br>
                <a href="controlpanel.php"><span class="fa fa-check-square fa-2x" style="margin-left:46%;"></span></a>
                <!-- <input type='button' onclick='formhash(this.form, this.form.password);'></button> -->
            </form>
            <div class='login-error'>
                <?php
                    if (isset($_GET['error'])) {
                        echo 'An error occurred during login';
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>