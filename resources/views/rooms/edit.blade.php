
@extends('layouts.app')
@section('content')
<a class="btn btn-secondary btn-md" role="button" href="/rooms"><i class="fas fa-arrow-circle-left"></i></a>   
{!! Form::open(['action'=>['RoomsController@update', $room->roomNo],'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card"style="padding:6%">
                    <div class="card-header">
                        <h3>Edit Room</h3>
                    </div>
                <br>
                <div class="form-group row">
                    <label for="roomNo" class="col-md-4 col-form-label text-md-right">Room No</label>
                    <div class="col-md-6">
                        {{Form::text('roomNo',$room->roomNo,['class'=>'form-control'])}}
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="building" class="col-md-4 col-form-label text-md-right">Building</label>
                    <div class="col-md-6">
                    <select class="form-control" name="building" id="building">
                        <option value="{{$room->building}}" selected>{{$room->building}}</option>    
                        <option value="Harvard">Harvard</option>
                        <option value="Princeton">Princeton</option>
                        <option value="Wharton">Wharton</option>
                        <option value="Courtyard">Courtyard</option>
                    </select>
                    </div>   
                </div>


                <div class="form-group row">
                    <label for="enrolled" class="col-md-4 col-form-label text-md-right">Enrolled</label>
                    <div class="col-md-6">
                    <select class="form-control" name="enrolled" id="enrolled">
                        <option value="{{$room->isUnderLeasing}}" selected>{{$room->isUnderLeasing}}</option>    
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                    </div>   
                </div>
        


                <div class="form-group row">
                    <label for="shortTermRent" class="col-md-4 col-form-label text-md-right">Short Term Rent</label>
                    <div class="col-md-6">
                        {{Form::number('shortTermRent',$room->shortTermRent,['class'=>'form-control'],['min'>'0'])}}
                   </div>     
            </div>

            
            <div class="form-group row">
                <label for="longTermRent" class="col-md-4 col-form-label text-md-right">Long Term Rent</label>
                <div class="col-md-6">
                    {{Form::number('longTermRent',$room->longTermRent,['class'=>'form-control'],['min'>'0'])}}
               </div>     
            </div>

                <div class="form-group row">
                        <label for="roomStatus" class="col-md-4 col-form-label text-md-right">Status</label>
                        <div class="col-md-6">
                        <select class="form-control" name="roomStatus" id="roomStatus">
                            <option value="{{$room->roomStatus}}" selected>{{$room->roomStatus}}</option>    
                            <option value="Occupied">Occupied</option>
                            <option value="Vacant">Vacant</option>
                            <option value="Reserved">Reserved</option>
                            <option value="NRFO">NRFO</option>
                        </select>
                        </div>   
                </div>

                <div class="form-group row">
                        <label for="size" class="col-md-4 col-form-label text-md-right">Size(sqm)</label>
                        <div class="col-md-6">
                            {{Form::number('size',$room->size,['class'=>'form-control'])}}
                       </div>     
                </div>

                <div class="form-group row">
                        <label for="capacity" class="col-md-4 col-form-label text-md-right">Capacity</label>
                        <div class="col-md-6">
                            {{Form::number('capacity',$room->capacity,['class'=>'form-control'])}}
                       </div>     
                </div>

            <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        {{Form::file('cover_image', ['class' => 'form-control'])}}
                    </div>
            </div>
            <br>
            
            <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                {{Form::hidden('_method','PUT')}}
                {{Form::submit('Submit',['class'=>'btn btn-secondary'])}}    
                {!! Form::close() !!} 
                    </div>
                </div>
        </div>   
                </div>
                </div>
            </div>
        </div>
    </div> 
    </div>
    <br>
@endsection