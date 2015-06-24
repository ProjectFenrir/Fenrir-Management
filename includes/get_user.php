<?php
	include_once 'db_connect.php';

	$conn = new mysqli(HOST,USER,PASSWORD, "fenrir_clients");
	if (!$conn) {
		echo "Connection error. Contact administrator.";
	}

    $query = "SELECT username, company, email, phone FROM `users` WHERE username LIKE '" . $_GET['username'] . "'";

    $stmt = $conn->prepare($query);

    $stmt->execute();
    $stmt->bind_result($username, $company, $email, $phone);
    echo "<table>";
	echo "<th>Username</th><th>Company</th><th>Email</th><th>Phone</th>";
	while ($stmt->fetch()) {
		echo "<tr><td>" . $username . "</td>";
		echo "<td>" . $company . "</td>";
		echo "<td>" . $email . "</td>";
		echo "<td>" . $phone . "</td></tr>";
	}
	echo "</table>";
	echo "<a href='../get-user.php'>Click to return</a>";

	$stmt->close();
	$conn->close();