<?php
session_start();

require_once('dbConnection.php');

if (isset($_POST['userSignup'])) {
  $userfname = $_POST['fname'];
  $userlname = $_POST['lname'];
  $useremail = $_POST['email'];
  $userpassword = $_POST['password'];

  $sql = "INSERT INTO user (user_fname, user_lname, user_email, user_password)
          VALUES ('$userfname', '$userlname', '$useremail', '$userpassword')";
    
  if ($conn->query($sql) == TRUE) {
     echo '<script> alert("User Created Successfully");</script>';
     echo '<script>
      window.location = "detail.php";
    </script>'; 
  }
  else {
    echo '<script>alert("Failed to create user");</script>';
    echo '<script>window.location = "register.php";</script>';
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
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <style>
        body {
            background-color: #000;
            color: #fff;
        }

        .alert {
            color: #fff !important;
        }

        .form-group small {
            color: #fff;
        }
    </style>

    <title>Sign Up - FITLIFE-365</title>
  </head>

  <body style="background-color: #000; color: #fff">
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <h2 class="text-center mb-4">Sign Up for FITLIFE-365</h2>
          <form
            id="signupForm"
            onsubmit="return validateForm()"
            action="register.php"
            s
            method="post"
          >
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
              <label for="email">Email address*</label>
              <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                placeholder="Enter your email"
                autocomplete="on"
                required
              />
              <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
              <label for="password">Password*</label>
              <input
                type="password"
                class="form-control"
                id="password"
                name="password"
                placeholder="Enter your password"
                required
              />
              <small id="passwordHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
              <label for="confirmPassword">Confirm Password*</label>
              <input
                type="password"
                class="form-control"
                id="confirmPassword"
                name="confirmPassword"
                placeholder="Confirm your password"
                required
              />
            </div>
            <div class="d-grid mt-3">
              <a href="detail.php">
                <button
                  type="submit"
                  class="btn btn-primary"
                  value="submit"
                  name="userSignup"
                >
                  Sign Up
                </button>
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
      document.getElementById("email").addEventListener("input", function () {
        validateEmail();
      });

      document
        .getElementById("password")
        .addEventListener("input", function () {
          validatePassword();
        });

      function validateEmail() {
        var emailInput = document.getElementById("email");
        var emailHelp = document.getElementById("emailHelp");

        if (emailInput.validity.valid) {
          emailHelp.textContent = "";
        } else {
          emailHelp.textContent = "Please enter a valid email address.";
        }
      }

      function validatePassword() {
        var passwordInput = document.getElementById("password");
        var passwordHelp = document.getElementById("passwordHelp");

        var passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

        if (passwordRegex.test(passwordInput.value)) {
          passwordHelp.textContent = "";
        } else {
          passwordHelp.textContent =
            "Password must be alphanumeric and at least 8 characters long.";
        }
      }

      function validateForm() {
        // Perform form validation here
        var firstName = document.getElementById("fname").value;
        var lastName = document.getElementById("lname").value;
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmPassword").value;

        // Check if all fields are filled
        if (
          !firstName ||
          !lastName ||
          !email ||
          !password ||
          !confirmPassword
        ) {
          alert("Please fill in all mandatory fields.");
          return false;
        }

        // Check if password and confirm password match
        if (password !== confirmPassword) {
          alert("Password and Confirm Password must match.");
          return false;
        }

        // Check if password is alphanumeric and at least 8 characters long
        var passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
        if (!passwordRegex.test(password)) {
          alert(
            "Password must be alphanumeric and at least 8 characters long."
          );
          return false;
        }

        // Check if email is valid
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
          alert("Please enter a valid email address.");
          return false;
        }

        return true;
      }
    </script>
  </body>
</html>
