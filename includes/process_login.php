<?php
    include_once 'db_connect.php';
    include_once 'functions.php';
     
    secure_session_start();

    $username = $_POST['username'];

    // Form validation
    if (!preg_match('/[^a-zA-Z0-9]/i', $username)) {
            header('Location: ../index.php?error=2');
    }

    
    if (isset($_POST['username'], $_POST['hexField'])) {
        $username = $_POST['username'];
        $password = $_POST['hexField'];
        
        if (login($username, $password, $conn) == true) {
            $_SESSION['loggedin'] = true;
            header('Location: ../get-user.php');
        } else {
            header('Location: ../index.php?error=1');
        }
    } else {
        echo 'Something went wrong. Invalid request.';
    }