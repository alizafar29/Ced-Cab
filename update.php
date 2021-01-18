<?php
// echo "Hello";
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $password = MD5($password);

    $con = mysqli_connect('localhost','root','','CedCabDb');
    if($con){
        echo "Connected Successully !<br>";
        $query = "UPDATE `tbl_user` SET `name` = '$name', `mobile` = '$mobile', `password` = '$password' WHERE `tbl_user`.`user_email` = '$email'";
        // $query = "UPDATE `tbl_user` SET `Parents Name` = '$pName',`Students Name` = '$sName',`Gender` = '$gender',`Student Bday` = '$sBday',`Contact Number` = '$cNumber',`Receive Sms` = '$sms',`Address` = '$address',`City` = '$city',`Zip Code` = '$zipCode' WHERE `users`.`Email` = '$email'";
        $execute = mysqli_query($con,$query);
        if($execute){
            echo "Data Inserted Successfully !";
            header("Location: displayTable.php");
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