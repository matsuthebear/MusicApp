<?php

	
	session_start();
	
	include ("../database/db.php"); /* It include the file db.php for the connection */

	$first = $_POST['first'];
	$last = $_POST['last'];
	$uid = $_POST['uid'];
	$pwd = $_POST['pwd'];
	$pwd2 = $_POST['pwd2'];

	/* Checks if those password are equal */
	if ($pwd !== $pwd2){
		header("Location: ../signup.php?error=pwderror");
		exit();
	}
	/*
	Checks if there are no empty values. If there are some, it kills the process */
	if (empty($first) or empty($last) or empty($last) or empty($pwd) ){
		header("Location: ../signup.php?error=empty");
		exit();

	}
	else{
		/* Checks if is there an existing user */
		$sql_query = ("SELECT username FROM users WHERE username = '$uid'");
		$result = mysqli_query($connection, $sql_query);
		$uidchecker = mysqli_num_rows($result);

		if ($uidchecker > 0) {
			header("Location: ../signup.php?error=username");
		}else{
		/*Hashing the password...*/
		$encrypted_pwd = password_hash($pwd,PASSWORD_DEFAULT); 

		$sql_query = ("INSERT INTO users (username, first, last, pwd) VALUES ('$uid' , '$first', '$last' , '$encrypted_pwd')");
		$result = mysqli_query($connection, $sql_query);

		header("Location: ../index.php");
		}
	}



	

?>
