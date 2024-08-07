<?php
  include('./dbConnection.php'); 
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
  <style>
     .custom-row {
    /* Add your custom styles here */
    margin: 0; /* Example: Remove default margin */
    /*padding: 10px; /* Example: Add some padding */
    background-color: #f0f0f000;
    height: fit-content;
    }
  </style>

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
            <a class="nav-link" href="index.php"
              >Home <span class="sr-only">(current)</span></a
            >
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              Health Metrics
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="BMI.html">BMI Calculator</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="caloriecal.html">Calorie Calculator</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="calorietrack.html">Calorie Tracker</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">|</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">UserLogin</a>
          </li>
        </ul>
      </div>
    </nav>

    <section
      class="home"
      style="background-color: #000; color: #fff; padding: 4rem 0"
    >
      <div class="container">
        <div class="row custom-row">
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
            <a class="btn btn-outline-light mt-3" href="register.php"
              >Get started</a
            >
          </div>
          
          <div class="col-md-6 home-image">
            <img
              src="Fitman.jpg"
              alt=""
              class="img-fluid"
              style="width: 900px; height: 450px" 
            />
          </div>

        </div>
      </div>
    </section> 
    <!-- Jquery and Boostrap JavaScript -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- Font Awesome JS -->
    <script type="text/javascript" src="js/all.min.js"></script>
    <!-- User Ajax Call JavaScript -->
    <script type="text/javascript" src="js/ajaxrequest.js"></script>
    <!-- Admin Ajax Call JavaScript -->
    <script type="text/javascript" src="js/adminajaxrequest.js"></script>
    <!-- Custom JavaScript -->
    <script type="text/javascript" src="js/custom.js"></script>
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
  </body>
</html>
  <?php 
    // Footer Include from mainInclude 
    include('./mainInclude/footer.php'); 
    
  ?>
