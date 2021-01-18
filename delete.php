<?php
if(isset($_GET['Email'])){
    $email = $_GET['Email'];
// echo "Hello !",$email;

$con = mysqli_connect('localhost','root','','CedCabDb');
if($con){
    echo "Connected Successully !<br>";
    $query = "DELETE FROM `tbl_user` WHERE `tbl_user`.`user_email` = '$email'";
    $execute = mysqli_query($con,$query);
    if($execute){
        echo "Data Deleted Successfully !";
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

