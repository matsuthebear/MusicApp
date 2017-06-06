<?php
	session_start();

	include ("../database/db.php"); /* It include the file db.php for the connection */

	$uid = $_POST['uid'];
	$pwd = $_POST['pwd'];



	/*
	This section verifies if the password of the user exists.
	If it is true, the code checks the password hashed
	*/
	$sql = "SELECT * from users WHERE username = '$uid'";
	$result =mysqli_query($connection, $sql);
	$row = mysqli_fetch_assoc($result);
	$hash_pwd = $row['pwd']; 
	$hash = password_verify($pwd,$hash_pwd); 
	//Error
	if ($hash == 0) {
		header("Location: ../index.php?error=empty");
		exit();
	//No Errors founded
	}else{
		$sql = "SELECT * from users WHERE username='$uid' AND pwd='$hash_pwd'";
		$result =mysqli_query($connection, $sql);

		if (!$row = mysqli_fetch_assoc($result)){

			//Do nothing -- echo("Your username or password is incorrect! Try again!");

		}else {

		$_SESSION['username'] = $row['username'];
		}
	

	header("Location: ../index.php");

	}



?>