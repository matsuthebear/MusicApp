<?php
	$server = "localhost";
	$user = "matteomarzio";
	$password = "";
	$database = "my_matteomarzio";


	$connection = mysqli_connect($server, $user, $password, $database);

	if (!$connection){
		die("Connection aborted : ".mysqli_connect_error());
	}




?>