var password,npassword = 0,conpassword;
$(document).ready(function(){
    $("#submit").click(function(){
        password = $("#cPass").val();

        if($("#nPass").val() != "" && $("#conPass").val() != ""){
            console.log("both same");
            npassword = $("#nPass").val();
            conpassword = $("#conPass").val();
        }
        // console.log(password,npassword,conpassword);

        if(npassword == 0){
            $.ajax({
                url:"update_pass.php",
                data:{password:password,npassword:npassword},
                success:function(data){
                    console.log(data);
                    if(data == 1){
                        $("#curpass").addClass("hide");
                        $(".alert").html("Password Matched !").css("color","Green");
                        $("#npass").removeClass("hide");
                        $("#conpass").removeClass("hide");
                        
                    }
                    if(data == 0){
                        $(".alert").html("You Have Enter Wrong Password !<br>Please Enter Right Password.").css("color","red");
    
                    }
                }
            })
        }
        if((npassword) != (conpassword)){
            $(".alert").html("New Password & Confirm Password Should Be Same !").css("color","red");

        }

        if((npassword) == (conpassword)){
            $.ajax({
                url:"update_pass.php",
                data:{password:password,npassword:npassword},
                success:function(data){
                    console.log("Php Send Data : ".data)
                    if(data == 2){
                        console.log(data);
                        $("#npass").addClass("hide");
                        $(".alert").html("Password Change Successfully !").css("color","Green");
                        $("#conpass").addClass("hide");
                        $("#submit").addClass("hide");
                        $("#gotoAdmin").removeClass("hide");
                        
                    }
                    if(data == 3){
                        $(".alert").html("You Have Enter Wrong Password !<br>Please Enter Right Password.").css("color","red");
    
                    }
                }
            })
        }
    });
});