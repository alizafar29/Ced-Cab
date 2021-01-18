<?php

    $uName = $_POST['userName'];
    $password = MD5($_POST['password']);
    // echo $password;
    // echo $uName,$password,"...............";

    $query = "SELECT * FROM `tbl_user` WHERE `tbl_user`.`user_email` = '$uName'";
    $con = mysqli_connect('localhost','root','','CedCabDb');
    if($con){
        // echo "Connected Successully !<br>";
        $execute = mysqli_query($con,$query);
        if($execute){
            // echo "Data Fetch Successfully !";
            while($data=mysqli_fetch_assoc($execute)){
                $User_Email = $data['user_email'];
                $Password = $data['password'];
                $admin = $data['is_admin'];
                $name = $data['name'];
                $user_id = $data['user_id'];
            }
                // echo $User_Name,$Password,$is_admin;
                if($uName == $User_Email && $password == $Password && $admin == 1){
                    setcookie("user",$name);
                    setcookie("user_id",$user_id);
                    setcookie("admin",$admin);
                    echo 1;
                    // header("Location: thanku.html");

                }
                if($uName == $User_Email && $password == $Password && $admin == 0){
                    setcookie("user",$name);
                    setcookie("user_id",$user_id);
                    setcookie("admin",$admin);
                    echo 0;
                    // header("Location: thanku.html");

                }
                if($password != $Password){
                    // header("Location: admin.html");
                    echo "Error";

                }
 
        }
        else{
            echo 0;
            // echo "Error : ",mysqli_error($con);
        }
    }
    else{
        echo "Not Connected to the Database !",mysqli_connect_error($con);
    }


?>