<?php
	
	require('config.inc.php');
	require('functions.php');

    $id = $_GET['id'];

	// PROCESS POSTS
	if($_SERVER['REQUEST_METHOD'] == "POST"){

		// DATA TO INSERT
		$post_content = $_POST["post"];
		$post_date = date('Y/m/d H:i:s');

		$sql = "update posts set post = '$post_content', date = '$post_date' where id = $id";
		query($sql);

        header("Location: index.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home - PHP Forum</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
	<link rel="stylesheet" href="assets/css/index.css">


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
                    
                    $sql = "select * from posts where id = $id";
                    $row = query($sql);

                    foreach($row as $data){

                    
                ?>
				<form method="post" class="class_42" >
					<div class="class_43" >
						<textarea name="post" class="js-post-input class_44" required><?php echo $data['post'] ?></textarea>
					</div>
					<div class="class_45" >
						<input class="class_46" type="submit" value="Save">
					</div>
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

<!-- <script>
	
	var mypost = {

		submit: function(e){

			e.preventDefault();
			let text = document.querySelector(".js-post-input").value.trim();
			if(text == ""){
				alert("Please type something to post");
				return;
			}

			let form = new FormData();
 
			form.append('post', text);
			form.append('data_type', 'add_post');
			var ajax = new XMLHttpRequest();

			ajax.addEventListener('readystatechange',function(){

				if(ajax.readyState == 4)
				{
					if(ajax.status == 200){

						console.log(ajax.responseText);
						let obj = JSON.parse(ajax.responseText);
						alert(obj.message);

						if(obj.success){
							mypost.load_posts();
						}
					}else{
						alert("Please check your internet connection");
					}
				}
			});

			ajax.open('post','ajax.inc.php', true);
			ajax.send(form);
		},

		load_posts: function(e){

			let form = new FormData();
 
			form.append('data_type', 'load_posts');
			var ajax = new XMLHttpRequest();

			ajax.addEventListener('readystatechange',function(){

				if(ajax.readyState == 4)
				{
					if(ajax.status == 200){

						console.log(ajax.responseText);
						let obj = JSON.parse(ajax.responseText);

						if(obj.success){
							let post_holder = document.querySelector(".js-posts");

							post_holder.innerHTML = "";
							let template = document.querySelector(".js-post-card");
							for (var i = 0; i < obj.rows.length; i++) {
 
 								template.querySelector(".js-post").innerHTML = obj.rows[i].post;
								template.querySelector(".js-date").innerHTML = obj.rows[i].date;
								template.querySelector(".js-comment-link").setAttribute('onclick',`mypost.view_comments(${obj.rows[i].id})`);
								template.querySelector(".js-username").innerHTML = (typeof obj.rows[i].user == 'object') ? obj.rows[i].user.username : 'User';
								
								if(typeof obj.rows[i].user == 'object')
									template.querySelector(".js-image").src = obj.rows[i].user.image;

								let clone = template.cloneNode(true);
								clone.classList.remove('hide');
								
								post_holder.appendChild(clone);
							}

						}
					}
				}
			});

			ajax.open('post','ajax.inc.php', true);
			ajax.send(form);
		},

		view_comments: function(id){

			window.location.href = "post.php?id="+id;
		},


	};
 
	mypost.load_posts();
</script> -->

</html>