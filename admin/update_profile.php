<?php
if(($_COOKIE["user_id"] == " ") && ($_COOKIE["user"] == " ")){
    header("Location: ../loginForm.php");
  }
  
  if(($_COOKIE["user_id"] != " ") && ($_COOKIE["user"] != " ") && ($_COOKIE["admin"] == 0)){
    header("Location: ../user_dashboard.php");
  }
  
    $user_id = $_COOKIE["user_id"];

    $name = $_POST["name"];
    $mobile = $_POST["mobile"];
    $password = $_POST["password"];
    $password = MD5($password);
// echo $password;
    // echo $name,$mobile,$password;
       // echo "Checking................";
        $con = mysqli_connect('localhost','root','','CedCabDb');
        if($con){

        
                $query = "SELECT * FROM `tbl_user` WHERE `tbl_user`.`user_id` = $user_id";
        
                $execute = mysqli_query($con,$query);
                if($execute){

                    while($customer = mysqli_fetch_assoc($execute)){
                        if($password == $customer["password"]){
                            // echo "Connected Successully !<br>";
                            $con1 = mysqli_connect('localhost','root','','CedCabDb');
                            $query1 = "UPDATE `tbl_user` SET `name` = '$name',`mobile` = '$mobile' WHERE `tbl_user`.`user_id` = $user_id";

                            $execute1 = mysqli_query($con1,$query1);
                            if($con1){
                                setcookie("user",$name);
                            echo 1;
                        }
                        else{
                            echo 0;
                        }
                    }
                    else{
                        echo 2;
                    }

                    // header("Location: rideRequest.php");
            }

        }
    }
?>