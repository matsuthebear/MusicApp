<?php
  include('../database/db.php');
  if (isset($_POST['search'])){
  	$search = $_POST['search'];
    $query="SELECT * 
    			FROM album,song 
    			WHERE name.album = '$search' 
    			OR song.title = '$search'";
    $result =mysqli_query($connection, $query);

	while($row = mysqli_fetch_assoc($result)){
		echo $row['title'];
	}
}
?>