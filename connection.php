<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "korean_journey";

	$con = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Unable to connect. Check your connection parameters.');

	$query = 'CREATE DATABASE IF NOT EXISTS $dbname';

	mysqli_query($con, $query) or die(mysqli_error($con));

	mysqli_select_db($con, $dbname) or die(mysqli_error($con));
?>