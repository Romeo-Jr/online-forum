<?php

require('config.inc.php');
require('functions.php');

$info['data_type'] = "";
$info['success'] = false;

if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['data_type']))
{
	$info['data_type'] = $_POST['data_type'];

	if($_POST['data_type'] == 'signup')
	{

		$username = addslashes($_POST['username']);
		$email = addslashes($_POST['email']);
		$password = $_POST['password'];
		$password_retype = $_POST['retype_password'];
		$date = date("Y-m-d H:i:s");

		//check if this email already exists
		$query = "select * from users where email = '$email' limit 1";
		$row = query($query);

		if($row)
		{
			$info['message'] = "That email already exists";
		}else
		if($password !== $password_retype)
		{
			$info['message'] = "Passwords dont match";
		}else
		{
			$password = password_hash($password, PASSWORD_DEFAULT);
			$query = "insert into users (username,email,password,date) values ('$username','$email','$password','$date')";
			query($query);

			$query = "select * from users where email = '$email' limit 1";
			$row = query($query);
			
			if($row){

				$row = $row[0];
				$info['success'] = true;
				$info['message'] = "Your profile was created successfully";
				authenticate($row);
			}
		}

	}else
	if($_POST['data_type'] == 'add_post')
	{

		$post = addslashes($_POST['post']);
		$user_id = $_SESSION['USER']['id'];
		$date = date("Y-m-d H:i:s");
 
		$query = "insert into posts (post,user_id,date) values ('$post','$user_id','$date')";
		query($query);

		$query = "select * from posts where user_id = '$user_id' order by id desc limit 1";
		$row = query($query);
		
		if($row){

			$row = $row[0];
			$info['success'] = true;
			$info['message'] = "Your post was created successfully";
			$info['row'] = $row;
			
		}

	}else
	if($_POST['data_type'] == 'load_posts')
	{
 
		$query = "select * from posts order by id desc limit 10";
		$rows = query($query);
		
		if($rows){

			foreach ($rows as $key => $row) {
				$rows[$key]['date'] = date("jS M, Y H:i:s a",strtotime($row['date']));

				$id = $row['user_id'];
				$query = "select * from users where id = '$id' limit 1";
				$user_row = query($query);
				
				if($user_row){
					$rows[$key]['user'] = $user_row[0];
					$rows[$key]['user']['image'] = get_image($user_row[0]['image']);
				}
			}
			$info['success'] = true;
			$info['rows'] = $rows;
			
		}

	}else
	if($_POST['data_type'] == 'login')
	{

		$email = addslashes($_POST['email']);

		//check if this account exists
		$query = "select * from users where email = '$email' limit 1";
		$row = query($query);

		if(!$row)
		{
			$info['message'] = "Wrong email or password";
		}else
		{
			$row = $row[0];

			if(password_verify($_POST['password'], $row['password']))
			{
				//correct
				$info['success'] = true;
				authenticate($row);
				$info['message'] = "Successful login";
			}else{
				$info['message'] = "Wrong email or password";
			}

		}
	}else
	if($_POST['data_type'] == 'logout')
	{

		logout();
		$info['message'] = "You were successfuly logged out";

	}
	

}

echo json_encode($info);
