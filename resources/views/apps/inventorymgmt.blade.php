@extends('layouts.app')
@section('content')
    <div class="container-fluid" style="margin-left: -11%; margin-right: -10%; margin-top: -3%;">
            <a class="btn btn-dark" role="button" href="/home" style="width:155px"><i class="fas fa-arrow-circle-left"></i>&nbspBACK</a>
            <br><br>
            <div class="row" >
                <br><br><br>
            <div class="col-md-3" style="width:99%; height: 450px; border:solid black 1px" >
                
                    <ul class="nav flex-column">
                            <li class="nav-item">
                              <a class="nav-link active" href="/inventory/items/show">Items</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#">Orders</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#">Suppliers</a>
                            </li>
                         
                    </ul>
               
            </div>
            <div class="col-md-9" style="width:150px; border:solid black">
             
               
            </div>
        </div>
    </div>
@endsection