<?php
	include('header.php');
    include('check.php');
?>

<form class="col s12" method="POST" enctype="multipart/form-data" action="includes/upload.album.include.php">
		<div class="row">
			<div class="input-field col s6">
				<i class="material-icons prefix">verified_user</i>
					<input id="icon_telephone" name="name" type="text" class="validate">
					<label for="icon_telefone">Name</label>
			</div>
		</div>

		<div class="row">
			<div class="input-field col s6">
				<i class="material-icons prefix">verified_user</i>
					<input id="icon_telephone" name="year" type="number" class="validate">
					<label for="icon_telefone">Year</label>
			</div>
		</div>

		<div class="row">
			<div class="input-field col s6">
				<i class="material-icons prefix">verified_user</i>
					<input id="icon_telephone" name="band" type="text" class="validate">
					<label for="icon_telefone">Band</label>
			</div>
		</div>

		<div class="row">
			<div class="input-field col s6">
				<i class="material-icons prefix">verified_user</i>
					<input id="icon_telephone" name="type" type="text" class="validate">
					<label for="icon_telefone">Type</label>
			</div>
		</div>

		 
			<input name="image" id="image" type="file" >
		
	<button class="waves-effect waves-light btn tooltipped" 
		type="submit" name="insert" id="insert" value="Insert"
		data-position="bottom" data-delay="2000" data-tooltip=":)"> Create New Album</a>
</form>

<script>
$(document).ready(function(){
	$('#insert').click(function(){
		var image_name= $('#image').val();
		if(image_name == ""){
			alert("Please Select an Image");
			return false;
		}else{
			var extension = $('#image').val().split('.').pop().toLowerCase();
			if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1){
				alert('Invalid Image Extension File');
				$('#image').val('');
				return false;
			}
		}
	});
});
</script>