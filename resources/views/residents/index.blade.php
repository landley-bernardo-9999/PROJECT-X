@extends('layouts.app')
@section('content')
<br>
    <div class="container" >
            <a class="btn btn-secondary btn-md" role="button" href="/propertymgmt"><i class="fas fa-arrow-circle-left"></i>&nbspBack</a>
            <a class="btn btn-secondary btn-md" role="button" href="/residents/create"><i class="fas fa-plus-circle fa-1x"></i>&nbspResident</a>
    </div>
    <br>
    @if(count($residents) > 0)
    <div class="container"  >
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Room No</th>
                    <th>Status</th>
                    <th>Mobile Number</th>
                    <th>Email Address</th>
                    <th>Move-in Date</th>
                    <th>Move-out Date</th>
                </tr>
                 @foreach($residents as $resident)
                <tr>
                    <td>{{$rowNum++}}</td>
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
            {{$residents->links()}}  
    @else
    <div class="alert alert-danger" role="alert"><p>No residents found!</p></div>
    @endif
            </div>
@endsection


