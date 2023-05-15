<?php
	
	require('config.inc.php');
	require('functions.php'); 

    $comment_id = $_GET["id"];

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $comment = $_POST["comment"];

        $sql = "UPDATE comments set comment = '$comment' where id = '$comment_id'";
        query($sql);

        header("Location: index.php");
    }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit | Comment</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
	<link rel="stylesheet" type="text/css" href="assets/css/comment.css">
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
			<div class="class_11" style="font-family:'Yantramanav';">
				<h1 class="class_41" style="font-size: 16px;"  >
					Comment
				</h1>
				<!-- FORM -->
				<form method="post">
					<div class="class_42" >
						<div class="class_43" >
                            <?php       
                                $comment_id = $_GET["id"];  
                                $sql = "SELECT * from comments where id = '$comment_id'";
                                $row = query($sql);
                            ?>
							<textarea name="comment" class="class_44" required><?php echo $row[0]['comment']; ?></textarea>
						</div>
						<div class="class_45" >
							<input class="class_46" type="submit" value="Save">
						</div>
					</div>
				</form>
				<!-- FORM END -->
			</div>
		</div>

		<?php include('signup.inc.php') ?>
	</section>
	
</body>
</html>