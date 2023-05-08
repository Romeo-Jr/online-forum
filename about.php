<?php
	
	require('config.inc.php');
	require('functions.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>About</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="assets/css/about.css">
	<link href='https://fonts.googleapis.com/css?family=Yantramanav' rel='stylesheet'>
</head>
<body style="font-family: 'Yantramanav';">

	<style>
		
		.hide{
			display:none;
		}
	</style>
	<section class="class_1" >
		<?php include('header.inc.php') ?>
		<div class="content">
            <div>
                <img src="assets/images/about1.png" alt="about" srcset="">
                <div class="body">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum accusantium distinctio unde, eius dolorem est consectetur voluptates at aliquid nemo, adipisci qui quo aspernatur impedit nulla temporibus debitis exercitationem sed!</p>
                </div>
            </div>

            <div>
            <img src="assets/images/about2.png" alt="about" srcset="">
            <div class="body">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum accusantium distinctio unde, eius dolorem est consectetur voluptates at aliquid nemo, adipisci qui quo aspernatur impedit nulla temporibus debitis exercitationem sed!</p>
            </div>
            </div>

            <div>
            <img src="assets/images/about3.png" alt="about" srcset="">
            <div class="body">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum accusantium distinctio unde, eius dolorem est consectetur voluptates at aliquid nemo, adipisci qui quo aspernatur impedit nulla temporibus debitis exercitationem sed!</p>
            </div>
            </div>
        </div>
	</section>
	
</body>
</html>