<!doctype html>
<html lang="en">
  <head>
    <title>SignUp</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  </head>
  </head>
  <body>

      <?php
      include "header.php";
      ?>

      <div class="signUpHeader">
        <h1>Ced Cab SignUp Page !</h1>
        <form action="insertIntoDb.php" method="POST">
          <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Email Id</span>
            <input type="email" name="email" id="email" class="form-control" placeholder="@ : " aria-label="Username" aria-describedby="addon-wrapping" required>
        </div>
        <div class="input-group flex-nowrap">
          <p id="alert" style="font-size:80%">We'll never share your email with anyone else.</p>
        </div>
          <div id="hide" class="input-group flex-nowrap mb-3">
            <label for="otp"></label>
            <input type="number" name="otp" class="form-control w-75 hide" id="otp" aria-describedby="emailHelp" placeholder="Enter Your OTP Here : ">
            <button type="button" id="otpSend" class="btn btn-danger mt-0 ml-5 w-75">Send OTP</button>
          </div> 
            <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping">Name</span>
                <input type="text" name="name" class="form-control" placeholder="Enter Your Name : " aria-label="Username" aria-describedby="addon-wrapping" required>
            </div>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Mobile Number</span>
                <input type="number" name="mobile" id="mobile" class="form-control" placeholder="+91 : " aria-label="Username" aria-describedby="addon-wrapping" required>
            </div>
            <div class="input-group flex-nowrap">
              <p id="alert1" class="" style="font-size:80%">We send OTP on this Number.</p>
            </div>

            <div id="hide1" class="input-group flex-nowrap mb-3">
              <label for="otp"></label>
              <input type="number" name="mobileOtp" id="mobileOtp" class="form-control w-75 hide" id="mobileOtp" aria-describedby="emailHelp" placeholder="Enter Your OTP Here : ">
              <button type="button" id="mOtp" class="btn btn-danger mt-0 ml-5 w-75">Send OTP</button>
            </div> 

             <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping">Password</span>
                <input type="password" name="password" class="form-control" placeholder="Enter Password : " aria-label="Username" aria-describedby="addon-wrapping" required>
            </div>
            <button type="submit" class="btn btn-success btnC mb-3 w-100" disabled>SignUp</button>
        </form>
        <p class="mt-3">Alreay Account ? <a href="loginForm.php">Login</button></p>
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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
  <script src="cab.js"></script>
  <script src="mobileOtp.js"></script>
  <script src="otp.js"></script>
  </body>
</html>