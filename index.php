<?php
    include_once 'includes/db_connect.php';
    include_once 'includes/functions.php';

    secure_session_start();

    if (login_check($conn) == true) {
        $logged = 'in';
    } else {
        $logged = 'out';
    }
?>
<!DOCTYPE HTML>
<!--
	TXT by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>FENRIRSecurity - Control Panel</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="homepage">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<div class="logo container">
						<div>
							<h1>FENRIRsecurity</h1>
							<p>Control Panel</p>
						</div>
					</div>
				</header>

			<!-- Banner -->
				<div id="banner-wrapper">
					<section id="banner">
						<h2>Login</h2>
						<form action='includes/process_login.php' method='post' name='login_form'>
							<input type='text' name='username' placeholder='Username'><br>
			                <input type='password' name='password' placeholder='Password'><br>
			                <button onclick='formhash(this.form, this.form.password);'><span class="fa fa-check-square fa-1x"></span></button>
			            </form>
		                <div class='login-error'>
			                <?php
			                    if (isset($_GET['error'])) {
			                        echo 'An error occurred during login';
			                    }
			                ?>
			            </div>
					</section>
				</div>
			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/skel-viewport.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
    		<script src="assets/js/functions.js"></script>
			<script src="assets/js/sha512.js"></script>
	</body>
</html>