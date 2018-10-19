@extends('layouts.app')
@section('content')
<br>
<div class="container" >
        <a class="btn btn-secondary btn-md" role="button" href="/propertymgmt"><i class="fas fa-arrow-circle-left"></i></a>
        <a href="/moveouts" class="btn btn-secondary"><i class="fas fa-people-carry"></i>&nbspMoveouts</a>
</div>
<br>
    @if(count($residents) > 0)
    <div class="container"  >
            <table class="table table-striped">
                <tr>
                    <th>No</th>
                    <th>Profile</th>
                    <th>Name</th>
                    <th>Room</th>
                    <th>Mobile</th>
                    <th>Email </th>
                    <th>Move-Out</th>
                    <th>Reason</th>
                    <th>Security Deposit</th>
                </tr>
                 @foreach($residents as $resident)
                    <tr>
                        <td>{{$rowNo++}}</td>
                        <td><img class="card-img-top" style="width:35px" src="/storage/resident_images/{{$resident->cover_image}}" alt="Card image cap"></td>
                        <td><a href="/residents/{{$resident->id}}">{{$resident->name}}</a></td>
                        <td><a href="/rooms/{{$resident->roomNo}}">{{$resident->roomNo}}</a></td>
                        <td>{{$resident->mobileNumber}}</td>
                        <td>{{$resident->emailAddress}}</td>
                        <td>{{$resident->moveOutDate}}</td>
                        <td>{{$resident->reasonForMovingOut}}</td>
                        <td>{{$resident->securityDeposit}}</td>
                        
                    </tr>  
                @endforeach   
            </table> 
    @else
    <div class="alert alert-danger" role="alert"><p>No Moveouts found!</p></div>
    @endif
            </div>
@endsection


