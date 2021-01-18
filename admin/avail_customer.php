<?php

$avl_customer = -1;

$con = mysqli_connect('localhost','root','','CedCabDb');
    if($con){
            // echo "Connected Successully !<br>";
       
            $query = "SELECT * FROM `tbl_user`";
    
            $execute = mysqli_query($con,$query);
            if($execute){
                while($customer = mysqli_fetch_assoc($execute)){
                    $avl_customer++;
                }
                // echo "location Updated Successfully !";
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