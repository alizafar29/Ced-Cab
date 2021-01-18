<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $name = $_POST['name'];
    $number = $_POST['mobile'];
    $password = $_POST['password'];


    $con = mysqli_connect('localhost','root','','CedCabDb');
    if($con){
        echo "Connected Successully !<br>";
        // $query = "INSERT INTO `tbl_user` VALUES('$email','$name','$number','$password')";

        $query = "INSERT INTO `tbl_user` (`user_id`, `user_email`, `name`, `dateofsignup`, `mobile`, `is_block`, `password`, `is_admin`) VALUES (NULL, '$email', '$name', current_timestamp(), '$number', '0', MD5('$password'), '0')";

        $execute = mysqli_query($con,$query);
        if($execute){
            echo "Data Inserted Successfully !";
            header("Location: user_dashboard.php");
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