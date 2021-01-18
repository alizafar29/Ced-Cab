<?php

$name = $_POST["location"];
$distance = $_POST["distance"];
$is_avail = $_POST["is_avail"];

$id = $_POST["id"];

echo $name,$distance,$is_avail;

$con = mysqli_connect('localhost','root','','CedCabDb');
    if($con){
            // echo "Connected Successully !<br>";
       
            $query = "UPDATE `tbl_location` SET `name` = '$name', `distance` = '$distance', `is_available` = $is_avail WHERE `tbl_location`.`id` = $id;";
    
            $execute = mysqli_query($con,$query);
            if($execute){
                // echo "location Updated Successfully !";
                header("Location: avail_loc_details.php");
            }
            else{
                echo "Error : ",mysqli_error($con)."<br>";
            }
    }
    else{
        echo "Not Connected to the Database !",mysqli_connect_error($con);
    }


?>