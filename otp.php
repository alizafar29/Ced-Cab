<?php

    $receiveOtp = $_POST['otp'];
    // echo "Email",$receiveOtp;


    if($receiveOtp == 0){
    $emailId = $_POST['email'];
    $otp = rand(100000, 999999);

    require "class.phpmailer.php";
    // require "phpMailer/Exception.php";

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host="smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "alizafartech29@gmail.com";
    $mail->Password = "cvhnnlrmsmdswhqn";
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    
    $mail->setFrom("alizafartech29@gmail.com");
    // $mail->addAddress("tabreznoori@gmail.com");
    $mail->addAddress($emailId);
    // $mail->addReplyTo("");
    // $mail->addCc("");
    // $mail->addBcc("");

    $mail->isHTML(true);
    $mail->fromName="OPT Verification";
    $mail->Subject = "Email Confirmation";
    $mail->Body = "Your OTP $otp for Email Confirmation !";
    $mail->AltBody = "This is The AltBody Message !";
    setcookie('sendOtp',$otp);
        if($mail->send()){
            echo "Mail Have Been Sent Successfully !";
            echo "Cookie Stored OTP : ".$_COOKIE['sendOtp'];
        }
        else{
            echo "Sending Failed !";
        }
  
    } 
    if($receiveOtp != 0){
        if($receiveOtp == $_COOKIE['sendOtp']){
            echo 1;
        }
        else{
            echo 0;
            // echo $receiveOtp,"........",$_COOKIE['sendOtp'];
        }
        
        // echo $receiveOtp,"........",$_COOKIE['sendOtp'];
    }

?>