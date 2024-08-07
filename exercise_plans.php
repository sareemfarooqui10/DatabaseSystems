<?php
  session_start();
  include('dbConnection.php');
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
                    <a class="nav-link" href="#" onclick="logout()">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid bg-dark">
      <!--an image could be placed here-->
    </div>
    <div class="container mt-5"> 
      <h1 class="text-center">All Plans</h1>
      <div class="row mt-4">
      <?php
          $sql = "SELECT * FROM exercise_plans";
          $result = $conn->query($sql);
          if($result->num_rows > 0){ 
            while($row = $result->fetch_assoc()){
              $plan_id = $row['plan_id'];
              echo ' 
                <div class="col-sm-4 mb-4">
                  <a href="plandetails.php?plan_id='.$plan_id.'" class="btn" style="text-align: left; padding:0px;"><div class="card">
                    
                    <div class="card-body">
                      <h5 class="card-title">'.$row['plan_name'].'</h5>
                    </div>
                    <div class="card-footer">
                      <p class="card-text d-inline">Plan Price: <small><del>&#8377 '.$row['plan_price'].'</del></small></p> <a class="btn btn-primary text-white font-weight-bolder float-right" href="plandetails.php?plan_id='.$plan_id.'">Click Here</a>
                    </div>
                  </div> </a>
                </div>
              ';
            }
          }
        ?> 
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

