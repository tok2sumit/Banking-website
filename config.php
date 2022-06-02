<?php
	// $servername = 'localhost';
	// $user = 'root';
	// $pass = '';
	// $dbname = 'customers';

	$servername = 'remotemysql.com';
	$user = 'kQB4K2sYQ5';
	$pass = 'yOhKlzYdSE';
	$dbname = 'kQB4K2sYQ5';

	$conn = mysqli_connect($servername,$user,$pass,$dbname);

	if(!$conn){
		die("Could Not Connect to the database".mysqli_connect_error());
	}

?>
