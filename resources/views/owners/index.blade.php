@extends('layouts.app')
@section('content')
<br>
    <div class="container" >
            <a class="btn btn-secondary btn-md" role="button" href="/propertymgmt"><i class="fas fa-arrow-circle-left"></i>&nbspBack</a>
            <a class="btn btn-secondary btn-md" role="button" href="/owners/create"><i class="fas fa-plus-circle fa-1x"></i>&nbspOwner</a>
    </div>
   <br>
    @if(count($owners) > 0)
    <div class="container"  >
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Room No</th>
                    <th>Mobile Number</th>
                    <th>Email Address</th>
                    <th>Date Owned</th>
                </tr>
                 @foreach($owners as $owner)
                <tr>
                    <td><a href="/owners/{{$owner->id}}">{{$owner->name}}</a></td>
                    <td><a href="/rooms/{{$owner->roomNo}}">{{$owner->roomNo}}</a></td>
                    <td>{{$owner->mobileNumber}}</td>
                    <td>{{$owner->emailAddress}}</td>
                    <td>{{$owner->created_at}}</td>
                   
                </tr>  
        @endforeach   
            </table> 
        
    @else
    <div class="alert alert-danger" role="alert"><p>No Owners found!</p></div>
    @endif
            </div>
@endsection


