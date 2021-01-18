var name1,mobile,password;
$(document).ready(function(){
    $("#submit").click(function(){
        name1 = $("#name").val();
        mobile = $("#mobile").val();
        password = $("#password").val();
        console.log(name1,mobile,password);

        $.ajax({
            url: "update_profile.php",
            method: "POST",
            data: {name:name1,mobile:mobile,password:password},
            success:function(data){
                console.log(data);
                if(data == 1){
                    // window.location.replace("admin_dashboard.php");
                    $("#alert").html("Profile Updated Successfully !").css("color","white");
                    $("form").addClass("hide");
                    $("#submit").addClass("hide");
                    $("#gotoAdmin").removeClass("hide");
                    
                }
                if(data == 2){
                    $("#alert1").html("Password Incorrect...Try Again !").css("color","red");
                }
            }
        })
    })
})