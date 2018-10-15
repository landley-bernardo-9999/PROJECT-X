@extends('layouts.app')

@section('content')
<div class="container text-center" style="padding-top: 10%">
        <div class="row">
            
            <div class="col-md-3">
                <a href="/rooms" class="btn btn-secondary"><i class="fas fa-store-alt fa-4x"></i></a>
                <p class="card-title">Rooms</p>
            </div>
          
            <div class="col-md-3">
                <a href="/residents" class="btn btn-secondary"><i class="fas fa-users fa-4x"></i></a>
                <p class="card-title">Residents</p>
            </div>
         
            <div class="col-md-3">
                <a href="/owners" class="btn btn-secondary"><i class="fas fa-user-tie fa-4x"></i></a>
                <p class="card-title">Owners</p>
            </div>
          
            <div class="col-md-3">
                <a href="/repairs" class="btn btn-secondary"><i class="fas fa-toolbox fa-4x"></i></a>
                <p class="card-title">Repairs</p>
            </div>
        </div> 
        <br>
        <div class="row">
            <div class="col-md-3">
                <a href="/maintenances" class="btn btn-secondary"><i class="fas fa-wrench fa-4x"></i></a>
                <p class="card-title">Personnels</p>
            </div>
            
            <div class="col-md-3">
                    <a href="/moveins" class="btn btn-secondary"><i class="fas fa-hands-helping fa-4x"></i></a>
                    <p class="card-title">Moveins</p>
            </div>

            <div class="col-md-3">
                <a href="/moveouts" class="btn btn-secondary"><i class="fas fa-people-carry fa-4x"></i></a>
                <p class="card-title">Moveouts</p>
        </div>

            <div class="col-md-3">
                <a href="/billingandcollection" class="btn btn-secondary"><i class="fas fa-calculator fa-4x"></i></a>
                <p class="card-title">Billing and Collection</p>
        </div>
        </div>

            
</div>
@endsection