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
    <title>Success</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  </head>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

  </head>
  <body>
<?php

  include "userHeader.php";
?>
<?php
  $serverName = "localhost";
  $userName = "root";
  $password = "";
  $dbName = "CedCabDb";
  
  $customer_user_id = $_COOKIE['user_id'];
  
  $query = "SELECT * FROM `tbl_ride` WHERE `status` = 1 AND `customer_user_id` = $customer_user_id";
  
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
      <th>Action</th>
      </tr></thead>
      <?php
      $sql = mysqli_query($con,$query);
      if($sql){
          echo "<tbody>";
          while($data = mysqli_fetch_assoc($sql)){
            if($data["status"]==1){
              $status = "Pending";
            }
            // $status = 
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
              <td><a href="status.php?ride_id=<?php echo $data["ride_id"] ?>"><button style='background-color:red;color:white;border:1px solid red;padding:10%;border-radius:5px'>Cancel</button></a></td>
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

  include "footer.php";

  ?>

<script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
 
  <script src="cab.js"></script>

  <script>
      $(document).ready( function () {
      $('#myTable').DataTable({
          'scrollX': false
      });
  
  } )
  </script>
  </body>
</html>