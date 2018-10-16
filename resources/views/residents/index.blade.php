@extends('layouts.app')
@section('content')
<br>
<div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-2 btn" style="border:solid black 1px; padding-bottom: 2%; padding-top: 2%; margin-left:4%">
                <h3>Active</h3>
                <h1>{{count($residents)}}</h1>
            </div>
            <div class="col-md-2 btn" style="border:solid black 1px; padding-bottom: 4%; padding-top: 2%; margin-left:2%">
                <h3>Harvard</h3>
                <h1>{{count($harvard)}}</h1>
            </div>
            <div class="col-md-2 btn" style="border:solid black 1px; padding-bottom: 4%; padding-top: 2%; margin-left:2%">
                <h3>Princeton</h3>
                <h1>{{count($princeton)}}</h1>
            </div>
            <div class="col-md-2 btn" style="border:solid black 1px; padding-bottom: 4%; padding-top: 2%; margin-left:2%">
                <h3>Wharton</h3>
                <h1>{{count($wharton)}}</h1>
            </div>
            <div class="col-md-2 btn" style="border:solid black 1px; padding-bottom: 4%; padding-top: 2%; margin-left:2%">
                <h3>Courtyard</h3>
                <h1>{{count($courtyard)}}</h1>
            </div>
        </div>
        <div class="row">
                <div class="col-12" style="padding: 2% 2%" >
                  <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="#" role="tab" aria-controls="v-pills-home" aria-selected="true">
                        <h3 style="color:black">Retention Rate</h3>
                    </a>
                        <div class="progress"  style="margin-left: 5%; border:style black;">
                            <div class="progress-bar" role="progressbar" style="width: 10%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">10%</div>
                        </div>    
                    </div>
                </div>
              </div>
    </div>
    <br>
    <div class="container" >
            <a class="btn btn-secondary btn-md" role="button" href="/propertymgmt"><i class="fas fa-arrow-circle-left"></i>&nbspBack</a>
            <a class="btn btn-secondary btn-md" role="button" href="/residents/create"><i class="fas fa-plus-circle fa-1x"></i>&nbspResident</a>
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
    @else
    <div class="alert alert-danger" role="alert"><p>No residents found!</p></div>
    @endif
            </div>
@endsection


