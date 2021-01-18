<?php
    // print_r($_COOKIE);

    $value1 = $_GET["ride_id"];
    $value2 = explode(".",$value1);
    $ride_id = $value2[0];
    $customer_user_id = $value2[1];

    $status = " ";
    $color = " ";
    // echo $ride_id,$customer_user_id;


$con = mysqli_connect('localhost','root','','CedCabDb');
    if($con){
            $query = "SELECT * FROM `tbl_user`,`tbl_ride` WHERE `tbl_user`.`user_id` = $customer_user_id AND `tbl_ride`.`ride_id` = $ride_id";

            $execute = mysqli_query($con,$query);
            if($execute){
                while($data = mysqli_fetch_assoc($execute)){
                    if($data['status'] == 1){
                        $status = "Pending";
                        $color = "text-danger";
                      }
                      if($data['status'] == 2){
                        $status = "Completed";
                        $color = "text-success";
                      }
                      if($data['status'] == 0){
                          $status = "Canceled";
                          $color = "text-danger";
                      }
                    echo "<table>
                    <tr><th>User Name : <td>".$data["name"]."</td></th></tr>
                    <tr><th>User Email : <td>".$data["user_email"]."</td></th></tr>
                    <tr><th>User Mobile : <td>".$data["mobile"]."</td></th></tr>
                    <tr><th>Ride Date : <td>".$data["ride_date"]."</td></th></tr>
                    <tr><th>Pick Location : <td>".$data["pickup_location"]."</td></th></tr>
                    <tr><th>Drop Location : <td>".$data["drop_location"]."</td></th></tr>
                    <tr><th>Cab Type : <td>".$data["cab_type"]."</td></th></tr>
                    <tr><th>Distance : <td>".$data["total_distance"]."</td></th></tr>
                    <tr><th>Luggage : <td>".$data["luggage"]."</td></th></tr>
                    <tr><th>Total Fare : <td>".$data["total_fare"]."</td></tr>
                    <tr><th>Status : <td class='$color'>$status</td></tr>
                    </table>";
                    // print_r($data);

            }
            }

            else{
                echo "Error : ",mysqli_error($con)."<br>";
            }
    }

    else{
        echo "Not Connected to the locationbase !",mysqli_connect_error($con);
    }



?>
