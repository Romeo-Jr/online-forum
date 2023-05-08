<?php
	
	require('config.inc.php');
	require('functions.php');

	if(!logged_in()){
		header("Location: 404.php");
		die;
	}


	$user_email = $_SESSION["USER"]['email'];
	$sql = "select * from users where email = '$user_email'";
	$row = query($sql);

	foreach($row as $data){
		$user_email = $data["email"];
		$user_username = $data["username"];
		$user_password = $data["password"];
		$user_image = $data["image"];
	}

	$user_id = $_SESSION["USER"]["id"];

	if($_SERVER["REQUEST_METHOD"] == "POST"){

		
		$user_username = $_POST["username"];
		$user_email = $_POST["email"];
		
	
		// Check if image uploaded
		if ($_FILES['image']['tmp_name'] != "" ) {

			$user_password = password_hash($_POST["password"], PASSWORD_DEFAULT);

			// Get image data
			$image_name = $_FILES['image']['name'];
			$image_tmp_name = $_FILES['image']['tmp_name'];
			$image_size = $_FILES['image']['size'];
			$image_type = $_FILES['image']['type'];
	
			// Check if image size is within limit
			if ($image_size > 5000000) {
				echo "Error: Image file size is too large.";
				exit;
			}
	
			// Check if image type is valid
			if ($image_type != "image/jpeg" && $image_type != "image/png" && $image_type != "image/gif") {
				echo "Error: Invalid image file type.";
				exit;
			}
	
			// Upload image to server
			$image_path = "assets/images/" . $image_name;
			move_uploaded_file($image_tmp_name, $image_path);
			
			if($_POST["password"] != ""){
				// Update user profile with new image with Password
				$query = "UPDATE users SET username='$user_username', email='$user_email', password='$user_password', image='$image_path' WHERE id='$user_id'";
				query($query);
			}else{
				// Update user profile with new image
				$query = "UPDATE users SET username='$user_username', email='$user_email', image='$image_path' WHERE id='$user_id'";
				query($query);
			}
		} else {
			// Update user profile without changing image
			$query = "UPDATE users SET username='$user_username', email='$user_email' WHERE id='$user_id'";
			query($query);
		}

		
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
	<link href='https://fonts.googleapis.com/css?family=Yantramanav' rel='stylesheet'>
</head>
<body style="font-family:'Yantramanav';">

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
					<img src="<?php echo $user_image ?>" class="class_28" >
	
					<div class="class_30" >
					<form method='post' enctype="multipart/form-data">
							<input type="file" name="image" class="class_29" >
							<div class="class_31" >
								<label class="class_32"  >
									Username:
								</label>
								<input placeholder="Username" type="text" name="username" class="class_33" value="<?php echo $user_username ?>" required="true">
							</div>
							<div class="class_31" >
								<label class="class_32"  >
									Email:
								</label>
								<input placeholder="Email" type="text" name="email" class="class_33" value="<?php echo $user_email ?>" required="true">
							</div>
							<div class="class_31" >
								<label class="class_32"  >
									Password:
								</label>
								<input placeholder="Leave empty to keep old password" type="password" name="password" class="class_33" >
							</div>
							<div class="class_37" >
								<input class="class_38" type="submit" value="Save">
								<a href="profile.php">
									<button class="class_39"  >
										Cancel
									</button>
								</a>
								<div class="class_40" >
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
 
		</div>
		<br><br>
		<?php include('signup.inc.php') ?>
	</section>
	
</body>
</html>