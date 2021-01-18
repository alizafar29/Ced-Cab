<?php

$name = $_POST["location"];
$distance = $_POST["distance"];
$is_avail = $_POST["is_avail"];

$con = mysqli_connect('localhost','root','','CedCabDb');
    if($con){
            // echo "Connected Successully !<br>";
       
            $query = "INSERT INTO `tbl_location` (`id`, `name`, `distance`, `is_available`) VALUES (NULL, '$name', '$distance', '$is_avail')";
    
            $execute = mysqli_query($con,$query);
            if($execute){
                // echo "location Updated Successfully !";
                header("Location: admin_dashboard.php");
            }
            else{
                echo "Error : ",mysqli_error($con)."<br>";
            }
    }
    else{
        echo "Not Connected to the Database !",mysqli_connect_error($con);
    }


?>