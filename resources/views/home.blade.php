@extends('layouts.app')

@section('content')
     @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="container text-center">
            <div class="row">
                <br><br><br>
            </div>
            <div class="row">
                    <!--Room management icon-->
                    <div class="col-sm-4">
                        <a href="propertymgmt" class="btn btn-secondary"><i class="fas fa-city fa-4x"></i></a>
                        <p class="card-title">Property Management </p>
                    </div>
                    <!--Financial Management icon-->
                    <div class="col-md-4">
                        <a href="/financialmgmt" class="btn btn-secondary"><i class="fas fa-hand-holding-usd fa-4x"></i></a>
                        <p class="card-title">Financial Management</p>
                    </div>
                    <!--Ancillary Service Management icon-->
                    <div class="col-md-4">
                        <a href="/ancillaryservicesmgmt" class="btn btn-secondary"><i class="fas fa-life-ring fa-4x"></i></a>
                        <p class="card-title">Ancillary Service Management</p>
                    </div>
                    
                </div>
                <div class="row">
                        <br><br>
                </div>
               
                <div class="row">
                    <!--Dorm Health Management icon-->
                    <div class="col-md-4">
                            <a href="/dormhealthmgmt" class="btn btn-secondary"><i class="fas fa-briefcase-medical fa-4x"></i></a>
                            <p class="card-title">Dorm Health Management</p>
                        </div>
                    <!--Inventory Management icon-->
                    <div class="col-md-4">
                        <a href="/inventorymgmt" class="btn btn-secondary"><i class="fas fa-truck fa-4x"></i></a>
                        <p class="card-title">Inventory Management</p>
                    </div>
                    <!--Reports and statistics icon-->
                    <div class="col-md-4">
                        <a href="/reportsandstats" class="btn btn-secondary"><i class="fas fa-chart-line fa-4x"></i></a>
                        <p class="card-title">Reports and Statistics</p></div>
                    </div>
                </div>
    </div>   

                    
            
  
@endsection

