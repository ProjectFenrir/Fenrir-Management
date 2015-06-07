<?php
	include_once 'functions.php';
	secure_session_start();

	$_SESSION = array();

	$params = session_get_cookie_params();

	// Delete the cookie being used with earlier specified params
	setcookie(session_name(),
		'', time() - 42000,
		$params['path'],
		$params['domain'],
		$params['secure'],
		$params['httpOnly']);

	session_destroy();
	header('Location: ../index.php');