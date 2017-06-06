<?php
	$server = "localhost";
	$user = "insert_username_here";
	$password = "insert_password_if_exists";
	$database = "insert_databasename_here";


	$connection = mysqli_connect($server, $user, $password, $database);

	if (!$connection){
		die("Connection aborted : ".mysqli_connect_error());
	}




?>
