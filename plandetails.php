<?php
 
  session_start();
if(!isset($_SESSION)) session_start();
$conn = mysqli_connect("localhost", "root", "", "fitlife_db");  
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
    </div>
    <div class="container mt-5"> <!--All Exercises-->
      <?php
          if(isset($_GET['plan_id'])){
           $plan_id = $_GET['plan_id'];
           $_SESSION['plan_id'] = $plan_id;
           $sql = "SELECT * FROM exercise WHERE plan_id = '$plan_id'";
          $result = $conn->query($sql);
          if($result->num_rows > 0){ 
            while($row = $result->fetch_assoc()){
              echo ' 
                <div class="row">
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Exercise Name: '.$row['exercise_name'].'</h5>
                    <p class="card-text">Details: '.$row['exercise_detail'].'</p>
                    <form action="paymentdone.php" method="post">
                    
                      <button type="submit" class="btn btn-primary text-white font-weight-bolder float-right" name="buy">Buy Now</button>
                    </form>
                  </div>
                </div>
              ';
            }
          }
         }
        ?>   
      </div><!-- End All Exercises  <input type="hidden" name="id" value='. $row["plan_price"] .'>--> 
      <div class="container">
          <div class="row">
          <?php $sql = "SELECT * FROM exercise";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
          echo '
           <table class="table table-bordered table-hover">
             <thead>
               <tr>
                 <th scope="col">Exercise No.</th>
                 <th scope="col">Exercise Name</th>
               </tr>
             </thead>
             <tbody>';
             $num = 0;
             while($row = $result->fetch_assoc()){
              if($row['plan_id'] == $plan_id) {
               $num++;
              echo ' <tr>
               <th scope="row">'.$num.'</th>
               <td>'. $row["exercise_name"].'</td></tr>';
              }
             }
             echo '</tbody>
           </table>';
            } ?>         
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

  
