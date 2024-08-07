

<?php
session_start();


require_once('dbConnection.php');

if (isset($_POST['submit'])) {
 //   $userid=$_SESSION['user_ID'];
    $userfname = $_POST['fname'];
    $userlname = $_POST['lname'];
    $userage = $_POST['age'];
    $userheight = $_POST['height'];
    $userweight = $_POST['weight'];
    $usersex = $_POST['sex'];
    $userdob = $_POST['dob'];
    
   


    $sql1 = "INSERT INTO user_details (user_fname, user_lname, user_age, user_height, user_weight, gender, user_dob)
             VALUES ('$userfname', '$userlname', '$userage', '$userheight', '$userweight', '$usersex', '$userdob')";

    if ($conn->query($sql1) === TRUE) {
        echo '<script>alert("Details entered Successfully");</script>';
        echo '<script>window.location = "home.php";</script>';
    } else {
        echo '<script>alert("Failed to store information");</script>';
        echo '<script>window.location = "detail.php";</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>User Information - FITLIFE-365</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    />
</head>
<body style="background-color: #000; color: #fff">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">User Information</h2>
            <form
                id="detailsForm"
                onsubmit="return validateForm()"
                method="post"
                action="detail.php"
            >
                <fieldset>
                    <div class="form-group">
                        <label for="fname">First Name*</label>
                        <input
                            type="text"
                            class="form-control"
                            id="fname"
                            name="fname"
                            placeholder="Enter your first name"
                            required
                        />
                    </div>

                    <div class="form-group">
                        <label for="lname">Last Name*</label>
                        <input
                            type="text"
                            class="form-control"
                            id="lname"
                            name="lname"
                            placeholder="Enter your last name"
                            required
                        />
                    </div>

                    <div class="form-group">
                        <label for="age">Age*</label>
                        <input
                            type="number"
                            class="form-control"
                            id="age"
                            name="age"
                            placeholder="Enter your age"
                            required
                        />
                    </div>

                    <div class="form-group">
                        <label for="height">Height (in cm)*</label>
                        <input
                            type="number"
                            class="form-control"
                            id="height"
                            name="height"
                            placeholder="Enter your height"
                            required
                        />
                    </div>

                    <div class="form-group">
                        <label for="weight">Weight (in kg)*</label>
                        <input
                            type="number"
                            class="form-control"
                            id="weight"
                            name="weight"
                            placeholder="Enter your weight"
                            required
                        />
                    </div>

                    <div class="form-group">
                        <label for="sex">Sex*</label>
                        <select class="form-control" id="sex" name="sex" required>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input
                            type="date"
                            class="form-control"
                            id="dob"
                            name="dob"
                            placeholder="Enter your date of birth"
                        />
                    </div>
                </fieldset>

                <div class="d-grid mt-3">
                    <button
                        type="submit"
                        class="btn btn-primary"
                        value="submit"
                        name="submit"
                    >
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"
></script>
<script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"
></script>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"
></script>

<script>
    function validateForm() {
        var firstName = document.getElementById("fname").value;
        var lastName = document.getElementById("lname").value;
        var age = document.getElementById("age").value;
        var height = document.getElementById("height").value;
        var weight = document.getElementById("weight").value;
        var sex = document.getElementById("sex").value;

        if (!firstName || !lastName || !age || !height || !weight || !sex) {
            alert("Please fill in all mandatory fields.");
            return false;
        }

        return true;
    }
</script>
</body>
</html>
