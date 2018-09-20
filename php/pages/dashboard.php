<?php
 session_start();

  /* if(isset($_SESSION['started']))
  {
    $_SESSION['started'] = time();
  }
  else if(time()- $_SESSION['started'] > 900)
  {
    session_regenerate_id(true);
    $_SESSION['started'] = time();
  }
  **/
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!--Custom CSS-->
    <link rel="stylesheet" href="../../custom-css/dashboard.css">

    <!--Font awesome links-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <title>Dashboard</title>
  </head>
  <body>


<div class="container-fluid" id="main"><!--Main container-->
  <div class="container-fluid"><!--Container for the nav bar-->

    <!--Navigation bar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="dashboard.php">Vester</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav mr-auto">
    <!--Notifications icon-->
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-bell fa-2x"></i></a>
      </li>
    <!--Messages icon-->
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-envelope fa-2x"></i></a>
      </li>
    <!--Profile icon-->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-circle fa-2x"></i>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Profile</a>
            <a class="dropdown-item" href="#">Settings</a>
          <div class="dropdown-divider"></div>
            <a class="dropdown-item" href=" ../logout.php">Log out</a>
          </div>
      </li>
    </ul>

    <!--Search button-->
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

  </div>
</nav><!--End of the navigation bar-->
  </div><!--End of the container for the nav bar-->

    <!--Display name of the user-->
    <div class="container-fluid">
    <h5 class="welcome-name">Welcome, <?php echo $_SESSION['firstName'];  ?> </h5>
    </div>

    <!--Dashboard content-->
  <div class="container-fluid" id="dashboard-content">

    <!--Upcoming events-->
    <div class="card text-center" id="upcoming-events ">
      <div class="card-header align-left"><i class="fas fa-calendar-check fa-2x"></i>&nbsp<h6>Upcoming events</h6 ></div>
        <div class="card-body">
          <div class="row">
              <div class="col-sm-4">
                  <h5>September 2018</h5>
              </div>
              <div class="col-sm-8">
                  <h5>September 2018</h5>
              </div>

          </div>
      </div>
      </div><!--End of the upcoming events-->

   
    <!--List of applications-->
    <div class="card text-center" id="applications">
      <div class="card-header align-left"><i class="far fa-window-maximize fa-2x"></i>&nbsp<h6>Applications</h6></div>
        <div class="card-body">

      <!--First row-->
      <div class="row">

        <!--Room management icon-->
        <div class="col-sm-3">
          <a href="#" class="btn btn-primary"><i class="fas fa-hotel fa-2x"></i></a>
            <p class="card-title">Room Management</p>
        </div>

        <!--Financial Management icon-->
        <div class="col-sm-3">
          <a href="#" class="btn btn-primary"><i class="fas fa-hand-holding-usd fa-2x"></i></a>
            <p class="card-title">Financial Management</p>
        </div>

        <!--Ancillary Service Management icon-->
        <div class="col-sm-3">
          <a href="#" class="btn btn-primary"><i class="fas fa-life-ring fa-2x"></i></a>
            <p class="card-title">Ancillary Service Management</p>
        </div>

        <!--Dorm Health Management icon-->
        <div class="col-sm-3">
          <a href="#" class="btn btn-primary"><i class="fas fa-briefcase-medical fa-2x"></i></a>
            <p class="card-title">Dorm Health Management</p>
        </div>

      </div><!--End of first row-->

        <!--Second row-->
        <div class="row">

        <!--Inventory Management icon-->
          <div class="col-sm-3">
            <a href="#" class="btn btn-primary"><i class="fas fa-truck fa-2x"></i></a>
              <p class="card-title">Inventory Management</p>
          </div>
        
        <!--Reports and statistics icon-->
          <div class="col-sm-3">
            <a href="#" class="btn btn-primary"><i class="fas fa-chart-line fa-2x"></i></a>
              <p class="card-title">Reports and Statistics</p></div>
           </div>

      </div><!--End of second row-->

  <div class="card-footer text-muted">
    <p>Applications</p>
  </div>
  </div><!--End of the applications-->
</div><!--End of the dashboard content-->

  <!--Footer-->
    <div class="container-fluid" id="footer">
        <div class="jumbotron bg-light"><h2 class="display-5">Vester Corporation &copy 2018</h2></div>
    </div>

</div><!--End of the main container-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>



       

 