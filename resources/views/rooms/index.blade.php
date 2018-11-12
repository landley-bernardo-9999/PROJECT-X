@extends('layouts.app')
@section('content')

    <a class="btn btn-dark" role="button" href="/propertymgmt" style="width:155px"><i class="fas fa-arrow-circle-left"></i>&nbspBACK</a>
    <a class="btn btn-warning float-right" role="button" href="/propertymgmt/rooms/create" style="width:155px" ><i class="fas fa-store-alt"></i>&nbspADD ROOM</a> 
    <a href="/search/rooms" name="s" value="{{ Request::query('s') }}" class="btn btn-dark" style="width:155px"><i class="fas fa-store-alt"></i>&nbspCLEAR SEARCH</a>
    <br>
    <br>

    <form action="/search/rooms" method="GET">
    <div class="input-group mb-3">
        <input type="text" class="form-control" aria-label="Text input with dropdown button" name="s" value="{{ Request::query('s') }}" placeholder="Search rooms">
    </div>
    </form>
  
    <div class="container-fluid text-center" >
        <h3>Rooms found: {{count($rooms)}} </h3>
    </div> 
    <br>
   
    <div class="container-fluid">
            @if(count($rooms) > 0)
        <div class="row justify-content-center">
            @foreach($rooms as $room)
                @if($room->roomStatus == 'Occupied')
                    @if($room->enrolled == "Yes")
                    <a href="/propertymgmt/rooms/{{$room->roomNo}}" class="btn btn-outline-danger" role="button">
                        <i class="fas fa-home fa-4x"></i>
                        <div style="display: flex; width: 90px; justify-content: space-around">
                            <p>{{$room->roomNo}}</p>
                        </div>
                    </a>
                    @else
                    <a href="/propertymgmt/rooms/{{$room->roomNo}}" class="btn btn-outline-danger" role="button">
                        <i class="fas fa-user-tag fa-4x"></i>
                        <div style="display: flex; width: 90px; justify-content: space-around"">
                            <p>{{$room->roomNo}}</p>
                        </div>
                    </a>
                    @endif
                @elseif($room->roomStatus == 'Vacant')
                    @if($room->enrolled == "Yes")
                    <a href="/propertymgmt/rooms/{{$room->roomNo}}" class="btn btn-outline-success" role="button">
                        <i class="fas fa-home fa-4x"></i>
                        <div style="display: flex; width: 90px; justify-content: space-around"">
                            <p>{{$room->roomNo}}</p>
                        </div>
                    </a>
                    @else
                    <a href="/propertymgmt/rooms/{{$room->roomNo}}" class="btn btn-outline-success" role="button">
                        <i class="fas fa-user-tag fa-4x"></i>
                        <div style="display: flex; width: 90px; justify-content: space-around"">
                            <p>{{$room->roomNo}}</p>
                        </div>
                    </a>
                    @endif
                @elseif($room->roomStatus == 'Reserved')
                    @if($room->enrolled == "Yes")
                    <a href="/propertymgmt/rooms/{{$room->roomNo}}" class="btn btn-outline-info" role="button">
                        <i class="fas fa-home fa-4x"></i>
                        <div style="display: flex; width: 90px; justify-content: space-around"">
                            <p>{{$room->roomNo}}</p>
                        </div>
                    </a>
                    @else
                    <a href="/propertymgmt/rooms/{{$room->roomNo}}" class="btn btn-outline-info" role="button">
                        <i class="fas fa-user-tag fa-4x"></i>
                        <div style="display: flex; width: 90px; justify-content: space-around"">
                            <p>{{$room->roomNo}}</p>
                        </div>
                    </a>
                    @endif
                @elseif($room->roomStatus == 'NRFO')
                    @if($room->enrolled == "Yes")
                    <a href="/propertymgmt/rooms/{{$room->roomNo}}" class="btn btn-outline-dark" role="button">
                        <i class="fas fa-home fa-4x"></i>
                        <div style="display: flex; width: 90px; justify-content: space-around"">
                            <p>{{$room->roomNo}}</p>
                        </div>
                    </a>
                    @else
                    <a href="/propertymgmt/rooms/{{$room->roomNo}}" class="btn btn-outline-dark" role="button">
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