<?
	include('header.php');
    include('database/db.php');
    include('check.php');
?>
<main>
<form action="search.php" method="POST"> 
	<div class="input-field">
		<input id="search" type="search" name="search" required>
		<label class="label-icon" for="search"><i class="material-icons">search</i></label>
	<i class="material-icons">close</i>
</div>
</form>

<?php
  	if (isset($_POST['search'])){
  		$search = $_POST['search'];
    	$query ="SELECT * FROM song as s,album as a
			WHERE a.id = s.album AND s.title LIKE  '%$search%' ORDER BY s.title DESC";
		$result = mysqli_query($connection,$query);
		echo('<ul class="collection">');
		while($row = mysqli_fetch_array($result)){
			echo('<li class="collection-item avatar">
      			<img alt="" class="circle" src="');
      		echo($row['image']);
		//echo('src="data:image/jpeg;base64,'.base64_encode( $row['image'])); 
     	echo('"><span class="title">');
     	echo($row['title']);	
     	echo('</span><p>');
     	echo($row['name']);
     	echo('<br>');
        echo($row['author']);
		echo('<br>');
		echo('<audio preload="none" src="');
		echo($row['file']);
		echo('"  controls ></audio> </p>');
	}
}
?>
</main>
<?php
	
	include "footer.php";

?>
