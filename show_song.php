<?php
	include('header.php');
	include('database/db.php');
        include('check.php');
	echo('<main>');
	$query ="SELECT * FROM song as s,album as a
			WHERE a.id = s.album ORDER BY s.title DESC";
	$result = mysqli_query($connection,$query);
	echo('<ul class="collection">');
	while($row = mysqli_fetch_array($result)){
		echo('<li class="collection-item avatar">
      		<img alt="" class="circle"src="');
      	echo($row['image']);
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
?>
</main>
<?php
	
	include "footer.php";

?>
