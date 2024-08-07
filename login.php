<?php
session_start();


require_once('dbConnection.php');
if(isset($_POST['login'])){
  $username=$_POST['logemail'];
    $password=$_POST['logpassword'];

    

$query="select * from user where user_email='{$username}' AND user_password='{$password}'";
$result=mysqli_query($conn,$query);

    
    while($row=mysqli_fetch_assoc($result)){     //4 , 3 ,2 ,1 0 
        $userid=$row['user_ID'];
        $user=$row['user_email'];
        $pass=$row['user_password'];
                
    }
    
 
 //comparing username and password entered from the html from database ..
       if($username==$user&&$password==$pass){
        
        $_SESSION['user_email']=$user;            
        $_SESSION['user_ID']=$userid;   
           header("location:home.php");
       }
        else{
         header("location:register.php");
        }    

     
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />
    <title>Login - FITLIFE-365</title>
  </head>

  <body style="background-color: #000; color: #fff">
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <h2 class="text-center mb-4">Login to FITLIFE-365</h2>
          <form id="loginForm" onsubmit="return checkUserLogin()" method="post" action="login.php">
            <div class="form-group">
              <label for="logemail">Email address</label>
              <input
                type="email"
                class="form-control"
                id="logemail"
                name="logemail"
                placeholder="Enter your email"
                required
              />
            </div>
            <div class="form-group">
              <label for="logpassword">Password</label>
              <input
                type="password"
                class="form-control"
                id="logpassword"
                name="logpassword"
                placeholder="Enter your password"
                required
              />
            </div>
            <button type="submit" class="btn btn-primary btn-block" name="login">
              Login
            </button>
          </form>
          <div id="statusLogMsg"></div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"
    ></script>
    <script>
      function checkUserLogin() {
        console.log("Login button clicked");
        var userLogEmail = $("#logemail").val();
        var userPassword = $("#logpassword").val();

        $.ajax({
          url: "login.php",
          method: "POST",
          data: {
            checkLogEmail: "checkLogEmail",
            userLogEmail: userLogEmail,
            userPassword: userPassword,
          },
          success: function (data) {
            if (data == 0) {
              $("#statusLogMsg").html(
                '<small class="alert alert-danger">Invalid Email ID or Password</small>'
              );
            } else if (data == 1) {
              $("#statusLogMsg").html(
                '<div class="spinner-border text-success" role="status"></div>'
              );
              setTimeout(() => {
                window.location.href = "home.php";
              }, 1000);
            }
          },
        });
        return false;
      }
    </script>
  </body>
</html>
\