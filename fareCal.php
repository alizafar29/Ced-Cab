<?php
    $pickup = $_POST['pickup'];
    $drop = $_POST['drop'];
    $cabType = $_POST['cabType'];
    $luggage = $_POST['luggage'];

class totalFareCalculation{
    public $pickup,$drop,$cabType,$luggage=0,$pickPoint,$dropPoint,$totalfare,$distance;

    // public $Location = [
    //     'Charbagh'=>0,
    //     'Indira_Nagar'=>10,
    //     'BBD'=>30,
    //     'Barabanki'=>60,
    //     'Faizabad'=>100,
    //     'Basti'=>150,
    //     'Gorakhpur'=>210,
    // ];
    // public $luggageArr = [
    //     '0-10'=>50,
    //     '11-20'=>100,
    //     '21-30'=>200,
    // ];

    function __construct($pickup,$drop,$cabType,$luggage){
        $this->pickup = $pickup;
        $this->drop = $drop;
        $this->cabType = $cabType;
        if($luggage !=''){
            $this->luggage = $luggage;
        }
    }

    function getDistance(){
        // echo $this->pickup,$this->drop;
        $con = mysqli_connect('localhost','root','','CedCabDb');
    if($con){
        // echo "Connected Successully !<br>";
        // $query = "INSERT INTO `tbl_user` VALUES('$email','$name','$number','$password')";

        // $query = "INSERT INTO `tbl_user` (`user_id`, `user_email`, `name`, `dateofsignup`, `mobile`, `isblock`, `password`, `is_admin`) VALUES (NULL, '$email', '$name', current_timestamp(), '$number', '0', '$password', '0')";
        $query = "SELECT `distance` FROM `tbl_location` WHERE `name` = '$this->pickup'";
        $query1 = "SELECT `distance` FROM `tbl_location` WHERE `name` = '$this->drop'";

        $execute = mysqli_query($con,$query);
        $execute1 = mysqli_query($con,$query1);
        // echo $execute,$execute1;
        if($execute){
            // echo "Data Fetch Successfully !";
            // header("Location: index.html");
            if($data = mysqli_fetch_assoc($execute)){
                $pickupDistance = $data["distance"];
            }
            if($data = mysqli_fetch_assoc($execute1)){
                $dropDistance = $data["distance"];
            }
            // echo "pkdfhvci",$data["distance"];
                $distance = abs($dropDistance - $pickupDistance);
                $this->distance = $distance;
                // echo "Total Distance : ",$distance;
                // echo $data["$this->pickpup"];           
            }
        else{
            echo "Error : ",mysqli_error($con)."<br>";
        }
    }
    else{
        echo "Not Connected to the Database !",mysqli_connect_error($con);
    }


}
    // function location(){
    //     // $this->distance = abs(($this->Location["$this->drop"])-($this->Location["$this->pickup"]));
    //         foreach($this->Location as $key => $value) {
    //             if($key == $this->pickup){
    //                 $this->pickPoint = $value;
    //             } 
    //         };
    //         foreach($this->Location as $key => $value) {
    //             if($key == $this->drop){
    //                 $this->dropPoint = $value;
    //             } 
    //         };
    //         $this->distance = abs(($this->pickPoint) - ($this->dropPoint));
    //     //    we use abs for neglecting negative sign.        
    //     }
        //function for calculation fare
        function fareCalculation(){
            //fare for Micro
            if($this->cabType == 'Ced Micro'){
                if($this->distance==10){
                    $this->totalfare=$this->distance*13.5+50;
                }
                else if($this->distance>10 && $this->distance<61){
                    $this->totalfare=10*13.5+($this->distance-10)*12+50;
                }
                else if($this->distance>60 && $this->distance<161){
                    $this->totalfare=10*13.5+50*12+($this->distance-60)*10.2+50;
                }
                else if($this->distance>100){
                    $this->totalfare=10*13.5+50*12+100*10.2+($this->distance-160)*8.5+50;
                }
            }
            //fare for Mini
            else if($this->cabType == 'Ced Mini'){
                    if($this->distance==10){
                        $this->totalfare=$this->distance*14.5+150;
                    }
                    else if($this->distance>10 && $this->distance<61){
                        $this->totalfare=10*14.5+($this->distance-10)*13+150;
                    }
                    else if($this->distance>60 && $this->distance<161){
                        $this->totalfare=10*14.5+50*13+($this->distance-60)*11.2+150;
                    }
                    else if($this->distance>160){
                        $this->totalfare=10*14.5+50*13+100*11.2+($this->distance-160)*9.5+150;
                    }
            }
            //fare for Royal
            else if($this->cabType == 'Ced Royal'){
                if($this->distance==10){
                    $this->totalfare=$this->distance*15.5+200;
                }
                else if($this->distance>10 && $this->distance<61){
                    $this->totalfare=10*15.5+($this->distance-10)*14+200;
                }
                else if($this->distance>60 && $this->distance<161){
                    $this->totalfare=10*15.5+50*14+($this->distance-60)*12.2+200;
                }
                else if($this->distance>160){
                    $this->totalfare=10*15.5+50*14+100*12.2+($this->distance-160)*10.5+200;
                }    
            }
            //fare for SUV
            else if($this->cabType == 'Ced SUV'){
                if($this->distance==10){
                    $this->totalfare=$this->distance*16.5+250;
                }
                else if($this->distance>10 && $this->distance<61){
                    $this->totalfare=10*16.5+($this->distance-10)*15+250;
                }
                else if($this->distance>60 && $this->distance<161){
                    $this->totalfare=10*16.5+50*15+($this->distance-60)*13.2+250;
                }
                else if($this->distance>160){
                    $this->totalfare=10*16.5+50*15+100*13.2+($this->distance-160)*11.5+250;
                }
            }
        }
        //Calculating and Adding luggage fare to the total fare.
        function luggage(){
            if($this->distance != 0 && $this->luggage < 11 && $this->luggage > 0){
                //luggage fare if cab type SUV and luggage 10kg.
                if($this->cabType=='Ced_SUV'){
                    $this->totalfare += 2*50;
                }
                //luggage fare for others cabs except Micro if luggage 10kg.
                else{
                    $this->totalfare += 50;
                }
            }
            else if($this->distance != 0 && $this->luggage > 10 && $this->luggage < 21){
                if($this->cabType=='Ced_SUV'){
                    $this->totalfare += 2*100;
                }
                else{
                    $this->totalfare += 100;
                }
            }
            if($this->distance != 0 && $this->luggage > 20){
                if($this->cabType=='Ced_SUV'){
                    $this->totalfare += 2*200;
                }
                else{
                    $this->totalfare += 200;
                };
            }
            setcookie('pickup',$this->pickup);
            setcookie('drop',$this->drop);
            setcookie('cab_type',$this->cabType);
            setcookie('distance',$this->distance);
            setcookie('luggage',$this->luggage);
            setcookie('total_fare',$this->totalfare);
        }
        function displayFare(){

            echo "<table><tr><th>Pick Up : </th><td>$this->pickup</td></tr>
            <tr><th>Drop : </th><td>$this->drop</td></tr>
            <tr><th>Cab Type : </th><td>$this->cabType</td></tr>
            <tr><th>Distance : </th><td>$this->distance KM</td></tr>
            <tr><th>Luggage : </th><td>$this->luggage KG</td></tr>
            <tr><th>Total Fare : </th><td> &#8377; $this->totalfare</td></tr>
       </table>";
    //    print_r($_COOKIE);
        }
}
    $obj = new totalFareCalculation($pickup,$drop,$cabType,$luggage);
    $obj->getDistance();
    $obj->fareCalculation();
    $obj->luggage();
    $obj->displayFare(); 
?>