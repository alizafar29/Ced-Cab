<?php

$id = $_GET["id"];

$con = mysqli_connect('localhost','root','','CedCabDb');
    if($con){
            // echo "Connected Successully !<br>";
       
            $query = "DELETE FROM `tbl_location` WHERE `tbl_location`.`id` = $id";
    
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
        echo "Not Connected to the locationbase !",mysqli_connect_error($con);
    }


?>