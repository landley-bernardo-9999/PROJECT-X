@extends('layouts.app')
@section('content')
<a class="btn btn-dark" role="button" href="/propertymgmt/residents" style="width:155px"><i class="fas fa-arrow-circle-left"></i>&nbspBACK</a> 
{!! Form::open(['action'=>'ResidentsController@store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card"style="padding:6%">
                    <div class="card-header">
                        <h3>Resident Information</h3>
                    </div>
                <br>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                    <div class="col-md-6">
                        {{Form::text('name','',['class'=>'form-control'])}}
                    </div>
                </div>
                    
                    <div class="form-group row">
                            <label for="birthDate" class="col-md-4 col-form-label text-md-right">birthDate</label>
                            <div class="col-md-6">
                                {{ Form::date('birthDate',' ', ['class' => 'form-control']) }}
                            </div>
                    </div>

                    <div class="form-group row">
                            <label for="residentStatus" class="col-md-4 col-form-label text-md-right">Status</label>
                            <div class="col-md-6">
                            <select class="form-control" name="residentStatus" id="residentStatus">
                                <option value="" disabled selected>Please select</option>    
                                <option value="Pending">Pending</option>
                                <option value="Moving-in">Moving-in</option>
                                <option value="Active">Active</option>
                                <option value="Pre-terminated">Pre-terminated</option>
                                <option value="Extended">Extended</option>
                                <option value="Moving-out">Moving-out</option>
                                <option value="Inactive">Inactive</option>
                                <option value="Evicted">Evicted</option>
                            </select>
                            </div>   
                    </div>
                  
                    <div class="form-group row">
                            <label for="school" class="col-md-4 col-form-label text-md-right">School</label>
                            <div class="col-md-6">
                                    {{Form::text('school','',['class'=>'form-control'])}}
                     
                            </div>
                        </div>

                   
                        <div class="form-group row">
                                <label for="course" class="col-md-4 col-form-label text-md-right">Course</label>
                                <div class="col-md-6">
                                        {{Form::text('course','',['class'=>'form-control'])}}
                                </div>
                            </div>  
                            
                            <div class="form-group row">
                                    <label for="yearLevel" class="col-md-4 col-form-label text-md-right">Year Level</label>
                                    <div class="col-md-6">
                                        {{Form::number('yearLevel','',['class'=>'form-control', 'min'=>'1'])}}
                                    </div>
                                </div>  
               
                                <div class="form-group row">
                                        <label for="mobileNumber" class="col-md-4 col-form-label text-md-right">Mobile Number</label>
                                        <div class="col-md-6">
                                            {{Form::text('mobileNumber','',['class'=>'form-control'])}}
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                            <label for="emailAddress" class="col-md-4 col-form-label text-md-right">Email Address</label>
                                            <div class="col-md-6">
                                                    {{Form::email('emailAddress','',['class'=>'form-control'])}}
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