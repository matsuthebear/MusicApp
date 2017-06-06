<?php
	session_start();
	include ("../database/db.php");

	if (isset($_POST['insert'])){
		$id = $_POST['album_id'];
		$name = $_POST['name'];
		$year = $_POST['year'];
		$band = $_POST['band'];
		$type = $_POST['type'];


		$sql = "SELECT * FROM album WHERE id = '$id'";
		$result =mysqli_query($connection, $sql);
		if ($row = mysqli_fetch_assoc($result)){
			if ($name == ""){
				$name = $row['name'];
			}
			if ($year == ""){
				$year = $row['year'];
			}
			if ($band == ""){
				$band = $row['band'];
			}
			if ($type == ""){
				$type = $row['type'];
			}
			$file = $_FILES['image'];
			$file_name = $file['name'];
			$file_tmp = $file['tmp_name'];
			$file_size = $file['size'];
			$file_ext = explode('.',$file_name);
			$file_ext = strtolower(end($file_ext));
			echo('file_management');
			$new_file_name = uniqid('',true).'.'.$file_ext;
			$destination = '/membri/matteomarzio/musicapp/albums/';
            echo('destination');

			$destination = '/membri/matteomarzio/musicapp/albums/'. $band . '/' . $name . '/' . $new_file_name;
        		echo($file_tmp. ' -----> ' .  $destination);
        	if(move_uploaded_file($file_tmp, $destination)){
				echo('<br> move_uploaded_file  <br>');
				$destination = '/musicapp/albums/'. 
           		$band . '/' . $name . '/' . $new_file_name;

                        
			$query = "UPDATE album SET 
			    name='$name',
			    year='$year',
			    band='$band',
			    type='$type',
			    image='$destination' 
			    WHERE id = '$id'";
			if(mysqli_query($connection, $query)){
				header('Location : ../show_album.php');
			}else{
			header('Location : ../update_album.php?#error=commonerror');
		}
		}}}
?>