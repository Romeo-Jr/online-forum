<?php

    require_once('../config.inc.php');
    require_once('../functions.php');

    if(!isset($_SESSION['role']) || $_SESSION["role"] != 3){
        header("Location: ../404.php");
    }
    
    $sql = "select * from users";
    $row = query($sql);

    $number_students = 0;
    $number_teachers = 0;

    foreach($row as $data){
        if($data["role"] == 1){
            $number_teachers += 1;
        }else{
            $number_students += 1;
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Dashboard</title>
    <link rel="stylesheet" href="css/sidenav.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link href='https://fonts.googleapis.com/css?family=Yantramanav' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-icons.css">
    <link rel="icon" type="image/x-icon" href="../assets/icon.ico">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>
<body>
    <?php
        include_once('sidenav.php');
    ?>
    
    <div class="main" style="font-family: 'Yantramanav';">
        
        <div class="head">
            <h2>Welcome, <?php echo ucwords($_SESSION["username"]); ?> !</h2>
        </div>

        <div class="body">
            <div class="numbers">
                <div>
                    <span>Number of Students</span>
                    <h2><?php echo $number_students ?></h2>
                </div>
                <div>
                    <span>Number of Teachers</span>
                    <h2><?php echo $number_teachers ?></h2>
                </div>
            </div>
        </div>
        
        <div class="charts">
            <div>
                <canvas id="myChart" style="width:100%;max-width:600px; height: 100%;"></canvas>
            </div>
        </div>
        
    </div>
    <script>
        var xValues = ["Student", "Teacher"];
        var yValues = [<?php echo $number_students?>, <?php echo $number_teachers ?>];
        var barColors = [
        "#212A3E",
        "#9BA4B5",
        ];

        new Chart("myChart", {
        type: "pie",
        data: {
            labels: xValues,
            datasets: [{
            backgroundColor: barColors,
            data: yValues
            }]
        },
        options: {
            title: {
            display: true,
            text: "Users"
            }
        }
        });
    </script>
</body>
</html>