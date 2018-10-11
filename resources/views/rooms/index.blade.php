@extends('layouts.app')
@section('content')
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
                    <a href="/rooms/{{$room->roomNo}}" class="btn btn-outline-danger" role="button">
                        <i class="fas fa-home fa-5x"></i>
                        <div style="display: flex">
                            <h5>{{$room->roomNo}}</h5>
                        </div>
                    </a>
                @elseif($room->roomStatus == 'Vacant')
                    <a href="/rooms/{{$room->roomNo}}" class="btn btn-outline-success" role="button">
                        <i class="fas fa-home fa-5x"></i>
                        <div style="display: flex">
                            <h5>{{$room->roomNo}}</h5>
                        </div>
                    </a>
                @elseif($room->roomStatus == 'Reserved')
                <a href="/rooms/{{$room->roomNo}}" class="btn btn-md btn-outline-info" role="button">
                    <i class="fas fa-home fa-5x"></i>
                    <div style="display: flex">
                        <h5>{{$room->roomNo}}</h5>
                    </div>
                </a>
                @elseif($room->roomStatus == 'NRFO')
                <a href="/rooms/{{$room->roomNo}}" class="btn btn-outline-dark" role="button">
                    <i class="fas fa-home fa-5x"></i>
                    <div style="display: flex">
                        <h5>{{$room->roomNo}}</h5>
                    </div>
                </a>                  
                @endif
            @endforeach
        </div>
    @else
    <div class="alert alert-danger" role="alert"><p>No rooms found!</p></div>
    @endif
    </div>
@endsection