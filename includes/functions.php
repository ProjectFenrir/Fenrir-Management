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
	    // if previous session found, delete it
	    session_regenerate_id(true);
	}

	function login($username, $password, $mysqli) {
		if ($stmt = $mysqli->prepare('SELECT id, username, password, salt FROM users WHERE email = "test@example.com" LIMIT 1')) {
			$stmt->bind_param('s', $username);
			$stmt->execute();
			$stmt->store_result();

			$stmt->bind_result($user_id, $username, $db_password, $salt);
			$stmt->fetch();

			$password = hash('sha512', $password, $salt);
			if ($stmt->num_rows == 1) {
				if ($db_password == $password) {
					$user_browser = $_SERVER['HTTP_USER_AGENT'];
					$_SESSION['user_id'] = $user_id;

					$_SESSION['username'] = $username;
	                $_SESSION['login_string'] = hash('sha512', $password . $user_browser);
	                return true;
				} else {
					$currentTime = time();
					$mysqli->query("INSERT INTO login_attempts(user_id, currentTime) VALUES ('$user_id', '$currentTime')");
					return false;
				}
			} else {
				// No user found
				return false;
			}
		}
	}

	function login_check($mysqli) {
		if (isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string'])) {
			$user_id = $_SESSION['user_id'];
			$username = $_SESSION['username'];
			$login_string = $_SESSION['login_string'];

			$user_browser = $_SERVER['HTTP_USER_AGENT'];

			if ($stmt = $mysqli->prepare('SELECT password FROM users WHERE id = ? LIMIT 1')) {
				$stmt->bind_param('i', $user_id);
				$stmt->execute();
				$stmt->store_result();

				if ($stmt->num_rows == 1) {
					$stmt->bind_result($password);
					$stmt->fetch();
					$login_check = hash('sha512', $password, $user_browser);

					if ($login_check == $login_string) {
						// success
						return true;
					} else {
						// no success
						return false;
					}
				} else {
					// no success
					return false;
				}
			} else {
				// no success
				return false;
			}
		} else {
			// no success
			return false;
		}
	}