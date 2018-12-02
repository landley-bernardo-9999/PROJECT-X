@extends('layouts.appsidebar')
@section('content')
@include('includes.messages')
    <div id="create-room" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="room-title float-left"> </h4>
                    <button class="close" type="button" data-dismiss="modal" >&times;</button>
                </div>
    
                    <div class="modal-body">
                        
                      {!! Form::open(['action'=>'RoomsController@store','method' => 'POST', 'enctype' => 'multipart/form-data', 'class'=>'room-form'] ) !!}
                        
                      <div class="form-group row">
                            <label for="roomNo" class="col-md-4 col-form-label text-md-right">Room No: <span style="color:red">&nbsp*</span></label>
                            <div class="col-md-6">
                                <input name="roomNo" id="roomNo" type="text" class="form-control" value="{{ old('roomNo') }}"></input>
                            </div>
                        </div>
        
                        <div class="form-group row">
                            <label for="building" class="col-md-4 col-form-label text-md-right">Building:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-6">
                            <select class="form-control" name="building" id="building">
                            <option value="{{ old('building') }}">{{ old('building') }}</option>     
                                <option value="Harvard">Harvard</option>
                                <option value="Princeton">Princeton</option>
                                <option value="Wharton">Wharton</option>
                                <option value="Courtyard">Courtyard</option>
                            </select>
                            </div>   
                        </div>
    
            
                        <div class="form-group row">
                                <label for="shortTermRent" class="col-md-4 col-form-label text-md-right">Short Term Rent:<span style="color:red">&nbsp*</span></label>
                                <div class="col-md-6">
                                    <input name="shortTermRent" id="shortTermRent" type="number" min="0" class="form-control" value="{{ old('shortTermRent') }}"></input>
                               </div>     
                        </div>
        
                        
                        <div class="form-group row">
                            <label for="longTermRent" class="col-md-4 col-form-label text-md-right">Long Term Rent:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-6">
                                <input name="longTermRent" id="longTermRent" type="number" min="0" class="form-control" value="{{ old('longTermRent') }}"></input>
                           </div>     
                        </div>
        
                        <div class="form-group row">
                                <label for="roomStatus" class="col-md-4 col-form-label text-md-right">Status:<span style="color:red">&nbsp*</span></label>
                                <div class="col-md-6">
                                <select class="form-control" name="roomStatus" id="roomStatus">
                                    <option value="{{ old('roomStatus') }}">{{ old('roomStatus') }}</option>      
                                    <option value="Occupied">Occupied</option>
                                    <option value="Vacant">Vacant</option>
                                    <option value="Reserved">Reserved</option>
                                    <option value="NRFO">NRFO</option>
                                </select>
                                </div>   
                        </div>
                            
                        <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right">Size(sqm):<span style="color:red">&nbsp*</span></label>
                                <div class="col-md-6">
                                    <input name="size" id="size" type="number" min="0" class="form-control" value="{{ old('size') }}"></input>
                               </div>     
                        </div>
        
                        <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right">Capacity:<span style="color:red">&nbsp*</span></label>
                                <div class="col-md-6">
                                    <input name="capacity" id="capacity" type="number" min="1" class="form-control" value="{{ old('capacity') }}"></input>
                               </div>     
                        </div>
        
                     <div class="form-group row mb-0">
                            <label for="" class="col-md-4 col-form-label text-md-right">Image:</label>
                            <div class="col-md-6">
                                {{Form::file('cover_image', ['class' => 'form-control'])}}
                            </div>
                    </div> 
                      
                    
                    <div class="modal-footer">
                            <div class="col-md-6 float-right">
                                <button class="btn btn-danger" data-dismiss="modal" type="button">CLOSE</button>              
                                    {{Form::submit('SUBMIT',['class'=>'btn btn-warning', 'float'=>'right'])}}
                                    {!! Form::close() !!}            
                            </div>
                        </div>
                </div>
                </div>
            </div>

    </div>
    
        {{-- <a  class="btn btn-dark float-left" role="button" href="/propertymgmt"><i class="fas fa-arrow-circle-left"></i>&nbspBACK</a> --}}
       

    <div class="container-fluid" style="width:112%; margin-left:-6%">
        <div class="card">
        <div class="card-header">
            <form action="/search/rooms" method="GET">
                <input type="text" class="form-control float-right" style="width:200px" aria-label="Text input with dropdown button" name="s" value="{{ Request::query('s') }}" placeholder="Search rooms">    
            </form> 
        </div>
        <div class="row card-body">
            @foreach($rooms as $room)
            {{-- Generate red house if the room is OCCUPIED. --}}
                @if($room->roomStatus == 'Occupied')
                    
                    <a href="/propertymgmt/rooms/{{$room->roomNo}}" class="btn btn-outline-danger" role="button">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-25%">
                            <p style="font-size: 11px">{{$room->roomNo}}</p>
                        </div>
                    </a>
                    &nbsp
                    
            {{-- Generate green house if the room is VACANT.      --}}
                @elseif($room->roomStatus == 'Vacant')
                    
                    <a href="/propertymgmt/rooms/{{$room->roomNo}}" class="btn btn-outline-success" role="button">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-25%">
                            <p style="font-size: 11px">{{$room->roomNo}}</p>
                        </div>
                    </a>
                    &nbsp
            {{-- Generate blue house if the room is RESERVED. --}}
                @elseif($room->roomStatus == 'Reserved')
                    
                    <a href="/propertymgmt/rooms/{{$room->roomNo}}" class="btn btn-outline-info" role="button">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around;  margin-bottom:-25%">
                            <p style="font-size: 11px">{{$room->roomNo}}</p>
                        </div>
                    </a>
                    &nbsp
            {{-- Generate dark blak house if the room is NRFO.    --}}
                @elseif($room->roomStatus == 'NRFO')
                   
                    <a href="/propertymgmt/rooms/{{$room->roomNo}}" class="btn btn-outline-dark" role="button">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around;  margin-bottom:-25%">
                            <p style="font-size: 11px">{{$room->roomNo}}</p>
                        </div>
                    </a>
                    &nbsp
                @endif
            @endforeach
        </div>
        <div class="card-footer">
            <h6 class="text-center">Rooms found: {{count($rooms)}} </h6>
        </div> 
    </div>
    </div>
@endsection

@section('filter')
<div class="container-fluid">
        <div class="card">
    <div class="row">
        

        
        <div class="col-md-12">
            <div class="card-header">
                Filter Rooms
            </div>
            
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="/search/rooms?s="style="width: 100px">Show All</a>
                </li>
                <li class="list-group-item">
                    <a href="/search/rooms?s=occupied" style="width: 100px" >Occupied</a> 
                </li>
                <li class="list-group-item">
                    <a href="/search/rooms?s=vacant" style="width: 100px">Vacant</a> 
                </li>
                <li class="list-group-item">
                    <a href="/search/rooms?s=reserved" style="width: 100px">Reserved</a>
                </li>
                <li class="list-group-item">
                    <a href="/search/rooms?s=nrfo" style="width: 100px">NRFO</a>
                </li>
               
                <li class="list-group-item">
                    <a href="/search/rooms?s=harvard" style="width: 100px"  >Harvard</a>
                </li>
                <li class="list-group-item">
                    <a href="/search/rooms?s=princeton"   style="width: 100px"  >Princeton</a>
                </li>
                <li class="list-group-item">
                    <a href="/search/rooms?s=wharton"  style="width: 100px" >Wharton</a>
                </li>
                <li class="list-group-item">
                    <a href="/search/rooms?s=courtyard"  style="width: 100px"  >Courtyard</a>
                </li>
            </ul>
        </div>
        
     
    </div>
    </div>
</div>


{{-- <a href="/search/rooms?s=2" class="btn btn-outline-primary" role="button"> <i class="fas fa-home "></i>&nbsp2 Beds</a> --}}
@endsection

@section('action')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Actions
                    </div>
                    <div class="card-body">
                        <a  class="btn btn-warning add-room float-left " role="button" href="#"><i class="fas fa-plus-circle"></i>&nbspADD ROOM</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Legends
                    </div>
                    <div class="card-body">
                            <a href="#" class="btn btn-outline-danger" role="button">
                                <i class="fas fa-home fa-1x"></i>
                            </a>
                            Occupied
                            <br><br>
                            <a href="#" class="btn btn-outline-success" role="button">
                                    <i class="fas fa-home fa-1x"></i>
                            </a>
                            Vacant
                            <br><br>
                            <a href="#" class="btn btn-outline-info" role="button">
                                    <i class="fas fa-home fa-1x"></i>
                            </a>
                            Reserved
                            <br><br>
                            <a href="#" class="btn btn-outline-dark" role="button">
                                    <i class="fas fa-home fa-1x"></i>
                            </a>
                            NRFO
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection