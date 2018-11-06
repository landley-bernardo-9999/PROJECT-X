@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <a class="btn btn-dark" role="button" href="/propertymgmt" style="width:155px"><i class="fas fa-arrow-circle-left"></i>&nbspBACK</a>
    <a class="btn btn-warning float-right" role="button" href="/rooms/create" style="width:155px" ><i class="fas fa-store-alt"></i>&nbspADD ROOM</a> 
    <a href="/rooms" class="btn btn-dark" style="width:155px"><i class="fas fa-store-alt"></i>&nbspROOMS</a>
</div>
<br>
<div class="btn-group dropright">
        <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:155px">
          STATS
        </button>
        <div class="dropdown-menu">
                <div class="container-fluid" style="width:1000px">

                        <div class="row text-center justify-content-center">
                                <div class="col-md-3 btn" style="border:solid black 1px; padding-bottom: 2%; padding-top: 2%; margin-left:6%">
                                    <h5>Property Management</h5>
                                    <h1>{{count($pm)}}</h1>
                                    <i class="fas fa-user-tag"></i>
                                </div>
                                <div class="col-md-3 btn btn-outline-success" style="border:solid black 1px; padding-bottom: 4%; padding-top: 2%; margin-left:2%">
                                    <h5>Accepted</h5>
                                    <h1>{{count($unaccepted)}}</h1>
                                </div>
                                <div class="col-md-3 btn btn-outline-danger" style="border:solid black 1px; padding-bottom: 4%; padding-top: 2%; margin-left:2%">
                                    <h5>Unaccepted</h5>
                                    <h1>{{count($accepted)}}</h1>
                                </div>
                            </div>
                            <br>
                            
                    <div class="row text-center">
                        <div class="col-md-2 btn" style="border:solid black 1px; padding-bottom: 2%; padding-top: 2%; margin-left:6%">
                            <h5>Leasing</h5>
                            <h1>{{count($rooms)}}</h1>
                            <i class="fas fa-home fa-1x"></i>
                        </div>
                        <div class="col-md-2 btn btn-outline-danger" style="border:solid black 1px; padding-bottom: 4%; padding-top: 2%; margin-left:2%">
                            <h5>Occupied</h5>
                            <h1>{{count($occupied)}}</h1>
                        </div>
                        <div class="col-md-2 btn btn-outline-success" style="border:solid black 1px; padding-bottom: 4%; padding-top: 2%; margin-left:2%">
                            <h5>Vacant</h5>
                            <h1>{{count($vacant)}}</h1>
                        </div>
                        <div class="col-md-2 btn btn-outline-info" style="border:solid black 1px; padding-bottom: 4%; padding-top: 2%; margin-left:2%">
                            <h5>Reserved</h5>
                            <h1>{{count($reserved)}}</h1>
                        </div>
                        <div class="col-md-2 btn btn-outline-dark" style="border:solid black 1px; padding-bottom: 4%; padding-top: 2%; margin-left:2%">
                            <h5>NRFO</h5>
                            <h1>{{count($nrfo)}}</h1>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12" style="padding: 3% 2%" >
                          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="#" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                <h3 style="color:black">Occupancy Rate</h3>
                            </a>
                                <div class="progress" style="height: 30px">
                                    <div class="progress-bar" role="progressbar" style="width: {{ $occupancyRate }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ $occupancyRate }}%</div>
                                </div>    
                            </div>
                        </div>
                      </div>
                </div>    
        </div>
      </div>
    <br>
    <br>
    @if(count($rooms) > 0)
    <div class="container-fluid">
        <div class="row justify-content-center">
            @foreach($rooms as $room)
                @if($room->roomStatus == 'Occupied')
                    @if($room->enrolled == "Yes")
                    <a href="/rooms/{{$room->roomNo}}" class="btn btn-outline-danger" role="button">
                        <i class="fas fa-home fa-4x"></i>
                        <div style="display: flex; width: 90px; justify-content: space-around">
                            <p>{{$room->roomNo}}</p>
                        </div>
                    </a>
                    @else
                    <a href="/rooms/{{$room->roomNo}}" class="btn btn-outline-danger" role="button">
                        <i class="fas fa-user-tag fa-4x"></i>
                        <div style="display: flex; width: 90px; justify-content: space-around"">
                            <p>{{$room->roomNo}}</p>
                        </div>
                    </a>
                    @endif
                @elseif($room->roomStatus == 'Vacant')
                    @if($room->enrolled == "Yes")
                    <a href="/rooms/{{$room->roomNo}}" class="btn btn-outline-success" role="button">
                        <i class="fas fa-home fa-4x"></i>
                        <div style="display: flex; width: 90px; justify-content: space-around"">
                            <p>{{$room->roomNo}}</p>
                        </div>
                    </a>
                    @else
                    <a href="/rooms/{{$room->roomNo}}" class="btn btn-outline-success" role="button">
                        <i class="fas fa-user-tag fa-4x"></i>
                        <div style="display: flex; width: 90px; justify-content: space-around"">
                            <p>{{$room->roomNo}}</p>
                        </div>
                    </a>
                    @endif
                @elseif($room->roomStatus == 'Reserved')
                    @if($room->enrolled == "Yes")
                    <a href="/rooms/{{$room->roomNo}}" class="btn btn-outline-info" role="button">
                        <i class="fas fa-home fa-4x"></i>
                        <div style="display: flex; width: 90px; justify-content: space-around"">
                            <p>{{$room->roomNo}}</p>
                        </div>
                    </a>
                    @else
                    <a href="/rooms/{{$room->roomNo}}" class="btn btn-outline-info" role="button">
                        <i class="fas fa-user-tag fa-4x"></i>
                        <div style="display: flex; width: 90px; justify-content: space-around"">
                            <p>{{$room->roomNo}}</p>
                        </div>
                    </a>
                    @endif
                @elseif($room->roomStatus == 'NRFO')
                    @if($room->enrolled == "Yes")
                    <a href="/rooms/{{$room->roomNo}}" class="btn btn-outline-dark" role="button">
                        <i class="fas fa-home fa-4x"></i>
                        <div style="display: flex; width: 90px; justify-content: space-around"">
                            <p>{{$room->roomNo}}</p>
                        </div>
                    </a>
                    @else
                    <a href="/rooms/{{$room->roomNo}}" class="btn btn-outline-dark" role="button">
                        <i class="fas fa-user-tag fa-4x"></i>
                        <div style="display: flex; width: 90px; justify-content: space-around"">
                            <p>{{$room->roomNo}}</p>
                        </div>
                    </a>
                    @endif             
                @endif
            @endforeach
        </div>
    @else
    <div class="alert alert-danger" role="alert"><p>No rooms found!</p></div>
    @endif
    </div>
    <br>
@endsection