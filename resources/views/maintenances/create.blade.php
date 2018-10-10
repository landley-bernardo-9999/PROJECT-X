@extends('layouts.app')
@section('content')
<a class="btn btn-secondary btn-md" role="button" href="/maintenances"><i class="fas fa-arrow-circle-left"></i>&nbspBack</a> 
<br><br>    
<h1>Add Personnel</h1>
    {!! Form::open(['action'=>'MaintenancesController@store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::text('name','',['class'=>'form-control','placeholder'=>'Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('Birthdate')}}
            &nbsp&nbsp&nbsp
            {{ Form::date('birthDate',' ', ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{Form::label('Employment Status')}}
            &nbsp&nbsp&nbsp
            {{Form::select('employmentStatus', ['Part-time' => 'Part-time', 'Full-time' => 'Full-time','On-call' => 'On-call', 'Inactive' => 'Inactive'],null,['placeholder' => 'Please select'])}}
        </div>
        <div class="form-group">
            {{Form::label('Position')}}
            &nbsp&nbsp&nbsp
            {{Form::select('position', ['Maintenance' => 'Maintenance', 'Housekeeping' => 'Housekeeping','Others' => 'Others'],null,['placeholder' => 'Please select'])}}
        </div>
        <div class="form-group">
            {{Form::text('schedule','',['class'=>'form-control','placeholder'=>'Schedule (ex. 8-5 MTWTH)'])}}
        </div>
        <div class="form-group">
                {{Form::text('mobileNumber','',['class'=>'form-control','placeholder'=>'Mobile Number'])}}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::submit('Submit',['class'=>'btn btn-secondary'])}}    

     {!! Form::close() !!}    
@endsection

