<?php
	
	require('config.inc.php');
	require('functions.php');

    $id = $_GET['id'];

    if(isset($_POST['yesbtn'])){

        $sql = "delete from comments where id = $id";
        query($sql);

        header("Location: index.php");
    }

    if(isset($_POST['nobtn'])){
        header("Location: index.php");
    }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Delete | Post</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
	<link rel="stylesheet" href="assets/css/index.css">
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
			<h1 class="class_41"  >
				Edit Post
			</h1>

			<?php if(logged_in()):?>
                <?php 
                    
                    $sql = "select * from comments where id = $id";
                    $row = query($sql);

                    foreach($row as $data){

                    
                ?>
				<div class="class_42" >
					<div class="class_43" >
						<textarea name="post" class="js-post-input class_44" required><?php echo $data['comment'] ?></textarea>
					</div>
                    <br>
                </div>
                <form method='post'>
                    <center>
                            <p>Are you sure you want to delete this post?</p>
                            <ul class="delete_class_ul">
                                <li>
                                    <input name="yesbtn" class="yesbtn" type="submit" value="Yes">
                                </li>
                                <li>
                                    <input name="nobtn" class="nobtn" type="submit" value="No">
                                </li>
                            </ul>
                    </center>
                </form>

                <?php } ?>
			<?php else:?>
				<div class="class_13" >
					<i class="bi bi-info-circle-fill class_14">
					</i>
					<div onclick="login.show()" class="class_15" style="cursor:pointer;text-align: center;"  >
						You're not logged in <br>Click here to login and post
					</div>
				</div>
			<?php endif;?>
 
		</div>
		<br><br>
		<?php include('signup.inc.php') ?>
		<?php include('login.inc.php') ?>
	</section>
	<!--post card template-->
	<div class="js-post-card hide class_42" style="animation: appear 3s ease;" >
		<div class="class_45" >
			<img src="assets/images/user.jpg" class="js-image class_47" >
			<h2 class="js-username class_48" style="font-size:16px" >
				Jane Name
			</h2>
		</div>
		<div class="class_49" >
			<h4 class="js-date class_41"  >
				3rd Jan 23 14:35 pm
			</h4>
			<div class="js-post class_15"  >
				is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets c
			</div>
			<div class="class_51" >
				<i class="bi bi-chat-left-dots class_52">
				</i>
				<div class="js-comment-link class_53" style="color:blue;cursor: pointer;"  >
					Comments
				</div>
			</div>
		</div>
	</div>
	<!--end post card template-->
	
</body>
</html>