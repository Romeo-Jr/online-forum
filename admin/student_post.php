<?php

    require('../config.inc.php');
	require('../functions.php');

    if(!isset($_SESSION['role']) || $_SESSION["role"] != 1){
        header("Location: ../404.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post | Student</title>
    <link rel="stylesheet" href="css/sidenav.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/student_post.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-icons.css">
    <link href='https://fonts.googleapis.com/css?family=Yantramanav' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="../assets/icon.ico">
</head>
<body>
    <?php
        include_once('sidenav.php');
    ?>

    <div class="main">
        <div class="head">
            <h1 style="margin:10px 0 0 0;">Welcome Admin!</h1>
        </div>
    
        <div class="sub-head">
            <h2>Student Posts</h2>
        </div>

        <div class="body">
            <table>
            <tr>
                <th>Image</th>
                <th>Post</th>
                <th>Author</th>
                <th>Operation</th>
            </tr>
            <?php
				$sql = "select users.username, users.image, posts.id, posts.post, posts.date from posts inner join users on posts.user_id = users.id where users.role = 2";
				$row = query($sql);

				if($row){
                    foreach($row as $data){
                        ?>
                            
                            <tr>
                                <td><img style="width:50px; height:50px;" src="../<?php echo $data["image"]?>" alt="image" srcset=""></td>
                                <td><?php echo $data["post"] ?></td>
                                <td><?php echo $data["username"] ?></td>
                                <td><a style="color: red" href="delete.php?id=<?php echo $data["id"]?>"><i class="bi bi-trash3"></i></a></td>
                            </tr>
                        
                        <?php
                            }
                }
                        ?>
                
            </table>
        </div>
    </div>
</body>
</html>