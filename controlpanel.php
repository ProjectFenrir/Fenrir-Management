<!DOCTYPE html>
<html>
<head>
	<title>FENRIRsec - Control Panel</title>

    <link rel="stylesheet" type="text/css" href="res/css/style.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body>
	<div id='container'>
		<div class='top'>FENRIRsec</div>
		<div class='profile-actions'>
			<?php echo "Foo Bar"; ?>
			<!-- <ul>
				<li>select1</li>
				<li>select2</li>
			</ul> -->
		</div>

		<div class='menu'>
			<ul>
				<a href='getuser.php'><li>Get user</li></a>
				<a href='adduser.php'><li>Add user</li></a>
				<a href='removeuser.php'><li>Remove user</li></a>
				<a href='listuser.php'><li>List user</li></a>
			</ul>
		</div>
		<div class='content'>
			<p>Overview control panel</p>
		</div>
	</div>
</body>
</html>