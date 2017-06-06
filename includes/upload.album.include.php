<?php
	session_start();
	include ("../database/db.php");

	if (isset($_POST['insert'])){
    	echo('isset_insert  <br>');
		if(isset($_FILES['image'])){
        	echo('isset_image  <br>');
			$name = $_POST['name'];
			$year = $_POST['year'];
			$band = $_POST['band'];
			$type = $_POST['type'];
			//FILE STORAGE 
            
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
            
            if (!file_exists($destination)) {
                $oldmask = umask(0);
				mkdir($destination, 0777);
				umask($oldmask);
                echo('mkdir1 <br>');
                }
           if(!file_exists($destination . $band )){
                    $oldmask = umask(0);
                  	mkdir($destination . $band .  '/',0777);
                    umask($oldmask);
                    echo('mkdir2 <br>');
           }
           if(!file_exists($destination . $band. '/' . $name)){
                	 $oldmask = umask(0);
                  	 mkdir($destination . $band. '/' . $name . '/',0777);
                     umask($oldmask);
                     echo('mkdir3 <br>');
            }
          
            

    
            $destination = '/membri/matteomarzio/musicapp/albums/'. $band . '/' . $name . '/' . $new_file_name;
            echo($file_tmp. ' -----> ' .  $destination);
            if(move_uploaded_file($file_tmp, $destination)){
					echo('<br> move_uploaded_file  <br>');
					$destination = '/musicapp/albums/'. 
                    $band . '/' . $name . '/' . $new_file_name;
					$query = "INSERT INTO album(name,year,band,type,image)
				 	VALUES('$name','$year','$band','$type','$destination')";
                    
                    echo('inizio query  <br>' . $query);
				
                    if(mysqli_query($connection, $query)){
                        header("Location: ../upload_album.php?done");
                        }
                    else{
                    echo('no query :(  <br>');
					header("Location: ../upload_album.php?error=noupdating");
					}
			}else{
				header("Location: ../upload_album.php?error=nomoving");
		}
    }}
    
    ?>