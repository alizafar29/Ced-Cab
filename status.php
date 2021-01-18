<?php
    // print_r($_COOKIE);
    $ride_id = $_GET['ride_id'];
    // echo $ride_id;
    $customer_user_id = $_COOKIE['user_id'];
    // echo $ride_id;

    $con = mysqli_connect('localhost','root','','CedCabDb');
    if($con){
        // echo "Connected Successully !<br>";
       
        $query = "UPDATE `tbl_ride` SET `status` = '0' WHERE (`tbl_ride`.`ride_id` = '$ride_id' AND `tbl_ride`.`customer_user_id` = '$customer_user_id');";

        $execute = mysqli_query($con,$query);
        if($execute){
            // echo "Data Updated Successfully !";
            header("Location: user_dashboard.php");
        }
        else{
            echo "Error : ",mysqli_error($con)."<br>";
        }
    }
    else{
        echo "Not Connected to the Database !",mysqli_connect_error($con);
    }

?>