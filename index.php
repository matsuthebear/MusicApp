<?php
	include('header.php');
	include('database/db.php');
?>
<title>
	MusicApp
</title>
<main>
<?php


	$query = "SELECT * FROM album ORDER BY RAND() LIMIT 1";
	$result = mysqli_query($connection,$query);
	while($row = mysqli_fetch_array($result)){
	echo('
		<div class="parallax-container">
		<div class="parallax"><img src="');
   		echo($row['image']);
   		echo('"></div></div>');
   	}
  	$query_1 = "SELECT * FROM album ORDER BY RAND()";
	$result_1 = mysqli_query($connection,$query_1);

	$query_2 = "SELECT * FROM indextext";
	$result_2 = mysqli_query($connection,$query_2);

	while(($rowalbum = mysqli_fetch_array($result_1)) and $rowindex = mysqli_fetch_array($result_2)){
	echo('
  	<div class="section white">
    	<div class="row container">
    		<h2 class="header">');
	echo($rowindex['title']);
	echo('</h2><p class="grey-text text-darken-3 lighten-3">
      		');
	echo($rowindex['text']);
	echo('</p>
   		 </div>
  		</div>
  		<div class="parallax-container">
   		 <div class="parallax"><img src="');
   		echo($rowalbum['image']);
   		echo('"></div></div>');
   	}
?>
</main>

<?php
	include('footer.php');

?>