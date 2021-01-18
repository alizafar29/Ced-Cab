<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark mb-5">
          <div class="container-fluid">
            <a class="navbar-brand brand" href="#"><strong>Ced <em>Cab</em></strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                  <a class="nav-link active" aria-current="page" href="user_dashboard.php">Home</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link active" aria-current="page" href="index.php">Book A Ride</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Rides
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="rideRequest.php">Ride Requests</a>
                  <a class="dropdown-item" href="completedRide.php">Completed Rides</a>
                  <a class="dropdown-item" href="canceledRide.php">Canceled Rides</a>
                  <a class="dropdown-item" href="allRide.php">All Rides</a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Account
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="update_pass_form.php">Change Password</a>
                  <a class="dropdown-item" href="edit_profile.php">Update Profile</a>
              </li>

              </ul>
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
              <li class="nav-item active">
                  <a class="nav-link active" aria-current="page">Hi</a>
                </li>
                  <li class="nav-item active">
                      <p class="adminName  ml-2 mr-5 pt-2 text-light font-weight-bold"><?php echo $_COOKIE['user']; ?></p>
                </li>
                  <li class="nav-item active">
                  <a href="loginForm.php"><button type="button" class="btn btn-outline-info">Log Out</button></a>        </li>
            </ul>
            </div>
          </div>
        </nav>