<?php

	
	session_start();
	
	include ("../database/db.php"); /* It include the file db.php for the connection */

	$uid = $_SESSION['username'];
	$pwd = $_SESSION['pwd'];
	$uid_change = $_POST['username'];
	$password = $_POST['password'];

	if (empty($uid_change) and empty($password)){
		header("Location: ../user.php?error=nochanges");
		exit();
		
	}else{
		if(!(empty($uid_change))){
			$sql_query = ("UPDATE users SET username = '$uid_change' WHERE username = '$uid'");
			$result = mysqli_query($connection, $sql_query);

		header("Location: ../user.php");
		}
	session_destroy();
	session_start();

	}
	


	

?>
