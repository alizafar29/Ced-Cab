<?php

if(($_COOKIE["user_id"] == " ") && ($_COOKIE["user"] == " ")){
  header("Location: ../loginForm.php");
}

if(($_COOKIE["user_id"] != " ") && ($_COOKIE["user"] != " ") && ($_COOKIE["admin"] == 0)){
  header("Location: ../user_dashboard.php");
}
  
$user_id = $_COOKIE["user_id"];

$con = mysqli_connect('localhost','root','','CedCabDb');
    if($con){
            // echo "Connected Successully !<br>";
       
            $query = "SELECT * FROM `tbl_user` WHERE `user_id` = $user_id";
    
            $execute = mysqli_query($con,$query);
            if($execute){
                while($data = mysqli_fetch_assoc($execute)){

                    ?>

<!doctype html>
<html lang="en">
  <head>
    <title>Profile Update</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

      <?php
      include "adminHeader.php";
      ?>

      <div class="signUpHeader">
        <h1>Change Profile !</h1>
        <h6 id="alert" class="my-5 ml-5"></h6>
        <a id="gotoAdmin" class="hide btn btn-danger ml-5" href="admin_dashboard.php"><button class="btn btn-danger">Admin Dashboard</button></a>
        <form action="update_profile.php" method="POST">
        <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping">Name</span>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo $data["name"] ?>" aria-label="Username" aria-describedby="addon-wrapping" required>
            </div>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Mobile Number</span>
                <input type="number" name="mobile" id="mobile" class="form-control" value="<?php echo $data["mobile"] ?>" aria-label="Username" aria-describedby="addon-wrapping" required>
            </div>
            <div class="input-group flex-nowrap mb-3">
              <p id="alert1" class="">We send OTP on this Number.</p>
            </div>

            <div id="hide1" class="input-group flex-nowrap mb-3">
              <label for="otp"></label>
              <input type="number" name="mobileOtp" id="mobileOtp" class="form-control w-75 hide" id="mobileOtp" aria-describedby="emailHelp" placeholder="Enter Your OTP Here : ">
              <button type="button" id="mOtp" class="btn btn-danger mt-0 ml-5">Send OTP</button>
            </div> 

             <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping">Password</span>
                <input type="password" id="password" class="form-control" placeholder="Enter Password : " aria-label="Username" aria-describedby="addon-wrapping" required>
            </div>
            <button type="button" name="submit" id="submit" class="btn btn-success btnC mb-3">Update</button>

        </form>
      </div>
      
      <?php
      include "../footer.php";
      ?>
    <!-- Optional JavaScript -->
    <script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
  <!-- <script src="../cab.js"></script> -->
  <script src="../mobileOtp.js"></script>
  <script src="update_profile.js"></script>
  </body>
</html>

<?php
}                // echo "location Updated Successfully !";
                // header("Location: rideRequest.php");
            }
            else{
                echo "Error : ",mysqli_error($con)."<br>";
            }
    }
    else{
        echo "Not Connected to the locationbase !",mysqli_connect_error($con);
    }


?>
