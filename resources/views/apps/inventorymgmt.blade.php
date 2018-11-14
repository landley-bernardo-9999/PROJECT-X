@extends('layouts.app')
@section('content')
<div class="container text-center" >

        {{-- @can('isLeasingOfficer') --}}
        <div class="row">
            <div class="col-sm-4">
                <a href="/inventorymgmt/items" class="btn btn-secondary"><i class="fas fa-paint-brush fa-4x"></i></a>
                <p class="card-title">Supplies</p>
            </div>
       
            <div class="col-sm-4">
                <a href="/propertymgmt/residents" class="btn btn-secondary"><i class="fas fa-clipboard-list fa-4x"></i></a>
                <p class="card-title">Orders</p>
            </div>
           
            <div class="col-sm-4">
                <a href="/propertymgmt/owners" class="btn btn-secondary"><i class="far fa-handshake fa-4x"></i></a>
                <p class="card-title">Suppliers</p>
            </div>
        </div>
</div>
@endsection