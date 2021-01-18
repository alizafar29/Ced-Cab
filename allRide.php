<?php
  if(($_COOKIE["user_id"] == " ") && ($_COOKIE["user"] == " ")){
    header("Location: loginForm.php");
  }
  
  if(($_COOKIE["user_id"] != " ") && ($_COOKIE["user"] != " ") && ($_COOKIE["admin"] == 1)){
    header("Location: admin/admin_dashboard.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
</head>
<body>
<?php
include "userHeader.php";

// print_r($_COOKIE);
$user_id = $_COOKIE["user_id"];

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "CedCabDb";
$color = " ";

$query = "SELECT * FROM `tbl_ride` WHERE `tbl_ride`.`customer_user_id` = $user_id";

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
      <th>Details</th>
      </tr></thead>
    <?php
    $sql = mysqli_query($con,$query);
    if($sql){
        echo "<tbody>";
        while($data = mysqli_fetch_assoc($sql)){
            if($data["status"]==1){
                $status = "Pending";
                $color = "text-danger";
              }
            if($data["status"]==2){
                $status = "Completed";
                $color = "text-success";
              }
              if($data["status"]==0){
                $status = "Cenceled";
                $color = "text-danger";
              }
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
                <td class='$color'>$status</td>";
            ?>
            <td><button class="details" data-toggle="modal" data-target="#exampleModal" value=<?php echo $data["ride_id"],".",$data["customer_user_id"] ?> style=' background-color:red;color:white;border:1px solid red;padding:10%;border-radius:5px'>Details</button></td>
            <?php 
            // echo $data["ride_id"];
            ?>
       </tr></form>
       <?php 
        }
        echo "</tbody></table>";
        ?>

    <?php
    }
    else{
        echo "Error ",mysqli_error($con);
    }
}
else{
    echo "Connection Failed :",mysqli_connect_error($con);
}
include "admin/allDetailsDisplay.php";

include "footer.php";

?>


  <!-- <script src="delete.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script>
    var ride_id;
    $(document).ready( function () {
    $('#myTable').DataTable({
        'scrollX': false
    });

    $(".details").click(function(){
      // console.log("hello");
      ride_id = $(this).val();
      // console.log(ride_id);
      $.ajax({
                url:"admin/allDetails.php",
                data:{ride_id:ride_id},
                success:function(data){
                    // console.log("Php Send Data : ",data);
                    $(".success").html(data);
  
                }
            });
    })


} );
</script>
</body>
</html>

