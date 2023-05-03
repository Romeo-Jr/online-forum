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
	<title>Profile Settings - PHP Forum</title>
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
 
				<div class="class_26" >
					<h1 class="class_27"  >
						Profile Settings
						<br>
					</h1>
					<img src="assets/images/pexels-photo-3756774.jpeg" class="class_28" >
					<input type="file" name="image"  class="class_29">
					<div class="class_30" >
						<div class="class_31" >
							<label class="class_32"  >
								Username:
							</label>
							<input placeholder="Username" type="text" name="username" class="class_33"  required="true">
						</div>
						<div class="class_31" >
							<label class="class_32"  >
								Email:
							</label>
							<input placeholder="Email" type="text" name="email" class="class_33"  required="true">
						</div>
						<div class="class_31" >
							<label class="class_32"  >
								Password:
							</label>
							<input placeholder="Leave empty to keep old password" type="text" name="password" class="class_33" >
						</div>
						<div class="class_31" >
							<label class="class_36"  >
								Retype Password:
							</label>
							<input placeholder="" type="text" name="retype_password" class="class_33" >
						</div>
						<div class="class_37" >
							<button class="class_38"  >
								Save
							</button>
							<a href="profile.php">
								<button class="class_39"  >
									Cancel
								</button>
							</a>
							<div class="class_40" >
							</div>
						</div>
					</div>
				</div>
			</div>
 
		</div>
		<br><br>
		<?php include('signup.inc.php') ?>
	</section>
	
</body>
</html>