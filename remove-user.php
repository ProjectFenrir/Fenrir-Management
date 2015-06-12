<!DOCTYPE HTML>
<!--
	TXT by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>FENRIRsecurity - Control Panel</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<div class="logo container">
						<div>
							<h1>FENRIRsecurity</h1>
						</div>
					</div>
				</header>

			<!-- Main -->
				<div id="main-wrapper">
					<div id="main" class="container">
						<div class="row">
							<div class="3u 12u(mobile)">
								<div class="sidebar">

									<!-- Sidebar -->
										<!-- Menu -->
											<section>
												<h2 class="major"><span>Menu</span></h2>
												<ul class="divided">
													<a href='get-user.php'><li>Get user</li></a>
													<a href='add-user.php'><li>Add user</li></a>
													<a href='remove-user.php'><li>Remove user</li></a>
													<a href='list-users.php'><li>List users</li></a>
													<hr/>
													<a href="includes/logout.php"><li>Logout</li></a>
												</ul>
											</section>
								</div>
							</div>
							<div class="9u 12u(mobile) important(mobile)">
								<div class="content content-right">

									<!-- Content -->

										<article class="box page-content">

											<header>
												<h2>Remove user</h2>
											</header>

											<section>
												<h3>Insert info</h3>
												<input type="text" name="username" placeholder="Username"/>
													<input type="text" name="company" placeholder="Company"/>
													<input type="submit" name="submit" value="Remove" />
											</section>

										</article>

								</div>
							</div>
						</div>
					</div>
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

	</body>
</html>