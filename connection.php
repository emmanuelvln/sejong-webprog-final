<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "korean_journey";

	if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
		die("failed to connect!");
	}
?>