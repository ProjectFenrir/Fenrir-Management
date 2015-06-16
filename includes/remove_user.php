<?php
	include_once 'db_connect.php';

	$conn = new mysqli(HOST,USER,PASSWORD, "fenrir_customers");
	if (!$conn) {
		echo "Connection error. Contact administrator.";
	}

	$username = (isset($_POST['username']) ? $_POST['username'] : null);
	$company = (isset($_POST['company']) ? $_POST['company'] : null);

	$query = "DELETE FROM users WHERE username LIKE '" . $username . "' AND company LIKE '" . $company . "'";

	$stmt = $conn->prepare($query);

	$stmt->execute();
	echo "User " . $username . " from " . $company . " has been removed";
	echo "<a href='../remove-user.php'>Click to return</a>";

	$stmt->close();
	$conn->close();