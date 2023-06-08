<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "korean_journey";

	$con = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Unable to connect. Check your connection parameters.');

	$query = 'CREATE DATABASE IF NOT EXISTS $dbname';

	mysqli_query($con, $query) or die(mysqli_error($con));

	mysqli_select_db($con, $dbname) or die(mysqli_error($con));

	$query = 'CREATE TABLE IF NOT EXISTS users (
		id BIGINT(20) NOT NULL AUTO_INCREMENT,
		user_id BIGINT(20) NOT NULL,
		user_name VARCHAR(100) NOT NULL,
		password VARCHAR(100) NOT NULL,
		email TEXT NOT NULL,
		date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		PRIMARY KEY (id)
		)
		ENGINE=MyISAM';

	mysqli_query($con, $query) or die(mysqli_error($con));

	$query = 'CREATE TABLE IF NOT EXISTS content (
		id BIGINT(20) NOT NULL AUTO_INCREMENT,
		url TEXT NOT NULL,
		title TEXT NOT NULL,
		user VARCHAR(100) NOT NULL,
		user_id BIGINT(20) NOT NULL,
		location TEXT NOT NULL,
		date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		PRIMARY KEY (id)
		)
		ENGINE=MyISAM';

	mysqli_query($con, $query) or die(mysqli_error($con));
?>