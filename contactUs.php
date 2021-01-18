<!doctype html>
<html lang="en">
  <head>
    <title>Success</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  <?php
  include "header.php";
  ?>
      <div class="form mt-5">
        <h1>Ask Your Query Here !</a></h1>
        <form action="thanku.html" method="POST">
          <div class="input-group flex-nowrap mb-3">
              <span class="input-group-text" id="addon-wrapping">Name</span>
              <input type="text" class="form-control" placeholder="Enter Your Name : " aria-label="Username" aria-describedby="addon-wrapping" required>
          </div>
          <div class="input-group flex-nowrap mb-3">
              <span class="input-group-text" id="addon-wrapping">Mobile Number</span>
              <input type="number" class="form-control" placeholder="+91 : " aria-label="Username" aria-describedby="addon-wrapping" required>
          </div>
          <div class="input-group flex-nowrap mb-3">
              <span class="input-group-text" id="addon-wrapping">Email Id</span>
              <input type="email" class="form-control" placeholder="@ : " aria-label="Username" aria-describedby="addon-wrapping" required>
          </div>
          <div class="input-group flex-nowrap mb-3">
              <span class="input-group-text" id="addon-wrapping">?</span>
              <textarea type="text" class="form-control" placeholder="Ask Your Query Here : " aria-label="Username" aria-describedby="addon-wrapping" required></textarea>
          </div>
          <button type="submit" class="btn btn-success btnC mb-3">Message</button>
      </form>
      </div>

  <?php
  include "footer.php";
  ?>
    <!-- Optional JavaScript -->
    <script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
  <script src="cab.js"></script>
  </body>
</html>