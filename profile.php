<?php
	
	require('config.inc.php');
	require('functions.php');

	if(!logged_in()){
		header("Location: index.php");
		die;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile - PHP Forum</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>

	<style>
		
		.hide{
			display:none;
		}
	</style>
	<section class="class_1" >
		<?php include('header.inc.php') ?>
		<div class="class_11" >
			<div class="class_12" >
				<?php include('success.alert.inc.php') ?>
				<?php include('fail.alert.inc.php') ?>

				<div class="class_19" >
				</div>
				<div class="class_20" >
					<img src="assets/images/57.png" class="class_21" >
					<div class="class_22" >
						<h1 class="class_23"  >
							Mary Jane
							<br>
						</h1>
						<i class="bi bi-facebook class_24">
						</i>
						<i  class="bi bi-twitter class_24">
						</i>
						<i  class="bi bi-youtube class_24">
						</i>
						<div class="class_15"  >
							popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes
							
						</div>
					</div>
					<a href="profile-settings.php">
						<button class="class_39"  >
							Edit Profile
						</button>
					</a>
					<button onclick="user.logout()" class="class_39"  >
						Logout
					</button>
					
					<div style="clear:both"></div>
				</div>
 
			</div>
 
		</div>
		<br><br>
		<?php include('signup.inc.php') ?>
	</section>
	
</body>
</html>