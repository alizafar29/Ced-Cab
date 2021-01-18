<?php

    $user_id = $_COOKIE["user_id"];
    // echo "user Id : ",$user_id;
    $npassword = 0;
    $password = $_GET["password"];
    $password = MD5($password);
    // echo $password;
    $npassword = $_GET["npassword"];
    $npassword = MD5($npassword);
    // echo "nPass : ",$npassword;

    if($npassword == 0){
        // echo "Checking................";
        $con = mysqli_connect('localhost','root','','CedCabDb');
        if($con){
            // echo "Connected Successully !<br>";
        
                $query = "SELECT * FROM `tbl_user` WHERE `tbl_user`.`user_id` = $user_id";
        
                $execute = mysqli_query($con,$query);
                if($execute){
                    while($customer = mysqli_fetch_assoc($execute)){
                        if($password == $customer["password"]){
                            // echo "ovnfoavncnvofnvonzzzzzzzzzzzzzz";
                            echo 1;
                        }
                        else{
                            echo 0;
                        }
                    }
                    // echo "location Updated Successfully !";
                    // header("Location: rideRequest.php");
            }

        }
    }
    else{
        $con = mysqli_connect('localhost','root','','CedCabDb');
        if($con){
                // echo "Connected Successully !<br>";
           
                $query = "UPDATE `tbl_user` SET `password` = '$npassword' WHERE `tbl_user`.`user_id` = $user_id";
        
                $execute = mysqli_query($con,$query);
                if($execute){
                    echo 2;
                    // echo "Password Updated Successfully !";
                     }
                     else{
                         echo 3;
                     }
                }
        }



?>