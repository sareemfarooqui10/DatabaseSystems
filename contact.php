<?php
 
  session_start();
if(!isset($_SESSION)) session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
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
    <style>
      body {
        background-color: #000;
        color: #fff;
      }

      .contact-form {
        max-width: 600px;
        margin: 0 auto;
        margin-top: 50px;
      }

      #successMessage {
        text-align: center;
        font-size: 18px;
        color: #28a745;
        margin-top: 20px;
      }
    </style>
    <title>Contact Us</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #000">
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
          <li class="nav-item">
            <?php  
               
              // Check if user_ID session is set
              if (isset($_SESSION)) {
                echo '<a class="nav-link" href="home.php">Home</a>';
              } else {
                echo '<a class="nav-link" href="index.php">Home</a>';
              }
            ?>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 contact-form">
          <h3 class="well text-center">Contact Us</h3>

          <div id="successMessage"></div>

          <form id="contactForm">
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" id="name" required />
            </div>

            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" required />
            </div>

            <div class="form-group">
              <label for="message">Message:</label>
              <textarea class="form-control" id="message" rows="5" required></textarea>
            </div>

            <button type="button" class="btn btn-primary btn-block" onclick="submitForm()">Submit</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
      function submitForm() {
        // Simulate form submission
        const name = document.getElementById("name").value;
        const email = document.getElementById("email").value;
        const message = document.getElementById("message").value;

        // You can perform actual form submission using AJAX or any backend technology here
        // For now, let's just display a success message
        displaySuccessMessage();
      }

      function displaySuccessMessage() {
        const successMessage = document.getElementById("successMessage");
        successMessage.innerText = "Thank you for contacting us. Your message has been received, and we appreciate your inquiry. Our team will review it and get back to you as soon as possible. Kind regards.";

      }
    </script>
  </body>
</html>
