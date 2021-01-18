<?php
setcookie("user"," ");
setcookie("user_id"," ");
setcookie("admin"," ");
// print_r($_COOKIE);
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  <?php
     include "header.php";
  ?>


    <div id="alertMsg" class="alert alert-danger hide" role="alert">
      This is a danger alert—check it out!
    </div>
      <div class="login">

        <h1>Ced Cab Login Page !</h1>
        <form action="" method="POST">
              <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping">Email Id</span>
                <input type="email" id="uName" class="form-control" placeholder="@ : " aria-label="Username" aria-describedby="addon-wrapping" required>
            </div>
            <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping">Password</span>
                <input type="password" id="password" class="form-control" placeholder="Enter Password : " aria-label="Username" aria-describedby="addon-wrapping" required>
            </div>
            <button type="button" id="submit" class="btn btn-success btnC">Login</button>
        </form>
        <p class="mt-3">New User ? <a href="signUp.php">SignUp</a></p>
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
  
  <script src="login.js"></script>
  </body>
</html>
