@extends('layouts.app')
@section('content')
<a class="btn btn-dark" role="button" href="/propertymgmt/maintenances" style="width:155px"><i class="fas fa-arrow-circle-left"></i>&nbspBACK</a>
{!! Form::open(['action'=>'ViolationsController@store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card"style="padding:6%">
                    
                            <h1 class="display-6">Add Violation</h1>
                 <hr>
                <br>

                <!--Date when the repair reported-->
                <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label text-md-right">Date Reported</label>
                        <div class="col-md-6">
                            {{ Form::date('dateReported',' ', ['class' => 'form-control']) }}
                        </div>
                    </div>


                      <!--Select Name of the resident or owner-->
                <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label text-md-right">Name of the Resident/Owner</label>
                    
                    <div class="col-md-6">
                        <select name="name" id="name" class="form-control">
                            <option value="" disabled selected>Please select</option>
                                @foreach($registeredResidentsAndOwners as $registeredResidentAndOwner)
                            <option value="{{$registeredResidentAndOwner->name}}">
                                {{$registeredResidentAndOwner->name}}
                            </option>
                                @endforeach
                        </select>
                    </div>
                    </div>
                <!--Select Room No of the resident or owner-->
                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">Room No</label>
                
                <div class="col-md-6">
                    <select name="roomNo" id="roomNo" class="form-control">
                        <option value="" disabled selected>Please select</option>
                            @foreach($registeredRooms as $registeredRoom)
                        <option value="{{$registeredRoom->roomNo}}">
                            {{$registeredRoom->roomNo}}
                        </option>
                            @endforeach
                    </select>
                </div>
                </div>


                <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                        <div class="col-md-6">
                            {{Form::text('description','',['class'=>'form-control'])}}
                        </div>
                    </div> 
              
                    <div class="form-group row">
                            <label for="details" class="col-md-4 col-form-label text-md-right">Details of the violation/s</label>
                            <div class="col-md-6">
                                    {{Form::textarea('details','',['class'=>'form-control'])}}
                            </div>
                        </div>
                    
                        <div class="form-group row">
                                <label for="dateCommitted" class="col-md-4 col-form-label text-md-right">Date Committed</label>
                                <div class="col-md-6">
                                    {{ Form::date('dateCommitted',' ', ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label for="reportedBy" class="col-md-4 col-form-label text-md-right">Reported By</label>
                                    <div class="col-md-6">
                                            {{Form::text('reportedBy','',['class'=>'form-control'])}}
                                    </div>
                                </div>
                                
                <div class="form-group row">
                    <label for="fine" class="col-md-4 col-form-label text-md-right">Fine</label>
                    <div class="col-md-6">
                        {{Form::number('fine','',['class'=>'form-control'])}}
                    </div>     
                </div> 
         
              <div class="form-group row">
                            <label for="actionTaken" class="col-md-4 col-form-label text-md-right">Action/s Taken</label>
                            <div class="col-md-6">
                                    {{Form::textarea('actionTaken','',['class'=>'form-control'])}}

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