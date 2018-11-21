@extends('layouts.app')

@section('content')
     @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="card" style="width:70%; margin:auto; border-radius:3%">
        <div class="card-header">
            <h4>Dorm Management System</h4>
        </div>
        <br>
            <div class="row card-body text-center">
                    <div class="col-md-3">
                            <a href="propertymgmt" class="btn btn-secondary"><i class="fas fa-city fa-3x"></i></a>
                            <p class="card-title">Unit Management </p>
                        </div>
                     
                        <!--Financial Management icon-->
                        <div class="col-md-3">
                            <a href="/financialmgmt" class="btn btn-secondary"><i class="fas fa-hand-holding-usd fa-3x"></i></a>
                            <p class="card-title">Financial Management</p>
                        </div>
                        <!--Ancillary Service Management icon-->
                        <div class="col-md-3">
                            <a href="/ancillaryservicesmgmt" class="btn btn-secondary"><i class="fas fa-life-ring fa-3x"></i></a>
                            <p class="card-title" >Ancillary Service Management</p>
                        </div>
    
                        <div class="col-md-3">
                            <a href="/dormhealthmgmt" class="btn btn-secondary"><i class="fas fa-briefcase-medical fa-3x"></i></a>
                            <p class="card-title">Dorm Health Management</p>
                        </div>
                        
            </div>
       
            <div class="row card-body text-center" style=" margin-top: -1%">
                    <!--Inventory Management icon-->
                    <div class="col-md-3">
                            <a href="/inventorymgmt/items" class="btn btn-secondary"><i class="fas fa-truck fa-3x"></i></a>
                            <p class="card-title">Inventory Management</p>
                        </div>
    
                         <!--Personnel Management-->
                         <div class="col-md-3">
                            <a href="/propertymgmt/maintenances" class="btn btn-secondary"><i class="fas fa-wrench fa-3x"></i></a>
                            <p class="card-title">Personnel Management</p>
                        </div>
    
                        <div class="col-md-3">
                            <a href="/reportsandstats" class="btn btn-secondary"><i class="fas fa-chart-line fa-3x"></i></a>
                            <p class="card-title">Reports and Statistics</p>
                        </div>
                        
            </div>
                   
            
            <div class="card-footer text-muted">
                <p>Vester Applications © 2018 </p>
            </div>

              
    </div>  
@endsection

