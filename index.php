<?php
	
	require('config.inc.php');
	require('functions.php');

	// PROCESS POSTS
	if($_SERVER['REQUEST_METHOD'] == "POST"){

		// DATA TO INSERT
		$user_id = $_SESSION['USER']['id'];
		$post_content = $_POST["post"];
		$post_date = date('Y/m/d H:i:s');

		$sql = "INSERT INTO posts (user_id, post, date) VALUES ('$user_id', '$post_content', '$post_date')";
		query($sql);

	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>InEqualitalks | Home</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
	<link rel="stylesheet" href="assets/css/index.css">
	<link href='https://fonts.googleapis.com/css?family=Yantramanav' rel='stylesheet'>
	<link rel="icon" type="image/x-icon" href="assets/icon.ico">

</head>
<body>

	<style>
		
		@keyframes appear{
			0%{
				opacity: 0;
			}
			100%{
				opacity: 1;
			}
		}

		.hide{
			display:none;
		}

	</style>
	<section class="class_1" >
		<?php include('header.inc.php') ?>
		<div class="class_11" >
			<?php include('success.alert.inc.php') ?>
			<?php include('fail.alert.inc.php') ?>

			<?php if(logged_in()):?>
				<form method="post" class="class_42" >
					<div class="class_43" >
						<textarea placeholder="Whats on your mind?" name="post" class="js-post-input class_44" required></textarea>
					</div>
					<div class="class_45" >
						<input class="class_46" type="submit" value="Post">
					</div>
				</form>
			<?php else:?>
				<div class="class_13" >
					<i class="bi bi-info-circle-fill class_14">
					</i>
					<div onclick="login.show()" class="class_15" style="cursor:pointer;text-align: center; font-family:'Yantramanav';"  >
						You're not logged in <br>Click here to login and post
					</div>
				</div>
			<?php endif;?>

			<section class="js-posts">
				<?php

					$query = "select users.username, users.image, posts.id, posts.post, posts.date from posts inner join users on posts.user_id = users.id ORDER BY posts.date DESC";
					$row = query($query);
					
					if($row){
						foreach($row as $data){

						?>
							<div class="class_42"  style="font-family:'Yantramanav';">
								<div class="class_45">
									<img src="<?php echo $data['image'];?>" class="class_47">
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
									<?php if(logged_in()){?>
										<?php $id = $data['id'] ?>
										<ul class="class-ul">
											<li>
												<a href="post.php?id=<?php echo $id ?>">
													<div class="class_51">
														<i class="bi bi-chat-dots class_52">
														</i>
														<div class="class_53">
															Comment
														</div>
													</div>
												</a>
											</li>
											<?php
												if($_SESSION['USER']['username'] == $data['username']){
											?>
												<li>
													<a href="edit_post.php?id=<?php echo $id ?>">
														<div style="color:#05a96c;" class="class_51">
															<i class="bi bi-pencil class_52">
															</i>
															<div class="class_53">
																Edit
															</div>
														</div>
													</a>
												</li>
												<li>
													<a href="delete_post.php?id=<?php echo $id ?>">
														<div style="color:#ff4069;" class="class_51">
															<i  class="bi bi-trash class_52">
															</i>
															<div class="class_53">
																Delete
															</div>
														</div>
													</a>
												</li>
											<?php
												}
											?>
										</ul>
									<?php } ?>
								</div>
							</div>

					
					<?php
						}
					} else {
						?>
						<div style="padding:10px;text-align:center;">Loading posts....</div>
						<?php
					}
				?>		
			</section>
 
			<div class="class_37" style="display: flex;justify-content: space-between;" >

			</div>
 
		</div>
		<br><br>
		<?php include('signup.inc.php') ?>
		<?php include('login.inc.php') ?>
	</section>
</body>
</html>