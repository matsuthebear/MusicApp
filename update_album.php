<?php
	include('header.php');
    include('check.php');
?>
<form class="col s12" method="POST" enctype="multipart/form-data" action="includes/update.album.include.php">
		<div class="row">
		<div class="input-field col-12" >
		<select name="album_id">
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
		Insert now the informations
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
		data-position="bottom" data-delay="2000" data-tooltip=":)"> Update The Album </button>
</form>

<script>
$(document).ready(function(){

    $('select').material_select();
});
</script>