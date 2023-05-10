<?php
	
	require('config.inc.php');
	require('functions.php');

	$POST_ID = $_GET['id'];

	// PROCESS COMMENTS
	if($_SERVER["REQUEST_METHOD"] == "POST"){

		// DATA TO INSERT
		$user_id = $_SESSION['USER']['id'];
		$comment_id = $POST_ID;
		$comment_content = $_POST["comments"];
		$comment_date = date('Y/m/d H:i:s');

		$sql = "INSERT INTO comments (user_id, comment_id, comment, date) VALUES ('$user_id', '$comment_id', '$comment_content', '$comment_date')";
		query($sql);
		
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Post</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
	<link href='https://fonts.googleapis.com/css?family=Yantramanav' rel='stylesheet'>
	<link rel="icon" type="image/x-icon" href="assets/icon.ico">
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
			<?php include('success.alert.inc.php') ?>
			<?php include('fail.alert.inc.php') ?>
			<?php
				$query = "select users.username, users.image, posts.id, posts.post, posts.date from posts inner join users on posts.user_id = users.id where posts.id = $POST_ID";
				$row = query($query);

				foreach($row as $data){
			?>
				<div style="font-family:'Yantramanav';" class="class_42">
						<div class="class_45">
							<img src="<?php echo $data['image'] ?>" class="class_47">
							<h2 class="class_48">
								<?php echo $data['username'] ?>
								<br>
							</h2>
						</div>
						<div class="class_49">
							<h4 class="class_41">
								<?php echo date("F j, Y, g:i a",strtotime($data['date'])); ?>
								<br>
							</h4>
							<div class="class_15">
								<?php echo $data["post"] ?>
							</div>
						</div>
					</div>
			<?php
				}
			?>
 
			<div class="class_11" style="font-family:'Yantramanav';">
				<h1 class="class_41" style="font-size: 16px;"  >
					Comments
				</h1>
				<!-- FORM -->
				<form method="post">
					<div class="class_42" >
						<div class="class_43" >
							<textarea placeholder="Write a comment" name="comments" class="class_44" required></textarea>
						</div>
						<div class="class_45" >
							<input class="class_46" type="submit" value="Comment">
						</div>
					</div>
				</form>
				<!-- FORM END -->

				<?php
					$query = "select users.username, users.image, comments.comment, comments.date from comments inner join users on comments.user_id = users.id where comments.comment_id = $POST_ID Order by date desc";
					$row = query($query);

					if($row){
						foreach($row as $data){

				?>
			
						<div class="class_42" style="font-family:'Yantramanav';">
							<div class="class_45" >
								<img src="<?php echo $data['image']?>" class="class_47" >
								<h2 class="class_48"  >
									<?php echo $data['username'] ?>
									<br>
								</h2>
							</div>
							<div class="class_49" >
								<h4 class="class_41"  >
									<?php echo date("F j, Y, g:i a",strtotime($data['date'])); ?>
									<br>
								</h4>
								<div class="class_15"  >
								<?php echo $data['comment'] ?>
								</div>
							</div>
						</div>
				<?php
					}
				}
				?>
					
 
				<div class="class_37" >
					<button class="class_54"  >
						Prev page
					</button>
					<button class="class_39"  >
						Next page
					</button>
					<div class="class_40" >
					</div>
				</div>
			</div>
		</div>

		<?php include('signup.inc.php') ?>
	</section>
	
</body>
</html>