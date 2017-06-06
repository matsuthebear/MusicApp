<?php
	include('header.php');
?>

<main>
<div class="lighten-4 row">

<h5> Please Log In with your Username and Password </h5>
<div class="row">
	<form class="col s12" action="includes/login.include.php" method="POST">
		<div class="row">
		<!-- Name and Surname -->
			<div class="input-field col s6">
				<i class="material-icons prefix"> account_circle</i>
					<input id="icon_prefix" name="uid" type="text" class="validate">
						<label for="icon_prefix"> User Name </label>		
			</div>
		</div>
		<div class="row">
			<div class="input-field col s6">
				<i class="material-icons prefix">vpn_key</i>
					<input id="password" name="pwd" type="password" class="validate">
					<label for="icon_key">Password</label>
			</div>
		</div>

		<button class="waves-effect waves-light btn tooltipped" 
		type="submit" name="action"
		data-position="bottom" data-delay="2000" data-tooltip="C'mon! Log in :)"> Log In! </a>
			<i class="material-icons right"> send </i>
		</button>

		
	</form>
</div>
</div>
</main>
<?php
	
	include "footer.php";

?>