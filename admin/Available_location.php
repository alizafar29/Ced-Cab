<?php

$avl_location = 0;

$con = mysqli_connect('localhost','root','','CedCabDb');
    if($con){
            // echo "Connected Successully !<br>";
       
            $query = "SELECT * FROM `tbl_location`";
    
            $execute = mysqli_query($con,$query);
            if($execute){
                while($location = mysqli_fetch_assoc($execute)){
                    if($location['is_available'] == 1){
                        $avl_location++;
                    }
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