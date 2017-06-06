<?php

	include ("header.php");
?>
<main>
<!--Collapse -->
<ul class="collapsible" data-collapsible="accordion">
	<li>
		<div class="collapsible-header"> 
			<i class="material-icons"> whatshot </i> About the Sign Up 
		</div>
		<div class="collapsible-body"> 
			<span>
				<b> What is a UserName? </b> <br>
				An UserName, known as "NickName", allows you to 
				log in without using too much information. 
				That means that you have only to use one "virtual name"
				that recognize you without using names, phones or emails to identify that you... are you!<br><br>

				<b> Can I change my password in the future? </b><br>
				Obviously! You have the rights to change your
				password <b> and </b> your nickname every time!
				You have unlimited changes, so why not?<br><br>
			</span>
		</div>
	</li>
</ul>
<!-- ERROR TIME!-->
<?php

	$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

	if (strpos($url, 'error=empty') !== false){
		echo('
			'
			 );
	}
	
	if (strpos($url, 'error=username') !== false){
		echo('
			'
			 );
	}

	if (strpos($url, 'error=pwderror') !== false){
		echo('
			
			'
			 );
	}


?>
<!-- FORM TIME! -->

<div class="row">
	<form class="col s12" action="includes/signup.include.php" method="POST">
		<div class="row">
			<div class="input-field col s6">
				<i class="material-icons prefix">verified_user</i>
					<input id="icon_telephone" name="uid" type="text" class="validate">
					<label for="icon_telefone">User Name</label>
			</div>
		</div>
		<div class="row">
		<!-- Name and Surname -->
			<div class="input-field col s6">
				<i class="material-icons prefix"> account_circle</i>
					<input id="icon_prefix" name="first" type="text" class="validate">
						<label for="icon_prefix"> First Name </label>		
			</div>
			<div class="input-field col s6">
					<input id="icon_prefix" name="last" type="text" class="validate">
						<label for="icon_prefix"> Last Name </label>		
			</div>
		</div>
		<!--E-Mail -->
		<div class="row">
			<div class="input-field col s6">
				<i class="material-icons prefix">vpn_key</i>
					<input id="password" name="pwd" type="password" class="validate">
					<label for="icon_key">Password</label>
			</div>
			<div class="input-field col s6">
					<input id="password" name="pwd2" type="password" class="validate">
					<label for="icon_key">Confirm Password</label>
			</div>
		</div>

		<button class="waves-effect waves-light btn tooltipped" 
		type="submit" name="action"
		data-position="bottom" data-delay="2000" data-tooltip="C'mon! Sign up! :)"> Sign Up! </a>
			<i class="material-icons right"> send </i>
		</button>

	</form>
</div>

</main>
<?php

	include('footer.php');

?>