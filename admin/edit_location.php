<?php

if(($_COOKIE["user_id"] == " ") && ($_COOKIE["user"] == " ")){
  header("Location: ../loginForm.php");
}

if(($_COOKIE["user_id"] != " ") && ($_COOKIE["user"] != " ") && ($_COOKIE["admin"] == 0)){
  header("Location: ../user_dashboard.php");
}
  
$id = $_GET["id"];

$con = mysqli_connect('localhost','root','','CedCabDb');
    if($con){
            // echo "Connected Successully !<br>";
       
            $query = "SELECT * FROM `tbl_location` WHERE `id` = $id";
    
            $execute = mysqli_query($con,$query);
            if($execute){
                while($data = mysqli_fetch_assoc($execute)){

                    ?>
<!doctype html>
<html lang="en">
  <head>
    <title>Ced Cab Service</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  </head>
  <body>

  <?php
  include "adminHeader.php";
  ?>


    <div class="form signUpHeader">
<h1 class="text-dark">Add New Location</h1>
            <form action="update_location.php" method="POST">

            <div class="input-group flex-nowrap hide">
                  <span class="input-group-text" id="addon-wrapping"></span>
                  <input type="text" name="id" id="id" class="form-control" value="<?php echo $id; ?>" aria-label="Username" aria-describedby="addon-wrapping" required>
              </div>


                <div class="input-group flex-nowrap mb-3">
                  <span class="input-group-text" id="addon-wrapping">Location Name</span>
                  <input type="text" name="location" id="location" class="form-control" value="<?php echo $data['name']; ?>" aria-label="Username" aria-describedby="addon-wrapping" required>
              </div>

              <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping">Distance</span>
                <input type="number" id="distance" name="distance" class="form-control" value="<?php echo $data['distance']; ?>" aria-label="Username" aria-describedby="addon-wrapping" required>
            </div>

            <div class="input-group flex-nowrap mb-4">
                <span class="input-group-text" id="addon-wrapping">Is Available</span>
                <input type="number" name="is_avail" id="is_avail" class="form-control" value="<?php echo $data['is_available']; ?>" aria-label="Username" aria-describedby="addon-wrapping" required>
            </div>
            <button type="submit" class="btn btn-success btnC">Update Location</button>
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

<script src="cab.js"></script>

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
