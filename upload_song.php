<?php
	include('header.php');
    include('check.php');
?>

<form class="col s12" method="POST" enctype="multipart/form-data" action="includes/upload.song.include.php">
		<div class="row">
			<div class="input-field col s6">
				<i class="material-icons prefix">verified_user</i>
					<input id="icon_telephone" name="title" type="text" class="validate">
					<label for="icon_telefone">Name</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s6">
				<i class="material-icons prefix">verified_user</i>
					<input id="icon_telephone" name="position" type="number" class="validate">
					<label for="icon_telefone">Position</label>
			</div>
		</div>

		<div class="row">
		<div class="input-field col-12" >
		<select name="album">
        	<option value="" disabled selected>Choose your option</option>
			<?php
				include('database/db.php');
				$sql = "SELECT * FROM album";
				$result = mysqli_query($connection, $sql);

	
				while($row = $result->fetch_assoc()){
					echo('<option value="');
					echo($row['id']);
					echo('">');
					echo($row['name']);
					echo('</option>');
				}
			?>
		</select>
			<label>Select the Album you want to update/fix</label>
		</div>
		</div>

		<div class="row">
			<div class="input-field col s6">
				<i class="material-icons prefix">verified_user</i>
					<input id="icon_telephone" name="author" type="text" class="validate">
					<label for="icon_telefone">Author</label>
			</div>
		</div>
		 
		<input name="file" id="file" type="file" >
		
	<button class="waves-effect waves-light btn tooltipped" 
		type="submit" name="insert" id="insert" value="Insert"
		data-position="bottom" data-delay="2000" data-tooltip=":)"> Upload New Song </button>
</form>

<script>
$(document).ready(function(){
	$('select').material_select();
	$('#insert').click(function(){
		var image_name= $('#file').val();
		if(image_name == ""){
			alert("Please Select a Song");
			return false;
		}else{
			var extension = $('#file').val().split('.').pop().toLowerCase();
			if(jQuery.inArray(extension, ['mp3','MP3','wav','m4a','ogg']) == -1){
				alert('Invalid Image Extension File');
				$('#file').val('');
				return false;
			}
		}
	});
});
</script>