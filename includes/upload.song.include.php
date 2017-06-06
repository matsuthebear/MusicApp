<?php
	session_start();
	include ("../database/db.php");

	if (isset($_POST['insert'])){
    	echo('isset_insert  <br>');
		if(isset($_FILES['file'])){
        	echo('isset_image  <br>');
			$title = $_POST['title'];
			$position = $_POST['position'];
			$author= $_POST['author'];
			$album = $_POST['album'];
			//FILE STORAGE 
            
			$file = $_FILES['file'];
			$file_name = $file['name'];
			$file_tmp = $file['tmp_name'];
			$file_size = $file['size'];
			$file_ext = explode('.',$file_name);
			$file_ext = strtolower(end($file_ext));
			echo('file_management <br>');
			$new_file_name = uniqid('',true).'.'.$file_ext;
			$destination = '/membri/matteomarzio/musicapp/albums/';
            echo('destination <br>');
            
            $query = "SELECT * FROM album WHERE id='$album'";
            $result = mysqli_query($connection,$query);
            $row = mysqli_fetch_assoc($result);
            $band = $row['band'];
            $name = $row['name'];
            
    
            $destination = '/membri/matteomarzio/musicapp/albums/'. $band . '/' . $name . '/' . $new_file_name;
            echo($file_tmp. ' -----> ' .  $destination);
            if(move_uploaded_file($file_tmp, $destination)){
					echo('<br> move_uploaded_file  <br>');
					$destination = '/musicapp/albums/'. 
                    $band . '/' . $name . '/' . $new_file_name;
					$query = "INSERT INTO song(title,position,album,author,file)
				 	VALUES('$title','$position','$album','$band','$destination')";
                    
                    echo('inizio query  <br>' . $query);
				
                    if(mysqli_query($connection, $query)){
                        header("Location: ../upload_song.php?done");
                        }
                    else{
                    echo('no query :(  <br>');
					/*header("Location: ../upload_song.php?error=noupdating"); */
					}
			}else{
				/*header("Location: ../upload_song.php?error=nomoving");*/
		}
    }}
    
    ?>
