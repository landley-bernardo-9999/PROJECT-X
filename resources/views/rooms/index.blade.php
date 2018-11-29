@extends('layouts.appsidebar')
@section('content')
    
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
                                {{Form::text('roomNo','',['class'=>'form-control'])}}
                            </div>
                        </div>
        
                        <div class="form-group row">
                            <label for="building" class="col-md-4 col-form-label text-md-right">Building:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-6">
                            <select class="form-control" name="building" id="building">
                                <option value="" disabled selected>Please select</option>     
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
                                    {{Form::number('shortTermRent','6800',['class'=>'form-control'],['min'>'0'])}}
                               </div>     
                        </div>
        
                        
                        <div class="form-group row">
                            <label for="longTermRent" class="col-md-4 col-form-label text-md-right">Long Term Rent:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-6">
                                {{Form::number('longTermRent','6000',['class'=>'form-control'],['min'>'0'])}}
                           </div>     
                        </div>
        
                        <div class="form-group row">
                                <label for="roomStatus" class="col-md-4 col-form-label text-md-right">Status:<span style="color:red">&nbsp*</span></label>
                                <div class="col-md-6">
                                <select class="form-control" name="roomStatus" id="roomStatus">
                                    <option value="" disabled selected>Please select</option>    
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
                                    {{Form::number('size','15',['class'=>'form-control', 'min'=> '0'])}}
                               </div>     
                        </div>
        
                        <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right">Capacity:<span style="color:red">&nbsp*</span></label>
                                <div class="col-md-6">
                                    {{Form::number('capacity','2',['class'=>'form-control', 'min' => '1'])}}
                               </div>     
                        </div>
        
                    {{-- <div class="form-group row mb-0">
                            <label for="" class="col-md-4 col-form-label text-md-right">Image:</label>
                            <div class="col-md-6">
                                {{Form::file('cover_image', ['class' => 'form-control'])}}
                            </div>
                    </div> --}}
                      
                    
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
        <a  class="btn btn-warning add-room float-left " role="button" href="#"><i class="fas fa-plus-circle"></i>&nbspADD NEW ROOM</a>
    
            <form action="/search/rooms" method="GET">
                <input type="text" class="form-control float-right" style="width:200px" aria-label="Text input with dropdown button" name="s" value="{{ Request::query('s') }}" placeholder="Search rooms">    
            </form> 
  
        <br><br>

        <a href="/search/rooms?s=" class="btn btn-outline-primary" role="button"> <i class="fas fa-home "></i>&nbspAll Rooms</a>

        <a href="/search/rooms?s=occupied" class="btn btn-outline-danger" role="button"> <i class="fas fa-home "></i>&nbspOccupied</a>

        <a href="/search/rooms?s=vacant" class="btn btn-outline-success" role="button"> <i class="fas fa-home "></i>&nbspVacant</a>
    
        <a href="/search/rooms?s=reserved" class="btn btn-outline-info" role="button"> <i class="fas fa-home "></i>&nbspReserved</a>
    
        <a href="/search/rooms?s=nrfo" class="btn btn-outline-dark" role="button"> <i class="fas fa-home "></i>&nbspNRFO</a>
    
        <a href="/search/rooms?s=harvard" class="btn btn-outline-primary" role="button"> <i class="fas fa-home "></i>&nbspHarvard</a>

        <a href="/search/rooms?s=princeton" class="btn btn-outline-primary" role="button"> <i class="fas fa-home "></i>&nbspPrinceton</a>

        <a href="/search/rooms?s=wharton" class="btn btn-outline-primary" role="button"> <i class="fas fa-home "></i>&nbspWharton</a>

        <a href="/search/rooms?s=2" class="btn btn-outline-primary" role="button"> <i class="fas fa-home "></i>&nbsp2 Beds</a>

        
    <br><br>
    <div class="card container-fluid">
        <div class="card-header">
            <h3 class="text-center">{{ Request::query('s') }} Rooms found: {{count($rooms)}} </h3>
        </div>
        <div class="row card-body">
            @foreach($rooms as $room)
            {{-- Generate red house if the room is OCCUPIED. --}}
                @if($room->roomStatus == 'Occupied')
                    
                    <a href="/propertymgmt/rooms/{{$room->roomNo}}" class="btn btn-outline-danger" role="button">
                        <i class="fas fa-home fa-3x"></i>
                        <div style="display: flex; width: 80px; justify-content: space-around">
                            <p>{{$room->roomNo}}</p>
                        </div>
                    </a>
            {{-- Generate green house if the room is VACANT.      --}}
                @elseif($room->roomStatus == 'Vacant')
                    
                    <a href="/propertymgmt/rooms/{{$room->roomNo}}" class="btn btn-outline-success" role="button">
                        <i class="fas fa-home fa-3x"></i>
                        <div style="display: flex; width: 80px; justify-content: space-around"">
                            <p>{{$room->roomNo}}</p>
                        </div>
                    </a>
            {{-- Generate blue house if the room is RESERVED. --}}
                @elseif($room->roomStatus == 'Reserved')
                    
                    <a href="/propertymgmt/rooms/{{$room->roomNo}}" class="btn btn-outline-info" role="button">
                        <i class="fas fa-home fa-3x"></i>
                        <div style="display: flex; width: 80px; justify-content: space-around"">
                            <p>{{$room->roomNo}}</p>
                        </div>
                    </a>
            {{-- Generate dark blak house if the room is NRFO.    --}}
                @elseif($room->roomStatus == 'NRFO')
                   
                    <a href="/propertymgmt/rooms/{{$room->roomNo}}" class="btn btn-outline-dark" role="button">
                        <i class="fas fa-home fa-3x"></i>
                        <div style="display: flex; width: 80px; justify-content: space-around"">
                            <p>{{$room->roomNo}}</p>
                        </div>
                    </a>
                     
                @endif
            @endforeach
        </div>
    </div>
    <br>
@endsection