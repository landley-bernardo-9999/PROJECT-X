@extends('layouts.app')
@section('content')
<div class="container text-center" >

        {{-- @can('isLeasingOfficer') --}}
        <div class="row">
            
           
            <div class="col-sm-4">
                <a href="/propertymgmt/rooms" class="btn btn-secondary"><i class="fas fa-store-alt fa-4x"></i></a>
                <p class="card-title">Rooms</p>
            </div>
       
            <div class="col-sm-4">
                <a href="/propertymgmt/residents" class="btn btn-secondary"><i class="fas fa-users fa-4x"></i></a>
                <p class="card-title">Residents</p>
            </div>
           
            <div class="col-sm-4">
                <a href="/propertymgmt/owners" class="btn btn-secondary"><i class="fas fa-user-tie fa-4x"></i></a>
                <p class="card-title">Owners</p>
            </div>
          
          
            
        </div> 
        {{-- @endcan --}}
        <br>
        {{-- @can('isAdminAssistant') --}}
        <div class="row">
            <div class="col-sm-4">
                <a href="/propertymgmt/repairs" class="btn btn-secondary"><i class="fas fa-toolbox fa-4x"></i></a>
                <p class="card-title">Repairs</p>
            </div>

            <div class="col-sm-4">
                    <a href="/propertymgmt/violations" class="btn btn-secondary"><i class="fas fa-user-times fa-4x"></i></a>
                    <p class="card-title">Violations</p>
                </div>       
        </div>
        {{-- @endcan --}}


        
</div>
@endsection