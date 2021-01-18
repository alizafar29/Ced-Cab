var mobile = 0,receiveOtp = 0,email;
$(document).ready(function(){
    $("#mOtp").click(function(e){

        mobile = $("#mobile").val();
        email = $("#alert").html();
        console.log(email);
        if($("#mobileOtp").val() != 0){
            receiveOtp = $("#mobileOtp").val();
        }
        // console.log(mobile.length);
        if($("#mobile").val() == ""){
            $("#alert1").html("Please Enter a Mobile Number !").css("color","red");
        }
        if(($("#mobile").val() != "") && (mobile.length < 10)){
            $("#alert1").html("Please Enter a Valid Mobile Number !").css("color","red");
        }
        if(mobile != 0 && receiveOtp == 0 && mobile.length == 10){
            $("#hide1").removeClass("hide");
            $("#mobile").prop("readonly",true);
            console.log("Success !");
            $.ajax({
                url: 'mobileOtp.php',
                type: 'POST',
                data: {mobileNum:mobile,receiveOtp:receiveOtp},
                success:function(data){
                    // console.log(data);
                        $("#mobileOtp").removeClass("hide");
                        $("#alert1").html("OTP Send !").css("color","red");
                        $("#mOtp").html("Validate OTP");

                    if(data == 0){
                        $("#alert1").html("DND Activated on this Number !").css("color","red");
                    }
                    // $("#alert").css("color","green");
                    // $("#alert").html("OTP Send Successfully !");
                    // $("#otp").removeClass("hide");

                }
            });
        }
        if(mobile != 0 && receiveOtp != 0){
            // $("#hide").removeClass("hide");

            // console.log("Otp Received !");
            $.ajax({
                url: 'mobileOtp.php',
                type: 'POST',
                data: {mobileNum:mobile,receiveOtp:receiveOtp},
                success:function(data){
                    // console.log(data);
                    if(data == 1){
                        $("#hide1").addClass("hide");
                        $("#alert1").html("Mobile Number Verified !").css("color","green");
                        $("#mOtp").addClass("hide");

                        if(email == "Email Verified !"){
                            $( "button[type='submit']" ).removeAttr("disabled");
                        }
                    }
                    if(data == 0){
                        $("#alert1").html("Wrong Otp ! ... Try Again !").css("color","red");
                    }

                }
            });
        }
    })
})