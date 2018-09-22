@extends('layouts.template')

@section('content')

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

@endsection()


       

 