<?php 
include('./dbConnection.php');
session_start();
if(!isset($_SESSION['user_email'])) {
 echo "<script> location.href='loginorsignup.php'; </script>";
} else { 
  $start_date='2020-09-31';
 if(isset($_SESSION['user_email'])){
  $plan_id = $_POST['plan_id'];
  $user_email = $_SESSION['user_email'];
  $start_date = '$start_date';
  $sql = "INSERT INTO purchased(plan_id,user_email,start_date) VALUES ('$plan_id', '$user_email', '$start_date')";
   if($conn->query($sql) == TRUE){
    echo "You are being redirected to My Profile page";
    echo "<script> setTimeout(() => {
     window.location.href = './user/myPlan.php';
   }, 1500); </script>";
   };
 } else {
 echo "<b>Transaction status=failed</b>" . "<br/>";
 }
}
?>