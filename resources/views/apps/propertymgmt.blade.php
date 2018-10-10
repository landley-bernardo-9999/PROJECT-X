@extends('layouts.app')

@section('content')
<div class="container text-center" style="padding-top: 10%; margin-left:5%">
        <div class="row">
            <!--Room management icon-->
            <div class="col-sm-2">
                <a href="/rooms" class="btn btn-secondary"><i class="fas fa-store-alt fa-4x"></i></a>
                <p class="card-title">Rooms</p>
            </div>
            <!--Financial Management icon-->
            <div class="col-sm-2">
                <a href="/residents" class="btn btn-secondary"><i class="fas fa-users fa-4x"></i></a>
                <p class="card-title">Residents</p>
            </div>
            <!--Ancillary Service Management icon-->
            <div class="col-sm-2">
                <a href="/owners" class="btn btn-secondary"><i class="fas fa-user-tie fa-4x"></i></a>
                <p class="card-title">Owners</p>
            </div>
            <!--Dorm Health Management icon-->
            <div class="col-sm-2">
                <a href="/repairs" class="btn btn-secondary"><i class="fas fa-toolbox fa-4x"></i></a>
                <p class="card-title">Repairs</p>
            </div>
            <!--Dorm Health Management icon-->
            <div class="col-sm-2">
                    <a href="/inventorymgmt" class="btn btn-secondary"><i class="fas fa-truck fa-4x"></i></a>
                    <p class="card-title">Movein and Moveout</p>
                </div>
            </div> 
</div>
@endsection