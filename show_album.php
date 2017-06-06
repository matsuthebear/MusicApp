 
<?php
	include('header.php');
	include('database/db.php');
    include('check.php');

	$query = "SELECT * FROM album ORDER BY id DESC";
	$result = mysqli_query($connection,$query);
	echo('<div class="row">');
	while($row = mysqli_fetch_array($result)){
		echo ('
        <div class="col s12 l4 m4">
         		<div class="card" style=" text-align:center; vertical-align:middle">
    			<div class="card-image waves-effect waves-block waves-light">
                <a target="_blank" href="play_album.php?id=');
                echo($row['id']);
                echo('
             "><img class="activator"src="');
			echo($row['image']);
        	echo('" style=" height:auto; width:100%"></a></div>');
      		echo('
      		<p></p>
      		 </div>
			</div>');

        
       
    }
    echo('</div>');
?>

<script>
 $(document).ready(function(){
    $('.materialboxed').materialbox();
  });
</script>
