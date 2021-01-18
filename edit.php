<?php
  if(($_COOKIE["user_id"] == " ") && ($_COOKIE["user"] == " ")){
    header("Location: loginForm.php");
  }
  
  if(($_COOKIE["user_id"] != " ") && ($_COOKIE["user"] != " ") && ($_COOKIE["admin"] == 1)){
    header("Location: admin/admin_dashboard.php");
  }


if(isset($_GET['Email'])){
    $email = $_GET['Email'];
}
$query = "SELECT * FROM `tbl_user` WHERE `user_email` = '$email'";

$con = mysqli_connect('localhost','root','','CedCabDb');
if($con){
    $sql = mysqli_query($con,$query);
    if($sql){
        while($data = mysqli_fetch_assoc($sql)){
          // echo $data["Parent's_Name"];
          ?>
            <!-- echo " -->
 <!doctype html>
<html lang="en">
  <head>
    <title>Update Details</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand brand" href="index.php"><strong>Ced <em>Cab</em></strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
    
          </ul>
        <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
          <li class="nav-item active">
              <a class="nav-link active" aria-current="page" href="aboutUs.html">About Us</a>
            </li>
              <li class="nav-item active">
              <a class="nav-link active" aria-current="page" href="contactUs.html">Contact Us</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link active" aria-current="page" href="signUp.html">SignUp</a>
            </li>
              <li class="nav-item active">
              <a class="nav-link active" aria-current="page" href="login.html">LogIn</a>
            </li>
        </ul>
        </div>
      </div>
    </nav>
      
      <div class="signUpHeader">
        <form action="update.php" method="POST">
          <div class="input-group flex-nowrap mb-3">
            <span class="input-group-text" id="addon-wrapping">Email Id</span>
            <input type="email" name="email" id="email" class="form-control" value="<?php echo $data['user_email'] ?>" aria-label="Username" aria-describedby="addon-wrapping" readonly>
        </div>
            <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping">Name</span>
                <input type="text" name="name" class="form-control" aria-label="Username" value="<?php echo $data['name'] ?>" aria-describedby="addon-wrapping" required>
            </div>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Mobile Number</span>
                <input type="number" name="mobile" id="mobile" class="form-control" value="<?php echo $data['mobile'] ?>" aria-label="Username" aria-describedby="addon-wrapping" required>
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
                <input type="password" name="password" class="form-control" value="<?php echo $data['password'] ?>" aria-label="Username" aria-describedby="addon-wrapping" required>
            </div>
            <button type="submit" name="submit" class="btn btn-success btnC mb-3">Update</button>
        </form>
      </div>

      <div class="bg-dark sec mt-5">
        <div class="row">
          <div class="col-md-4 text-center pt-3">
              <i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i>
              <i class="fa fa-twitter-square fa-2x px-5" id="icons" aria-hidden="true"></i>
              <i class="fa fa-instagram fa-2x" aria-hidden="true"></i>
          </div>
          <div class="col-md-4 pt-2 text-center">
              <h1 style="color: #f7096e">Ced Cabs</h1>
          </div>
          <div class="col-md-4 mt-3 text-center">
              <a class="text-light" href="contactUs.html">CONTACT US</a>
              <a class="px-3 text-light" href="signUp.html">SIGN UP</a>
              <a class="text-light" href="login.html">LOG IN</a>
          </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
  <script src="cab.js"></script>
  <script src="mobileOtp.js"></script>
  <script src="otp.js"></script>
  </body>
</html>
            <?php
           
        }
    }
    else{
        echo "Error ",mysqli_error($con);
    }
}
else{
    echo "Connection Failed :",mysqli_connect_error($con);
}
include "footer.php";
?>
<!-- <script>
function confirmation(val){
  console.log(val);
    var option = confirm("Do You Want to Update this Record !");
    if(option == true){
      console.log("Hello");
        window.location.href = "update.php?Email="+val;
    }
    else{
        
    }
}
onclick="confirmation('')"

</script> -->
