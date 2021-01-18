<?php

$receiveOtp = 0;
$receiveOtp = $_POST['receiveOtp'];

if($receiveOtp == 0){
  $mobileNum = $_POST['mobileNum'];

$otp = mt_rand(100000,999999);


$fields = array(
    "sender_id" => "FSTSMS",
    "message" => "Your OTP is : $otp",
    "language" => "english",
    "route" => "p",
    // "numbers" => "7275391080",
    "numbers" => "$mobileNum",
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($fields),
  CURLOPT_HTTPHEADER => array(
    "authorization: pHLzObuAZRxrPEhF8nBNjMUY06y2DQmqg3S7kCeKocJXfivITlATzK7CEbnGHa2QveRZIFxqD3LYuXts",
    "accept: */*",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  setcookie('sendOtp',"$otp");
  // echo $response;
  // echo $response["message"];
  echo 1;
}
}
else{
  if($_COOKIE['sendOtp'] == $receiveOtp){
    echo 1;
  }
  else{
    echo 0;
  }
}

?>