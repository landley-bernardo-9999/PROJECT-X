@extends('layouts.app')
@section('content')
<a class="btn btn-secondary btn-md" role="button" href="/maintenances"><i class="fas fa-arrow-circle-left"></i></a>   
{!! Form::open(['action'=>'MaintenancesController@store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card"style="padding:6%">
                    <div class="card-header">
                        <h3>Add Personnel</h3>
                    </div>
                <br>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                    <div class="col-md-6">
                        {{Form::text('name','',['class'=>'form-control'])}}
                    </div>
                </div>

                    
                    
                    <div class="form-group row">
                            <label for="birthDate" class="col-md-4 col-form-label text-md-right">Birthdate</label>
                            <div class="col-md-6">
                                {{ Form::date('birthDate',' ', ['class' => 'form-control']) }}
                            </div>
                    </div>

                    <div class="form-group row">
                            <label for="employmentStatus" class="col-md-4 col-form-label text-md-right">Status</label>
                            <div class="col-md-6">
                            <select class="form-control" name="employmentStatus" id="employmentStatus">
                                <option value="" disabled selected>Please select</option>    
                                <option value="Full-time">Full-time</option>
                                <option value="Part-time">Part-time</option>
                                <option value="On-call">On-call</option>    
                            </select>
                            </div>   
                    </div>

                    <div class="form-group row">
                            <label for="position" class="col-md-4 col-form-label text-md-right">Position</label>
                            <div class="col-md-6">
                            <select class="form-control" name="position" id="position">
                                <option value="" disabled selected>Please select</option>    
                                <option value="Maintenance">Maintenance</option>
                                <option value="Housekeeping">Housekeeping</option>
                                <option value="Admin Assistant">Admin Assistant</option>
                                <option value="Others">Others</option>    
                            </select>
                            </div>   
                    </div>

                    <div class="form-group row">
                            <label for="schedule" class="col-md-4 col-form-label text-md-right">Schedule</label>
                            <div class="col-md-6">
                                    {{Form::textarea('schedule','',['class'=>'form-control','placeholder'=>'Schedule (ex. 8-5 MTWTH)'])}}
                            </div>
                        </div> 

                    

                
                                <div class="form-group row">
                                        <label for="mobileNumber" class="col-md-4 col-form-label text-md-right">Mobile Number</label>
                                        <div class="col-md-6">
                                            {{Form::text('mobileNumber','',['class'=>'form-control'])}}
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
</div>

    <br>
@endsection