<?php
	$servername = 'localhost';
	$user = 'root';
	$pass = '';
	$dbname = 'customers';

	// $servername = 'remotemysql.com';
	// $user = '1wHxT0G64W';
	// $pass = '690jlYVmFK';
	// $dbname = '1wHxT0G64W';

	$conn = mysqli_connect($servername,$user,$pass,$dbname);

	if(!$conn){
		die("Could Not Connect to the database".mysqli_connect_error());
	}

?>
