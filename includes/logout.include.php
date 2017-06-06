<?php
	/* It creates a new connection / connects with the previous one,
	   and then the connection is destroyed */ 
	session_start();
	session_destroy();

	header("Location: ../index.php");
?>