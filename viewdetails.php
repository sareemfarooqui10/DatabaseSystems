<?php
session_start();
if(!isset($_SESSION)) session_start();

$conn = mysqli_connect("localhost", "root", "", "fitlife_db");  

// Check if the user is logged in

if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or handle the case when the user is not logged in
   header("location: login.php");
   exit();
 }

// Handle form submission for updating user details
if (isset($_POST['submit'])) {
    // Update user details
    $userid = $_SESSION['user_id'];//foreign key user_ID 
    $userheight = $_POST['height'];
    $userage = $_POST['age'];
    $userweight = $_POST['weight'];

    $sql_update = "UPDATE user_details SET user_height='$userheight', user_age='$userage', user_weight='$userweight' WHERE user_detail_id='$userid'";

    if ($conn->query($sql_update) === TRUE) {
        echo '<script>alert("Details updated successfully");</script>';
    } else {
        echo '<script>alert("Failed to update information");</script>';
    }
}

// Fetch user details for viewing
$user = $_SESSION['user_email'];
$sql_select = "SELECT * FROM user_details WHERE user_email='$user'";
$result = $conn->query($sql_select);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $userfname = $row['user_fname'];
    $userlname = $row['user_lname'];
    $userage = $row['user_age'];
    $userheight = $row['user_height'];
    $userweight = $row['user_weight'];
    $usersex = $row['gender'];
    $userdob = $row['user_dob'];
} 
else {
    echo "User details not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>User Information - FITLIFE-365</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
</head>
<body style="background-color: #000; color: #fff">
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
                    <a class="nav-link" href="home.php">Home</a>
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
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">User Information</h2>
                <form id="detailsForm" method="post" action="viewdetails.php">
                    <fieldset>
                        <div class="form-group">
                            <label for="fname">First Name*</label>
                            <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $userfname; ?>" disabled/>
                        </div>

                        <div class="form-group">
                            <label for="lname">Last Name*</label>
                            <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $userlname; ?>" disabled/>
                        </div>

                        <div class="form-group">
                            <label for="age">Age*</label>
                            <input type="number" class="form-control" id="age" name="age" value="<?php echo $userage; ?>" required/>
                        </div>

                        <div class="form-group">
                            <label for="height">Height (in cm)*</label>
                            <input type="number" class="form-control" id="height" name="height" value="<?php echo $userheight; ?>" required/>
                        </div>

                        <div class="form-group">
                            <label for="weight">Weight (in kg)*</label>
                            <input type="number" class="form-control" id="weight" name="weight" value="<?php echo $userweight; ?>" required/>
                        </div>

                        <div class="form-group">
                            <label for="sex">Sex*</label>
                            <input type="text" class="form-control" id="sex" name="sex" value="<?php echo $usersex; ?>" disabled/>
                        </div>

                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input type="text" class="form-control" id="dob" name="dob" value="<?php echo $userdob; ?>" disabled/>
                        </div>
                    </fieldset>

                    <div class="d-grid mt-3">
                        <button type="submit" class="btn btn-primary" value="submit" name="submit">Update Details</button>
                    </div>
                </form>
            </div>
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
