<?php

    require('../config.inc.php');
    require('../functions.php');

    $message = 0;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $user_username = $_POST['username'];
        $user_password = $_POST['password'];

        $sql = "SELECT * FROM admin WHERE username = '$user_username'";
        $row = query($sql);
        if($row != FALSE){

            foreach($row as $data){
                $admin_username = $data['username'];
                $admin_password = $data['password'];
                $admin_profile_pic = $data['profile_pic'];
                $admin_id = $data["id"];
                $role = $data["role"];
    
            }
    
            if(password_verify($user_password, $admin_password)){
                session_start();
                $_SESSION["username"] = $admin_username;
                $_SESSION["id"] = $admin_id;
                $_SESSION["role"] = $role;
    
                header("Location:dashboard.php");
            }else{
                $message = 1;
            }
        }else{
            $message = 1;
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Login</title>
    <link href='https://fonts.googleapis.com/css?family=Yantramanav' rel='stylesheet'>
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" type="image/x-icon" href="../assets/icon.ico">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-icons.css">
    
</head>
<body>
    <div class="form">
        <div class="head">
            <img src="image/avatar.png" alt="avatar" srcset="">
            <?php
                if($message == 1){
            ?>
                <p style="color:#67373e;margin:0 30px;font-family:Arial, Helvetica, sans-serif;background-color:#f7d7da; padding:10px 0" class="error-message">Incorrect Username or Password</p>
            <?php
            }else{
                ?>
                <h2>Welcome, Admin!</h2>
            <?php
            }
            ?>
        </div>
        <div class="body">
            <form method="post">
                <input type="text" name="username" id="username" placeholder="Username" require>
                <input type="password" name="password" id="password" placeholder="Password" require>
                <input type="submit" value="Login">
            </form>
        </div>
    </div>
</body>
</html>