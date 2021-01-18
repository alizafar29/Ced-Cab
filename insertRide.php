<?php

if(($_COOKIE["user_id"] == " ") && ($_COOKIE["user"] == " ")){
    header("Location: loginForm.php");
  }
  
  if(($_COOKIE["user_id"] != " ") && ($_COOKIE["user"] != " ") && ($_COOKIE["admin"] == 1)){
    header("Location: admin/admin_dashboard.php");
  }

    $user = $_COOKIE['user'];
    $customer_user_id = $_COOKIE['user_id'];
    $pickup = $_COOKIE['pickup'];
    $drop = $_COOKIE['drop'];
    $cab_type = $_COOKIE['cab_type'];
    $distance = $_COOKIE['distance'];
    $luggage = $_COOKIE['luggage'];
    $total_fare = $_COOKIE['total_fare'];
    // print_r($_COOKIE)
    if($user == " "){
        header("location: loginForm.php");
    }
    else{

        $con = mysqli_connect('localhost','root','','CedCabDb');
        if($con){
            echo "Connected Successully !<br>";
            // $query = "INSERT INTO `tbl_user` VALUES('$email','$name','$number','$password')";

            // $query = "INSERT INTO `tbl_ride` (`user_id`, `user_email`, `name`, `dateofsignup`, `mobile`, `is_block`, `password`, `is_admin`) VALUES (NULL, '$email', '$name', current_timestamp(), '$number', '0', MD5('$password'), '0')";

            $query = "INSERT INTO `tbl_ride` (`ride_id`, `ride_date`, `pickup_location`,
            `drop_location`, `cab_type`, `total_distance`, `luggage`, `total_fare`,
             `status`, `customer_user_id`) VALUES (NULL, current_timestamp(), '$pickup',
              '$drop', '$cab_type', '$distance', '$luggage', '$total_fare', '1', '$customer_user_id');";

            $execute = mysqli_query($con,$query);
            if($execute){
                echo "Data Inserted Successfully !";
                header("location: user_dashboard.php");
                // header("Location: index.html");
            }
            else{
                echo "Error : ",mysqli_error($con)."<br>";
            }
        }
        else{
            echo "Not Connected to the Database !",mysqli_connect_error($con);
        }

 
    }

?>