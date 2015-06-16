<?php
	include('includes/functions.php');
	if (login_check($conn) == true) {
        $logged = 'in';
    } else {
        $logged = 'out';
    }