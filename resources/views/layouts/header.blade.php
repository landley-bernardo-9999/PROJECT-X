
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
    
    <h5 class="welcome-name">Welcome, </h5> 
    
    </div>

       

 