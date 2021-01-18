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

include "header.php";

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "CedCabDb";

$query = "SELECT * FROM `tbl_user`";

$con = mysqli_connect($serverName,$userName,$password,$dbName);
if($con){
    ?>
    <table id='myTable' class='display'>
    <thead><tr>
    <th>User_Id</th>
    <th>User_Email</th>
    <th>Name</th>
    <th>DOSingup</th>
    <th>Mobile</th>
    <th>Is_Block</th>
    <th>Password</th>
    <th>Is_Admin</th>
    <th>Update</th>
    <th>Delete</th>
    </tr></thead>
    <?php
    $sql = mysqli_query($con,$query);
    if($sql){
        echo "<tbody>";
        while($data = mysqli_fetch_assoc($sql)){
            echo "<form action='update.php' method='GET'>
            <tr>
            <td>".$data["user_id"]."</td>
            <td>".$data["user_email"]."</td>
            <td>".$data["name"]."</td>
            <td>".$data["dateofsignup"]."</td>
            <td>".$data["mobile"]."</td>
            <td>".$data["is_block"]."</td>
            <td>".$data["password"]."</td>
            <td>".$data["is_admin"]."</td>"
            ?>
            <td><a href="edit.php?Email=<?php echo $data["user_email"] ?>"><button style='background-color:green;color:white;border:1px solid green;padding:10%;border-radius:5px'>Update</button></a></td>
            <td><a href="delete.php?Email=<?php echo $data["user_email"] ?>"><button onclick="return confirm('Do you want to Delete this Record !')" style=' background-color:red;color:white;border:1px solid red;padding:10%;border-radius:5px'>Delete</button></a></td>
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
  <!-- <script src="delete.js"></script> -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable({
        'scrollX': false
    });

} );

</script>
</body>
</html>