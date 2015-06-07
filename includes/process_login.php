<?php
    include_once 'db_connect.php';
    include_once 'functions.php';
     
    secure_session_start();

    if (isset($_POST['username'], $_POST['hexField'])) {
        $username = $_POST['username'];
        $password = $_POST['hexField'];
     
        if (login($username, $password, $mysqli) == true) {
            header('Location: ../controlpanel.php');
        } else {
            header('Location: ../index.php?error=1');
        }
    } else {
        echo 'Invalid Request';
    }