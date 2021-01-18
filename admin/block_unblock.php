<?php

$user_id = $_GET["user_id"];
$status = $_GET["status"];

echo $user_id,$status;

$con = mysqli_connect('localhost','root','','CedCabDb');
    if($con){
            // echo "Connected Successully !<br>";
       
            $query = "UPDATE `tbl_user` SET `is_block` = $status WHERE `tbl_user`.`user_id` = $user_id";
    
            $execute = mysqli_query($con,$query);
            if($execute){
                // echo "location Updated Successfully !";
                header("Location: avail_cus_list.php");
            }
            else{
                echo "Error : ",mysqli_error($con)."<br>";
            }
    }
    else{
        echo "Not Connected to the locationbase !",mysqli_connect_error($con);
    }


?>