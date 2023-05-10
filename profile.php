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
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
	<link href='https://fonts.googleapis.com/css?family=Yantramanav' rel='stylesheet'>
	<link rel="icon" type="image/x-icon" href="assets/icon.ico">
</head>
<body style="font-family: 'Yantramanav';">

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
					<?php
						$user_id = $_SESSION["USER"]["id"];
						$sql = "select image from users where id = '$user_id'";
						$row = query($sql);
						foreach($row as $data){
							$user_image = $data["image"];
						}
					?>
					<img src="<?php echo $user_image ?>" class="class_21" >
					<div class="class_22" >
						<h1 class="class_23"  >
							<?php echo $_SESSION["USER"]["username"] ?>
							<br>
						</h1>
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