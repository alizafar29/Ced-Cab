$(document).ready(function(){
    var pickup,drop,cabType;
    $("#submit").click(function(e){
      pickup=$('.pick').val();
      drop=$('.drop').val();
      cabType=$('.type').val();
      e.preventDefault();
        $.ajax({
          url: 'fareCal.php',
          type: 'POST',
          data: $('#checkFare').serialize(),
          success:function(data){
            // if(pickup == drop){
            //     $(".success").html("Pickup and Drop Location Can't Be Same !");
            //     $("#OK").removeClass('hide'); 
            //     $(".btnC").addClass('hide');
            //     $("#exampleModalLabel").html("Alert");      
              // }

            if((cabType == "Select CAB type") && (pickup == "Pickup Location") && (drop == "Drop Location")){
                $(".pickAlert").html("Please Choose a Pickup Point !");
                $(".dropAlert").html("Please Choose a Drop Point !");
                $(".cabAlert").html("Please Select a Cab Type !");
              }

              // if((cabType != "Select CAB type") && (pickup != "Pickup Location") && (drop != "Drop Location")){

              //   console.log("Hello")
              // }

             
            else if(pickup =="Pickup Location"){
                $(".pickAlert").html("Please Choose a Pickup Point !");
                // $(".dropAlert").html("");
                // $(".cabAlert").html("");
                // $("#OK").removeClass('hide'); 
                // $(".btnC").addClass('hide');
                // $("#exampleModalLabel").html("Alert"); 
            }
            else if(drop=="Drop Location"){
                $(".dropAlert").html("Please Choose a Drop Point !");
                // $(".pickAlert").html("");
                // $(".cabAlert").html("");
                // $("#OK").removeClass('hide'); 
                // $(".btnC").addClass('hide');
                // $("#exampleModalLabel").html("Alert"); 
            }
            else if(cabType=="Select CAB type"){
                $(".cabAlert").html("Please Select a Cab Type !");
                // $(".dropAlert").html("");
                // $(".pickAlert").html("");
                // $("#OK").removeClass('hide'); 
                // $(".btnC").addClass('hide');
                // $("#exampleModalLabel").html("Alert"); 
            }
            else{
            //   // $(".dropAlert").html("");
            //   // $(".pickAlert").html("");
            //   // $(".cabAlert").html("");
            // $(".btnC").removeClass('hide');
            // $("#OK").addClass('hide');
            // $("#exampleModalLabel").html("Ride Details : "); 
            $(".success").html(data);
            }
        }
      });
    });   
  });

  var pickVal,pickup,dropVal,drop,value1;

  function dis(){
    value1 = $(".type").val();
    if(value1 == "Ced Micro"){
        $(".luggage").val('');
        $(".luggage").attr("placeholder","Luggage Facility not Available !");
        $(".luggage").prop("readonly",true);

    }
    if(value1 != "Select CAB type"){
      $(".cabAlert").html("");
    }
    if(value1 != "Ced Micro"){
        $(".luggage").attr("placeholder","Enter Luggage in KG.");
        $(".luggage").prop("readonly",false);
    }
    // var val=$("#color").find(":selected").val();
    // $("#size option[value!="+val+"]").remove();
}
  
function hide1(){

  if(pickup != "Pickup Location"){
    $(".drop option[value="+pickVal+"]").show();
  }

    pickup = $(".pick").find(":selected").val();
    console.log(pickup)

    if(pickup != "Pickup Location"){
      $(".drop option[value="+pickup+"]").hide();
      pickVal = pickup;
    }

    if(pickup != "Pickup Location"){
      $(".pickAlert").html("");
  }
    // else{
  //   $(".pickAlert").html("");
  // }
}
function show1(){

    if(drop != "Drop Location"){
      $(".pick option[value="+dropVal+"]").show();
    }
    drop = $(".drop").find(":selected").val();
    console.log(drop)

    if(drop != "Drop Location"){
      $(".pick option[value="+drop+"]").hide();
      dropVal = drop;
    }

    if(drop != "Drop Location"){
      $(".dropAlert").html("");
  }


  // else{
  //   $(".dropAlert").html("");  
  // }
}

function active(){
  // console.log(value1,pickup,drop);
  if((value1 == "Select CAB type") || (pickup == "Pickup Location") || (drop == "Drop Location")){
    $("#submit").removeAttr("data-toggle","modal");
    $("#submit").removeAttr("data-target","#exampleModal");
    console.log("Hello")

  }
  if((value1 != "Select CAB type") && (pickup != "Pickup Location") && (drop != "Drop Location")){
    $("#submit").attr("data-toggle","modal");
    $("#submit").attr("data-target","#exampleModal");
  }
}