<?php
session_start();
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
    <title>FITLIFE-365</title>
  </head>
  <body>
    <nav
      class="navbar navbar-expand-lg navbar-dark"
      style="background-color: #000"
    >
      <a class="navbar-brand" href="#">
        <i class="fas fa-dumbbell" style="margin-right: 5px"></i> FITLIFE-365
      </a>

      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="healthMetricsDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
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
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="purchasedDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              View Plans
            </a>
            <div class="dropdown-menu" aria-labelledby="purchasedDropdown">
                        <a class="dropdown-item" href="exercise_plans.php">Fitness Programs</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="purchased.php" >Purchased Programs</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="viewdetails.php" name="submit">Personal Information</a>
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

    <section class="home" style="background-color: #000; color: #fff; padding: 5rem 0">
      <div class="container">
        <div class="row">
          <div class="col-md-6 home-content text-center">
            <h3 class="display-3 mt-5">
              Help for Ideal <br />
              Body Fitness
            </h3>
            <p class="lead">
              Embrace the challenge, for in the sweat of determination, the
              extraordinary becomes possible. Rise above excuses, sculpt your
              journey, and let the echoes of your effort drown out the whispers
              of doubt.
            </p>
          </div>
          <div class="col-md-6 home-image">
            <img src="Fitman.jpg" alt="" class="img-fluid" style="width: 900px; height: 400px" />
          </div>
        </div>
      </div>
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
