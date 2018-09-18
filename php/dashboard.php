<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!--Custom CSS-->
    <link rel="stylesheet" href="../custom-css/dashboard.css">

    <!--Font awesome links-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <title>Dashboard</title>
  </head>
  <body>


<div class="container-fluid" id="main"><!--Main container-->
  <div class="container-fluid"><!--Container for the nav bar-->

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Vester</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-bell fa-2x"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-envelope fa-2x"></i></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-circle fa-2x"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Profile</a>
          <a class="dropdown-item" href="#">Settings</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Log out</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
  </div><!--End of the container for the nav bar-->

<?php
    include '../php/config.php';
?>
    <div class="container-fluid">
    <h5 class="welcome-name">Welcome, <?php $userName ?></h5>
    </div>



  

  <div class="container-fluid" id="dashboard-content"><!--Start of the dashboard content-->

    <div class="card" style="max-width: 18rem;" id="upcoming-events"><!--Start of the upcoming events-->
        <div class="card-header align-left"><i class="fas fa-calendar-check fa-2x"></i> &nbsp<h5 >Upcoming Events</h5></div>
        <div class="card-body"><h5 class="card-title">September 2018</h5><p class="card-text">
          1 - Vision Mission Value
        </div>
    </div><!--End of the upcoming events-->
  

      <div class="card text-center" id="applications"><!--Start of the applications-->
  <div class="card-header align-left"><i class="far fa-window-maximize fa-2x"></i>&nbsp<h5>Applications</h5></div>
  <div class="card-body">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3"><a href="#" class="btn btn-primary"><i class="fas fa-hotel fa-2x"></i></a>
    <p class="card-title">Room Management</p></div>
    <div class="col-sm-3"><a href="#" class="btn btn-primary"><i class="fas fa-hand-holding-usd fa-2x"></i></a>
    <p class="card-title">Financial Management</p></div>
    <div class="col-sm-3"><a href="#" class="btn btn-primary"><i class="fas fa-life-ring fa-2x"></i></a>
    <p class="card-title">Ancillary Service Management</p></div>
    <div class="col-sm-3"><a href="#" class="btn btn-primary"><i class="fas fa-briefcase-medical fa-2x"></i></a>
    <p class="card-title">Dorm Health Management</p></div>
      </div>

      <div class="row">
      <div class="col-sm-3"><a href="#" class="btn btn-primary"><i class="fas fa-truck fa-2x"></i></a>
    <p class="card-title">Inventory Management</p></div>
    <div class="col-sm-3"><a href="#" class="btn btn-primary"><i class="fas fa-chart-line fa-2x"></i></a>
    <p class="card-title">Reports and Statistics</p></div>
      </div>

    </div>
  </div>
  <div class="card-footer text-muted">
    Applications
  </div>
</div>
  </div><!--End of the applications-->

<div class="container-fluid" id="footer">
 <div class="jumbotron bg-light" >
    <h2 class="display-5">Vester Corporation &copy 2018</h2>
</div>
</div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>



       

 