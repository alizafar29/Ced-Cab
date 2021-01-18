<?php

if(($_COOKIE["user_id"] == " ") && ($_COOKIE["user"] == " ")){
  header("Location: ../loginForm.php");
}

if(($_COOKIE["user_id"] != " ") && ($_COOKIE["user"] != " ") && ($_COOKIE["admin"] == 0)){
  header("Location: ../user_dashboard.php");
}

include "Available_location.php";
include "avail_customer.php";


  $serverName = "localhost";
  $userName = "root";
  $password = "";
  $dbName = "CedCabDb";

  setcookie("new_customer"," ");
  $canceledCount = 0;
  $pendingCount = 0;
  $completedCount = 0;
  $total_earning = 0;

  // $allRides = $calceledCount + $pendingCount + $completedCount;
  // $customer_user_id = $_COOKIE['user_id'];
  
  $query = "SELECT * FROM `tbl_ride`";
  
  $con = mysqli_connect($serverName,$userName,$password,$dbName);
if($con){
      ?>
      <table id='myTable' class='display'>
      <thead><tr class='bg-dark'>
      <th>Ride_Id</th>
      <th>Ride_Date</th>
      <th>Pickup</th>
      <th>Drop</th>
      <th>Cab_Type</th>
      <th>T.Distance</th>
      <th>Luggage</th>
      <th>T.Fare</th>
      <th>Status</th>
      <th>Cancel</th>
      <th>Allow</th>
      </tr></thead>
      <?php
      $sql1 = mysqli_query($con,$query);
      if($sql1){
        while($data1 = mysqli_fetch_assoc($sql1)){
          $cus_usr_id = $data1["customer_user_id"];
          if($data1["status"]==1){
            $status = "Pending";
            $pendingCount++;
            setcookie("pendingCount",$pendingCount);
          }
          if($data1["status"]==0){
            $canceledCount++;
            setcookie("canceledCount",$canceledCount);
        }
        if($data1["status"]==2){
            $completedCount++;
            $total_earning += $data1['total_fare'];
            setcookie("completedCount",$completedCount);
        }

      }
    }
    // $allRides = $_COOKIE["canceledCount"] + $_COOKIE["pendingCount"] + $_COOKIE["completedCount"];
       $allRides = $pendingCount + $canceledCount + $completedCount;
          echo "<tbody>";

?>


<!doctype html>
<html lang="en">
  <head>
    <title>Success</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../index.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
        
  </head>
  <body>

        <?php
              include "adminHeader.php";
        ?>
       <div class="text-center text-light my-5">
        <h1>Welcome to Admin Dashboard !</h1>
      </div>

      <div class="row text-center">
          <div class="col-md-3"> 
          <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
            <div class="card-header">Ride Request</div>
            <div class="card-body">
              <h5 class="card-title"><?php echo $pendingCount ?></h5>
              <a href="rideRequest.php?status=1"><button type="button" class="btn btn-outline-info">Ride Request</button></a>
            </div>
          </div>
          </div>
          <div class="col-md-3"> 
          <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
            <div class="card-header">Completed Rides</div>
            <div class="card-body">
              <h5 class="card-title"><?php echo $completedCount ?></h5>
              
              <a href="completedRide.php?status=2"><button type="button" class="btn btn-outline-danger">Completed Rides</button></a>
              </div>
          </div>
          </div>
          <div class="col-md-3"> 
          <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
            <div class="card-header">Canceled Rides</div>
            <div class="card-body">
              <h5 class="card-title"><?php echo $canceledCount ?></h5>
              <a href="completedRide.php?status=0"><button type="button" class="btn btn-outline-info">Canceled Rides</button></a>
              </div>
          </div>
          </div>
          <div class="col-md-3"> 
          <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
            <div class="card-header">All Rides</div>
            <div class="card-body">
              <h5 class="card-title"><?php echo $allRides ?></h5>
              <a href="allRide.php"><button type="button" class="btn btn-outline-warning">All Rides</button></a>
              </div>
          </div>
          </div>
      </div>

      <div class="row text-center">
          <div class="col-md-3"> 
          <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
            <div class="card-header">Totals Earnings</div>
            <div class="card-body">
              <h5 class="card-title"><?php echo $total_earning ?></h5>
              <a href="completedRide.php?status=2"><button type="button" class="btn btn-outline-info">Total Earnings</button></a>
              </div>
          </div>
          </div>
          <!-- <div class="col-md-3"> 
          <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
            <div class="card-header">Active Users</div>
            <div class="card-body">
              <h5 class="card-title">15</h5>
              <button type="button" class="btn btn-outline-info">Approved users Requests</button>
              </div>
          </div>
          </div> -->
          <div class="col-md-3"> 
          <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
            <div class="card-header">All Users</div>
            <div class="card-body">
              <h5 class="card-title"><?php echo $avl_customer ?></h5>
              <a href="avail_cus_list.php"><button type="button" class="btn btn-outline-danger">All Users</button></a>
              </div>
          </div>
          </div>
          <div class="col-md-3"> 
          <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
            <div class="card-header">Serviceable Locations</div>
            <div class="card-body">
              <h5 class="card-title"><?php echo $avl_location; ?></h5>
              <a href="avail_loc_details.php"><button type="button" class="btn btn-outline-warning">All Locations</button></a>
              </div>
          </div>
          </div>
      </div>

      <?php
            // $status = \
            $sql = mysqli_query($con,$query);
            if($sql){
            while($data = mysqli_fetch_assoc($sql)){
              if($data["status"]==1){
                $status = "Pending";
              echo "<form action='status.php' method='GET'>
              <tr class='bg-light'>
              <td>".$data["ride_id"]."</td>
              <td>".$data["ride_date"]."</td>
              <td>".$data["pickup_location"]."</td>
              <td>".$data["drop_location"]."</td>
              <td>".$data["cab_type"]."</td>
              <td>".$data["total_distance"]."</td>
              <td>".$data["luggage"]."</td>
              <td>".$data["total_fare"]."</td>
              <td class='text-danger'>$status</td>";
                ?>
              <td><a href="status.php?ride_id=<?php echo $data["ride_id"] ?>&status=0&customer_user_id=<?php echo $data["customer_user_id"]; ?>"><button style='background-color:red;color:white;border:1px solid red;padding:10%;border-radius:5px'>Cancel</button></a></td>
              <td><a href='status.php?ride_id=<?php echo $data["ride_id"] ?>&status=2&customer_user_id=<?php echo $data["customer_user_id"]; ?>'><button style='background-color:green;color:white;border:1px solid green;padding:10%;border-radius:5px'>Allow</button></a></td>
              
              <?php

              }
                    ?>
                  <!-- <td><a href="delete.php?Email="><button onclick="return confirm('Do you want to Delete this Record !')" style=' background-color:red;color:white;border:1px solid red;padding:10%;border-radius:5px'>Delete</button></a></td> -->
              </tr></form>
              <?php 
            }
          echo "</tbody></table>";
          ?>
          <!-- <div class="insertBtn">
          <a href='index.html'><button id='insert'>Insert New Record</button></a>
      </div> -->
      <?php
            }
      else{
          echo "Error ",mysqli_error($con);
      }
    }
  else{
      echo "Connection Failed :",mysqli_connect_error($con);
  }

  include "../footer.php";

  ?>

      

    <!-- Optional JavaScript -->
    <script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
  
  <script src="update_profile.js"></script>
  <script>
      $(document).ready( function () {
      $('#myTable').DataTable({
          'scrollX': false
      });
  
  } )
  </script>
  </body>
</html>
