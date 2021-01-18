<!doctype html>
<html lang="en">
  <head>
    <title>Ced Cab Service</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  </head>
  <body>

  <?php
  // print_r($_COOKIE);
  if(($_COOKIE["user_id"] != " ") && ($_COOKIE["user"] != " ")){
    include "userHeader.php";
  }
  else{
    include "header.php";
  }

  ?>

<div class="main">
<div class="head text-light">
        <h1>Book a City Taxi to your destination in town</h1>
        <p>Choose from a range of categories and prices</p>
    </div>
    <div class="form">
        <p class="">CITY TAXI</p>
        <h4 style="border-top: 1px solid lightgray">Your everyday travel partner</h4>
            <h5 class="text-secondary">AC Cabs for point to point travel</h5>
        <form method="POST" id="checkFare">
            <div class="input-group">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">PICKUP</label>
                </div>
                <select name="pickup" class="custom-select pick" id="inputGroupSelect01" onchange="hide1();active();">
                  <option selected>Pickup Location</option>
                  <option value="Charbagh">Charbagh</option>
                  <option value="Indira_Nagar">Indira Nagar</option>
                  <option value="BBD">BBD</option>
                  <option value="Barabanki">Barabanki</option>
                  <option value="Faizabad">Faizabad</option>
                  <option value="Basti">Basti</option>
                  <option value="Gorakhpur">Gorakhpur</option>
                </select>
              </div>
              <h6 class="pickAlert mb-3"></h6>
              <div class="input-group">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">DROP</label>
                </div>
                <select name="drop" class="custom-select drop" id="inputGroupSelect01" onchange="show1();active();">
                  <option selected>Drop Location</option>
                  <option value="Charbagh">Charbagh</option>
                  <option value="Indira_Nagar">Indira Nagar</option>
                  <option value="BBD">BBD</option>
                  <option value="Barabanki">Barabanki</option>
                  <option value="Faizabad">Faizabad</option>
                  <option value="Basti">Basti</option>
                  <option value="Gorakhpur">Gorakhpur</option>
                </select>
              </div>
              <h6 class="dropAlert mb-3"></h6>
              <div class="input-group">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">CAB TYPE</label>
                </div>
                <select name="cabType" class="custom-select type"  onchange="dis();active();">
                  <option selected>Select CAB type</option>
                  <option value="Ced Micro">Ced Micro</option>
                  <option value="Ced Mini">Ced Mini</option>
                  <option value="Ced Royal">Ced Royal</option>
                  <option value="Ced SUV">Ced SUV</option>
                </select>
              </div>
              <h6 class="cabAlert mb-3"></h6>
              <div class="input-group mb-3" id="luggageDiv">
              <span class="input-group-text" id="basic-addon1">Luggage</span>
              <input type="number" min="0" max="999" step="0.01" onpaste="return false" onKeyPress="if(this.value.length==3) return false;" oninput="this.value = Math.abs(this.value)" name="luggage" class="form-control luggage" placeholder="Enter Luggage in KG" aria-label="Username" aria-describedby="basic-addon1">
            </div>

              <button name="fare" id="submit" class="modal1">Calculate Fare</button>
        </form>

    </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ride Details :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body success">
        ...
      </div>
      <div class="modal-footer">
       <!-- <button type="button" id="OK" class="btn btn-danger hide" data-bs-dismiss="modal">OK</button> -->
       <button type="button" class="btn btn-danger btnC" data-dismiss="modal">Cancel</button>
        <a href="insertRide.php"><button type="button" class="btn btn-success btnC">Book Ride !</button></a>
      </div>
    </div>
  </div>
</div>
</div>
    
<?php
  include "footer.php";
?>
<!-- Optional JavaScript -->
<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="cab.js"></script>

  </body>
</html>