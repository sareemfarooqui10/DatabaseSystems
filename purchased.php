<?php
session_start();
require_once('dbConnection.php');

// Check if the user is logged in
//if(!isset($_SESSION['user_email']))
if (!isset($_SESSION['user_id'])) {
   // Redirect to the login page or handle the case when the user is not logged in
  header("location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <style>
      body {
        background-color: #000;
        color: #fff;
      }

      .navbar {
        background-color: #000;
      }

      .container {
        color: #ffffff9a;
        border-radius: 10px;
        padding: 20px;
        margin-top: 20px;
      }

      .card-body {
        background-color: lightgrey;
      }

      .card-title,
      .card-text {
        color: #060000;
      }
    </style>
    <title>FITLIFE-365</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #000">
        <a class="navbar-brand" href="#">
            <i class="fas fa-dumbbell" style="margin-right: 5px"></i> FITLIFE-365
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="healthMetricsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Health Metrics
                    </a>
                    <div class="dropdown-menu" aria-labelledby="healthMetricsDropdown">
                        <a class="dropdown-item" href="BMI.html">BMI Calculator</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="caloriecal.html">Calorie Calculator</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="calorietrack.html">Calorie Tracker</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="purchasedDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        View Plans
                    </a>
                    <div class="dropdown-menu" aria-labelledby="purchasedDropdown">
                        <a class="dropdown-item" href="exercise_plans.php">Fitness Programs</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="purchased.php">Purchased Programs</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="viewdetails.php">Personal Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="diet.html">Diet Plan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="logout()">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="jumbotron">
                <h4 class="text-center">Purchased Plans</h4>
                <?php
                $useremail=$_SESSION['user_email'];
                $sql = "SELECT pur.purchase_ID,pl.plan_name,pl.plan_price,pur.start_date,pl.time_duration 
                FROM purchased AS pur join exercise_plans AS pl ON pur.plan_ID=pl.plan_ID
                WHERE pur.user_email= '$useremail'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>
                        <div class="bg-light mb-3">
                            <h5 class="card-header"><?php echo $row['plan_name']; ?></h5>
                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <div class="card-body">
                                        <small class="card-text">Duration: <?php echo $row['time_duration']; ?></small><br />
                                        <small class="card-text">Price: <?php echo $row['plan_price']; ?></small><br />
                                        <p class="card-text d-inline">Starting: <small><del>&#8377 <?php echo $row['start_date'] ?> </del></small> <span class="font-weight-bolder">&#8377 <?php echo $row['start_date']?> <span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
                <hr />
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script>
        function logout() {
            // Redirect to index.html
            window.location.href = "index.php";
            
        }
        
    </script>
</body>

</html>
