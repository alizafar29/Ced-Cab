<?php

if(($_COOKIE["user_id"] == " ") && ($_COOKIE["user"] == " ")){
  header("Location: loginForm.php");
}

if(($_COOKIE["user_id"] != " ") && ($_COOKIE["user"] != " ") && ($_COOKIE["admin"] == 1)){
  header("Location: admin/admin_dashboard.php");
}


?>

<!doctype html>
<html lang="en">
  <head>
    <title>Ced Cab Service</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  </head>
  <body>

  <?php
  include "userHeader.php";
  ?>


    <div class="form signUpHeader">
<h1 class="text-dark">Change Your Password</h1>
<h6 class="alert"></h6>
            <form action="user_dashboard.php" method="POST">
                <div id="curpass" class="input-group flex-nowrap mb-3">
                  <span class="input-group-text" id="addon-wrapping">Current Password</span>
                  <input type="password" name="cPass" id="cPass" class="form-control" placeholder="Enter Current Password : " aria-label="Username" aria-describedby="addon-wrapping" required>
              </div>

              <div id="npass" class="input-group flex-nowrap mb-3 hide">
                <span class="input-group-text" id="addon-wrapping">New Password</span>
                <input type="password" id="nPass" name="nPass" class="form-control" placeholder="Enter New Password : " aria-label="Username" aria-describedby="addon-wrapping" required>
            </div>

            <div id="conpass" class="input-group flex-nowrap mb-4 hide">
                <span class="input-group-text" id="addon-wrapping">Confirm Password</span>
                <input type="password" name="conPass" id="conPass" class="form-control" placeholder="Confirm New Password : " aria-label="Username" aria-describedby="addon-wrapping" required>
            </div>
            <button type="button" id="submit" class="btn btn-success btnC">Change Password</button>
            <a id="gotoAdmin" class="hide" href="user_dashboard.php"><button>Goto Dashboard</button></a>
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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="admin/update_pass.js"></script>

  </body>
</html>