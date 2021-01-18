<?php
if(($_COOKIE["user_id"] == " ") && ($_COOKIE["user"] == " ")){
    header("Location: ../loginForm.php");
  }
  
  if(($_COOKIE["user_id"] != " ") && ($_COOKIE["user"] != " ") && ($_COOKIE["admin"] == 0)){
    header("Location: ../user_dashboard.php");
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records</title>
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
</head>
<body>
<?php

include "adminHeader.php";

$Is_avail = " ";
$color = " ";
$con = mysqli_connect('localhost','root','','CedCabDb');
    if($con){
    ?>
    <h1 class='text-light text-center my-5'>All Location details : </h1>
    <table id='myTable' class='display'>
    <thead><tr>
    <th>Id</th>
    <th>Name</th>
    <th>Distance</th>
    <th>Is_Available</th>
    <th>Update</th>
    <th>Delete</th>
    </tr></thead>
    <?php
    
            $query = "SELECT * FROM `tbl_location`";
    
            $execute = mysqli_query($con,$query);
            if($execute){
                while($data = mysqli_fetch_assoc($execute)){
                    if($data['is_available'] == 1){
                        $Is_avail = "Available";
                        $color = "text-success";
                    }
                    else{
                        $Is_avail = "Unavailable";
                        $color = "text-danger";
                    }
            echo "<form action='update.php' method='GET'>
            <tr>
            <td>".$data["id"]."</td>
            <td>".$data["name"]."</td>
            <td>".$data["distance"]."</td>
            <td class='$color'>$Is_avail</td>";
            ?>
            <td><a href="edit_location.php?id=<?php echo $data["id"] ?>"><button style='background-color:green;color:white;border:1px solid green;padding:5%;border-radius:5px'>Update</button></a></td>
            <td><a href="delete_location.php?id=<?php echo $data["id"] ?>"><button style='background-color:red;color:white;border:1px solid red;padding:5%;border-radius:5px'>Delete</button></a></td>
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

include "../footer.php";

?>

<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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