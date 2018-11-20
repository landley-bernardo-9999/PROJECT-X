@extends('layouts.app')
@section('content')

    <a class="btn btn-dark" role="button" href="/propertymgmt"><i class="fas fa-arrow-circle-left"></i>&nbspBACK</a>
    <a class="btn btn-warning float-right add-room" role="button" href="#" ><i class="fas fa-store-alt"></i>&nbspADD</a> 

    
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
                            <label for="isAccepted" class="col-md-4 col-form-label text-md-right">Accepted?:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-6">
                            <select class="form-control" name="isAccepted" id="isAccepted">
                                <option value="" disabled selected>Please select</option>    
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            </div>   
                        </div>
                        
                        <div class="form-group row">
                            <label for="enrolled" class="col-md-4 col-form-label text-md-right">Enrolled?:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-6">
                            <select class="form-control" name="enrolled" id="enrolled">
                                <option value="" disabled selected>Please select</option>    
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            </div>   
                        </div>
        
                       
                                
        
                        <div class="form-group row">
                                <label for="shortTermRent" class="col-md-4 col-form-label text-md-right">Short Term Rent:<span style="color:red">&nbsp*</span></label>
                                <div class="col-md-6">
                                    {{Form::number('shortTermRent','',['class'=>'form-control'],['min'>'0'])}}
                               </div>     
                        </div>
        
                        
                        <div class="form-group row">
                            <label for="longTermRent" class="col-md-4 col-form-label text-md-right">Long Term Rent:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-6">
                                {{Form::number('longTermRent','',['class'=>'form-control'],['min'>'0'])}}
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
                                    {{Form::number('size','',['class'=>'form-control'])}}
                               </div>     
                        </div>
        
                        <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right">Capacity:<span style="color:red">&nbsp*</span></label>
                                <div class="col-md-6">
                                    {{Form::number('capacity','',['class'=>'form-control'])}}
                               </div>     
                        </div>
        
                    <div class="form-group row mb-0">
                            <label for="" class="col-md-4 col-form-label text-md-right">Image:</label>
                            <div class="col-md-6 offset-md-4">
                                {{Form::file('cover_image', ['class' => 'form-control'])}}
                            </div>
                    </div>
                      
                    <br>
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