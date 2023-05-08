<?php defined('APP') or die('direct script access denied!'); ?>

<header class="class_2" >
	<div class="class_3" >
		<img src="assets/images/logo.png" class="class_4" >
	</div>
	<div  class="item_class_0 class_5">
		<div  class="item_class_1 class_6">
			<svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" >
				<path d="m22 16.75c0-.414-.336-.75-.75-.75h-18.5c-.414 0-.75.336-.75.75s.336.75.75.75h18.5c.414 0 .75-.336.75-.75zm0-5c0-.414-.336-.75-.75-.75h-18.5c-.414 0-.75.336-.75.75s.336.75.75.75h18.5c.414 0 .75-.336.75-.75zm0-5c0-.414-.336-.75-.75-.75h-18.5c-.414 0-.75.336-.75.75s.336.75.75.75h18.5c.414 0 .75-.336.75-.75z" fill-rule="nonzero" >
				</path>
			</svg>
		</div>
		<div  style="font-family:'Yantramanav'; color:black;" class="item_class_2 class_7">
			<a href="index.php" class="class_8"  >
				Home
			</a>
			<a href="about.php" class="class_8"  >
				About us
			</a>
			<a href="contact.php" class="class_8"  >
				Contact us
			</a>
		</div>
	</div>
	<div class="class_9" style="display:flex;align-items: center;justify-content: center;"  >
		<?php if(logged_in()):?>
			<a href="profile.php">
				<?php
					$user_id = $_SESSION["USER"]["id"];
					$sql = "select image from users where id = '$user_id'";
					$row = query($sql);
					foreach($row as $data){
						$user_image = $data["image"];
					}
				?>
				<img src="<?php echo $user_image ?>" class="class_10" >
			</a>
		<?php else:?>
			<!-- <span style="cursor:pointer;" onclick="login.show()">Login</span> -->
		<?php endif;?>

	</div>
</header>
<script>
	
	var user = {

		logout: function(){

			let form = new FormData();
			form.append('data_type', 'logout');
			var ajax = new XMLHttpRequest();

			ajax.addEventListener('readystatechange',function(){

				if(ajax.readyState == 4)
				{
					if(ajax.status == 200){
						let obj = JSON.parse(ajax.responseText);
						alert(obj.message);

						window.location.href = "index.php";
					}else{
						alert("Please check your internet connection");
					}
				}
			});

			ajax.open('post','ajax.inc.php', true);
			ajax.send(form);
		}
	};
</script>
