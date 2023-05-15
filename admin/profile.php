<?php
    require('../config.inc.php');
	require('../functions.php');

    if(!isset($_SESSION['role']) || $_SESSION["role"] != 3){
        header("Location: ../404.php");
    }

    $user_username = $_SESSION["username"];
    $user_id = $_SESSION["id"];

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $user_username = $_POST["username"];
        $user_password = $_POST["password"];

        if($user_password != ""){
            $new_password = password_hash($user_password, PASSWORD_DEFAULT);

            $sql = "update admin set username = '$user_username', password = '$new_password' where id = '$user_id'";
            query($sql);

        }else{
            $sql = "update admin set username = '$user_username' where id = '$user_id'";
            query($sql);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Profile</title>
    <link rel="stylesheet" href="css/sidenav.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="icon" type="image/x-icon" href="../assets/icon.ico">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-icons.css">
    <link href='https://fonts.googleapis.com/css?family=Yantramanav' rel='stylesheet'>
</head>
<body style="font-family: 'Yantramanav'">
    <?php
        include_once('sidenav.php');
    ?>

    <div class="main">
        <div class="content">
            <?php
                $sql = "select * from admin where id = '$user_id'";
                $row = query($sql);
            
                foreach($row as $data){ 
                    $user_username = $data["username"];
                    $user_password = $data["password"];
                }

            ?>
            <div class="row">
                <div style="margin-top:40px;" class="col-50">
                    <h2>Profile</h2>
                    <table>
                        <tr>
                            <td>ID</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td><?php echo $user_username ?></td>
                        </tr>
            
                    </table>
                    <button class="update" id="updatebtn">Update</button>
                </div>
                <div class="col-50">
                    <img src="image/avatar.png" alt="avatar" srcset="">
                </div>
            </div>
        </div>
    

        <!-- The Modal -->
        <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Update Profile</h2>
            </div>
            <div class="modal-body">
                <center>
                <div class="class_30 update-form" >
					<form method='post'>
                        <div class="class_31" >
                            <label class="class_32"  >
                                Username:
                            </label>
                            <input placeholder="Username" type="text" name="username" class="class_33" value="<?php echo $user_username ?>" required="true">
                        </div>
                        <div class="class_31" >
                            <label class="class_32"  >
                                Password:
                            </label>
                            <input placeholder="Leave empty to keep old password" type="password" name="password" class="class_33" >
                        </div>
					
				</div>
                </center>
            </div>
            <div class="modal-footer">
                <input class="savebtn" type="submit" value="Save">
            </div>
            </form>
        </div>

        </div>
    </div>


<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("updatebtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
    modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }
</script>
</body>
</html>