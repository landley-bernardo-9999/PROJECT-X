@extends('layouts.app')
@section('content')
<br>
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-2 btn" style="border:solid black 1px; padding-bottom: 2%; padding-top: 2%; margin-left:6%">
                <h3>Enrolled</h3>
                <h1>{{count($rooms)}}</h1>
                <i class="fas fa-home fa-1x"></i>
            </div>
            <div class="col-md-2 btn btn-outline-danger" style="border:solid black 1px; padding-bottom: 4%; padding-top: 2%; margin-left:2%">
                <h3>Occupied</h3>
                <h1>{{count($occupied)}}</h1>
            </div>
            <div class="col-md-2 btn btn-outline-success" style="border:solid black 1px; padding-bottom: 4%; padding-top: 2%; margin-left:2%">
                <h3>Vacant</h3>
                <h1>{{count($vacant)}}</h1>
            </div>
            <div class="col-md-2 btn btn-outline-info" style="border:solid black 1px; padding-bottom: 4%; padding-top: 2%; margin-left:2%">
                <h3>Reserved</h3>
                <h1>{{count($reserved)}}</h1>
            </div>
            <div class="col-md-2 btn btn-outline-dark" style="border:solid black 1px; padding-bottom: 4%; padding-top: 2%; margin-left:2%">
                <h3>NRFO</h3>
                <h1>{{count($nrfo)}}</h1>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12" style="padding: 2% 2%" >
              <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="#" role="tab" aria-controls="v-pills-home" aria-selected="true">
                    <h3 style="color:black">Occupancy Rate</h3>
                </a>
                    <div class="progress"  style="margin-left: 5%; border:style black;">
                        <div class="progress-bar" role="progressbar" style="width: {{ $occupancyRate }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ $occupancyRate }}%</div>
                    </div>    
                </div>
            </div>
          </div>
    </div>
    <br>
    <div class="container" >
        <a class="btn btn-secondary btn-md" role="button" href="/propertymgmt"><i class="fas fa-arrow-circle-left"></i>&nbspBack</a>
        <a class="btn btn-secondary btn-md" role="button" href="/rooms/create"><i class="fas fa-plus-circle fa-1x"></i>&nbspRoom</a> 
    </div>
   <br>
    @if(count($rooms) > 0)
    <div class="container text-center">
        <div class="row">
            @foreach($rooms as $room)
                @if($room->roomStatus == 'Occupied')
                    @if($room->isUnderLeasing == "Yes")
                    <a href="/rooms/{{$room->roomNo}}" class="btn btn-outline-danger" role="button">
                        <i class="fas fa-home fa-4x"></i>
                        <div style="display: flex; width: 90px">
                            <p>{{$room->roomNo}}</p>
                        </div>
                    </a>
                    @else
                    <a href="/rooms/{{$room->roomNo}}" class="btn btn-outline-danger" role="button">
                        <i class="fas fa-user-tag fa-4x"></i>
                        <div style="display: flex; width: 90px">
                            <p>{{$room->roomNo}}</p>
                        </div>
                    </a>
                    @endif
                @elseif($room->roomStatus == 'Vacant')
                    @if($room->isUnderLeasing == "Yes")
                    <a href="/rooms/{{$room->roomNo}}" class="btn btn-outline-success" role="button">
                        <i class="fas fa-home fa-4x"></i>
                        <div style="display: flex; width: 90px">
                            <p>{{$room->roomNo}}</p>
                        </div>
                    </a>
                    @else
                    <a href="/rooms/{{$room->roomNo}}" class="btn btn-outline-success" role="button">
                        <i class="fas fa-user-tag fa-4x"></i>
                        <div style="display: flex; width: 90px">
                            <p>{{$room->roomNo}}</p>
                        </div>
                    </a>
                    @endif
                @elseif($room->roomStatus == 'Reserved')
                    @if($room->isUnderLeasing == "Yes")
                    <a href="/rooms/{{$room->roomNo}}" class="btn btn-outline-info" role="button">
                        <i class="fas fa-home fa-4x"></i>
                        <div style="display: flex; width: 90px">
                            <p>{{$room->roomNo}}</p>
                        </div>
                    </a>
                    @else
                    <a href="/rooms/{{$room->roomNo}}" class="btn btn-outline-info" role="button">
                        <i class="fas fa-user-tag fa-4x"></i>
                        <div style="display: flex; width: 90px">
                            <p>{{$room->roomNo}}</p>
                        </div>
                    </a>
                    @endif
                @elseif($room->roomStatus == 'NRFO')
                    @if($room->isUnderLeasing == "Yes")
                    <a href="/rooms/{{$room->roomNo}}" class="btn btn-outline-dark" role="button">
                        <i class="fas fa-home fa-4x"></i>
                        <div style="display: flex; width: 90px">
                            <p>{{$room->roomNo}}</p>
                        </div>
                    </a>
                    @else
                    <a href="/rooms/{{$room->roomNo}}" class="btn btn-outline-dark" role="button">
                        <i class="fas fa-user-tag fa-4x"></i>
                        <div style="display: flex; width: 90px">
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
@endsection