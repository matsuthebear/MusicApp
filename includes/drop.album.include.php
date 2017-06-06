<?php
	session_start();
	include ("../database/db.php");

	if (isset($_POST['insert'])){
		$id = $_POST['album_id'];	
        
		$sql = "DELETE FROM album WHERE id='$id'";

		if (mysqli_query($connection, $sql)=== TRUE) {
        	$sql = "DELETE FROM song WHERE album = '$id'";
            if (mysqli_query($connection, $sql)=== TRUE) {
            	header('Location : ../show_album.php?done');
                }else{
                header('Location : ../drop_album.php?error=nodeletesong');
				} 
           }else {
    		header('Location : ../drop_album.php?error=nodeletealbum');
		}
    }
?>