<?php 
	session_start();   
?>
<?php
function navbar_php(){
	if (isset($_SESSION['username'])){
		echo('
			<li><a href="search.php"> Search </a> </li>
            <li><a href="show_album.php"> Albums </a> </li>
            <li><a href="show_song.php"> Song </a> </li>
            <li><a href="manage.php"> Manage </a> </li>
			<li>
			<form class="navbar-form navbar-right" role = " userlogout" action="includes/logout.include.php">
 			<button type="submit" class ="btn btn-default" > LOG OUT </button>
			</form> </li>
			');

	}else{
			echo('
			<li><a href="index.php"> Index</a></li>
			<li><a href="login.php"> Log In </a></li>
			<li><a href="signup.php"> Sign Up </a></li>
			');
		}

}

?>
<!DOCTYPE html>
<html>

<head>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	
	<script>$(document).ready(function(){
        $('.parallax').parallax();
        $(".dropdown-button").dropdown({
            hover: false
        });
         $(".button-collapse").sideNav();
    });</script>

    <script>
            $(".button-collapse").sideNav();
    </script>
     <!-- Compiled and minified JavaScript -->
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.js"></script> 	


    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<!-- Compiled and minified CSS -->
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">

<style>
  body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
  }

  main {
    flex: 1 0 auto;
  }


 </style>

</head>


<body>

<nav class="orange">
	<div class="nav-wrapper">
		<a href="index.php" class="brand-logo"> MusicApp BETA </a>
		<!-- NOT MOBILE DEVICES -->
		<ul class="right hide-on-med-and-down">
        	<?php
            navbar_php();
            ?>
		</ul>
		<!-- MOBILE DEVICES -->
		<div class="container">
		<a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only"><i class="material-icons">menu</i></a>
		</div>
				<ul id="nav-mobile" class="side-nav" style="transform: translateX(-100%);">
                    	<?php
            					navbar_php();
           				 ?>        
       			 </ul>
        </div>

</nav> 
