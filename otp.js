var email,otp = 0,mobile;
$(document).ready(function(){
    $("#otpSend").click(function(e){

        email = $("#email").val();
        mobile = $("#alert1").html();
        console.log(mobile);
        if($("#otp").val() != 0){
            otp = $("#otp").val();
        }
        // console.log(email);
        e.preventDefault();
        if(otp != 0){
            $.ajax({
                url: 'otp.php',
                type: 'POST',
                data: {otp:otp},
                success:function(data){
                    // console.log(data);
                    if(data == 1){
                        $("#alert").html("Email Verified !").css("color","green");;
                        // $("#alert")
                        $("#otpSend").addClass("hide");
                        $("#otp").addClass("hide");
                        if(mobile == "Mobile Number Verified !"){
                            $( "button[type='submit']" ).removeAttr("disabled");
                        }
                    }
                    else{
                        // $("#alert");
                        $("#alert").html("Wrong OTP !...Try Again !").css("color","red");
                    }
                }
            });
        }
        if(email == ""){
            // $("#alert");
            $("#alert").html("Please Enter a Email Address  !").css('color', 'red');
        }
        if(email != "" && otp == 0){
            $("#email").prop("readonly",true);
            $("#hide").removeClass("hide");
            $("#otpSend").html("Validate OTP");
            $("#alert").html("");

            $.ajax({
                url: 'otp.php',
                type: 'POST',
                data: {email:email,otp:otp},
                success:function(data){
                    // console.log(data);
                    $("#alert").css("color","green");
                    $("#alert").html("OTP Send Successfully !");
                    $("#otp").removeClass("hide");

                }
            });
        }
    });
    
});