@extends('layouts.app')
@section('content')
<br>
<div class="container" >
        <a class="btn btn-secondary btn-md" role="button" href="/propertymgmt"><i class="fas fa-arrow-circle-left"></i></a>
</div>
<br>
    @if(count($residents) > 0)
    <div class="container"  >
            <table class="table table-striped">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Room No</th>
                    <th>Status</th>
                    <th>Mobile Number</th>
                    <th>Email Address</th>
                    <th>Move-In</th>
                    <th>Move-Out</th>
                </tr>
                 @foreach($residents as $resident)
                    <tr>
                        <td>{{$rowNo++}}</td>
                        <td><a href="/residents/{{$resident->id}}">{{$resident->name}}</a></td>
                        <td><a href="/rooms/{{$resident->roomNo}}">{{$resident->roomNo}}</a></td>
                        <td>{{$resident->residentStatus}}</td>
                        <td>{{$resident->mobileNumber}}</td>
                        <td>{{$resident->emailAddress}}</td>
                        <td>{{$resident->moveInDate}}</td>
                        <td>{{$resident->moveOutDate}}</td>
                        
                    </tr>  
                @endforeach   
            </table> 
    @else
    <div class="alert alert-danger" role="alert"><p>No moveins this month!</p></div>
    @endif
            </div>
@endsection


