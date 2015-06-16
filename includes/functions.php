<?php
	include_once 'db-config.php';

	function secure_session_start() {
		$session_name = 'secure_session_id';
		$secure = SECURE;
		// Disable cookie access using Javascript
		$httpOnly = true;

		if (ini_set('session.use_only_cookies', 1) === FALSE) {
	        header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
	        exit();
	    }

	    $cookieParams = session_get_cookie_params();
	    session_set_cookie_params(
	    	$cookieParams['lifetime'],
	    	$cookieParams['path'],
	    	$cookieParams['domain'],
	    	$secure,
	    	$httpOnly);

	    session_name($session_name);
	    session_start();
	    // If a session is found, delete/renew it
	    session_regenerate_id(true);
	}

	function login($username, $password, $conn) {
		if ($stmt = $conn->prepare('SELECT id, username, password, salt FROM users WHERE username = ? LIMIT 1')) {
			$stmt->bind_param('s', $username);
			$stmt->execute();
			$stmt->store_result();

			$stmt->bind_result($user_id, $username, $db_password, $salt);
			$stmt->fetch();

			$password = hash('sha512', $password . $salt);
			if ($stmt->num_rows == 1) {
				if ($db_password == $password) {
					$user_browser = $_SERVER['HTTP_USER_AGENT'];
					$_SESSION['user_id'] = $user_id;
					$_SESSION['loggedin'] = true;
					$_SESSION['username'] = $username;
	                $_SESSION['login_string'] = hash('sha512', $password . $user_browser);
	                return true;
				}
			} else {
				echo "User not found";
				return false;
			}
		}
	}

	function login_check() {
		$loggedin = (isset($_SESSION['loggedin']) ? $_SESSION['loggedin'] : null);
		if (!$loggedin) {
			return true;
		}
	}