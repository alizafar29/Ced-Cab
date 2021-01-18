<?php
    // print_r($_COOKIE);
    // print_r($_GET);
    $ride_id = $_GET['ride_id'];
    $status = $_GET['status'];
    // echo $ride_id;
    $customer_user_id = $_GET['customer_user_id'];
    // echo $status;
    // echo $customer_user_id;

    $con = mysqli_connect('localhost','root','','CedCabDb');
    if($con){
        if($status == 0){
            echo "Connected Successully !<br>";
       
            $query = "UPDATE `tbl_ride` SET `status` = 0 WHERE (`tbl_ride`.`ride_id` = '$ride_id' AND `tbl_ride`.`customer_user_id` = '$customer_user_id')";
    
            $execute = mysqli_query($con,$query);
            if($execute){
                // echo "Data Updated Successfully !";
                header("Location: rideRequest.php");
            }
            else{
                echo "Error : ",mysqli_error($con)."<br>";
            }
        }
        if($status == 2){
            // echo "Connected Successully !<br>";
       
            $query = "UPDATE `tbl_ride` SET `status` = 2 WHERE (`tbl_ride`.`ride_id` = '$ride_id' AND `tbl_ride`.`customer_user_id` = '$customer_user_id')";
    
            $execute = mysqli_query($con,$query);
            if($execute){
                // echo "Data Updated Successfully !";
                header("Location: rideRequest.php");
            }
            else{
                echo "Error : ",mysqli_error($con)."<br>";
            }
        }
    }
    else{
        echo "Not Connected to the Database !",mysqli_connect_error($con);
    }

?>