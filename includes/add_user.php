<?php
	include_once 'db_connect.php';
	include_once 'functions.php';

	$conn = new mysqli(HOST,USER,PASSWORD, "fenrir_clients");
	if (!$conn) {
		echo "Connection error. Contact administrator.";
	}

	$username = (isset($_POST['username']) ? $_POST['username'] : null);
	$company = (isset($_POST['company']) ? $_POST['company'] : null);
	$password = (isset($_POST['password']) ? $_POST['password'] : null);
	$repassword = (isset($_POST['repassword']) ? $_POST['repassword'] : null);
	$email = (isset($_POST['email']) ? $_POST['email'] : null);

	$query = "SELECT username, company FROM `users` WHERE username LIKE '" . $username . "' AND company LIKE '" . $company . "'";
	$result = $conn->query($query);

	if ($result->num_rows > 0) {
		echo "User in the given company already exists. No user has been created.";
		echo "<br/><a href='/'>Click to return</a>";
	} else if ($password != $repassword) {
		echo "Passwords do not match.";
		echo "<br/><a href='/'>Click to return</a>";
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo "Invalid email.";
		echo "<br/><a href='/'>Click to return</a>";
	} else {
		$email = (isset($_POST['email']) ? $_POST['email'] : null);
		$phone = (isset($_POST['phone']) ? $_POST['phone'] : null);

		// Generate a random 128 String
		$salt = '';
		for ($i = 0; $i < 4; $i++) {
			$salt = substr(md5(rand()), 0, 32) . $salt;
		}
		$password = hash('sha512', $password . $salt);

	    $query = "INSERT INTO `users` VALUES(id,'".$username."','".$company."','".$email."','".$phone."','".$password."','".$salt."')";
	    $stmt = $conn->prepare($query);
	    $stmt->execute();
	    
		echo "User " . $username . " has been added";
		echo "<br/><a href='../add-user.php'>Click to return</a>";
		
		$stmt->close();
	}
	$conn->close();