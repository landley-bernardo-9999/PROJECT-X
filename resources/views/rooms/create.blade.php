
@extends('layouts.app')
@section('content')
<a class="btn btn-dark" role="button" href="/propertymgmt/rooms" style="width:155px"><i class="fas fa-arrow-circle-left"></i>&nbspBACK</a>   
{!! Form::open(['action'=>'RoomsController@store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card"style="padding:6%">
                    <div class="card-header">
                        <h3>Room Information</h3>
                    </div>
                <br>
                <div class="form-group row">
                    <label for="roomNo" class="col-md-4 col-form-label text-md-right">Room No</label>
                    <div class="col-md-6">
                        {{Form::text('roomNo','',['class'=>'form-control'])}}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="building" class="col-md-4 col-form-label text-md-right">Building</label>
                    <div class="col-md-6">
                    <select class="form-control" name="building" id="building">
                        <option value="" disabled selected>Please select</option>     
                        <option value="Harvard">Harvard</option>
                        <option value="Princeton" selected  >Princeton</option>
                        <option value="Wharton">Wharton</option>
                        <option value="Courtyard">Courtyard</option>
                    </select>
                    </div>   
                </div>


                <div class="form-group row">
                    <label for="isAccepted" class="col-md-4 col-form-label text-md-right">Accepted?</label>
                    <div class="col-md-6">
                    <select class="form-control" name="isAccepted" id="isAccepted">
                        <option value="" disabled selected>Please select</option>    
                        <option value="Yes" selected>Yes</option>
                        <option value="No">No</option>
                    </select>
                    </div>   
                </div>
                
                <div class="form-group row">
                    <label for="enrolled" class="col-md-4 col-form-label text-md-right">Enrolled</label>
                    <div class="col-md-6">
                    <select class="form-control" name="enrolled" id="enrolled">
                        <option value="" disabled selected>Please select</option>    
                        <option value="Yes" selected>Yes</option>
                        <option value="No">No</option>
                    </select>
                    </div>   
                </div>

               
                        

                <div class="form-group row">
                        <label for="shortTermRent" class="col-md-4 col-form-label text-md-right">Short Term Rent</label>
                        <div class="col-md-6">
                            {{Form::number('shortTermRent','8500',['class'=>'form-control'],['min'>'0'])}}
                       </div>     
                </div>

                
                <div class="form-group row">
                    <label for="longTermRent" class="col-md-4 col-form-label text-md-right">Long Term Rent</label>
                    <div class="col-md-6">
                        {{Form::number('longTermRent','7000',['class'=>'form-control'],['min'>'0'])}}
                   </div>     
                </div>

                <div class="form-group row">
                        <label for="roomStatus" class="col-md-4 col-form-label text-md-right">Status</label>
                        <div class="col-md-6">
                        <select class="form-control" name="roomStatus" id="roomStatus">
                            <option value="" disabled selected>Please select</option>    
                            <option value="Occupied" selected>Occupied</option>
                            <option value="Vacant">Vacant</option>
                            <option value="Reserved">Reserved</option>
                            <option value="NRFO">NRFO</option>
                        </select>
                        </div>   
                </div>

                <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label text-md-right">Size(sqm)</label>
                        <div class="col-md-6">
                            {{Form::number('size','15',['class'=>'form-control'])}}
                       </div>     
                </div>

                <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label text-md-right">Capacity</label>
                        <div class="col-md-6">
                            {{Form::number('capacity','2',['class'=>'form-control'])}}
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