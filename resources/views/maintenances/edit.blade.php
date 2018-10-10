@extends('layouts.app')
@section('content')
<a class="btn btn-secondary btn-md" role="button" href="/maintenances"><i class="fas fa-arrow-circle-left"></i>&nbspBack</a> 
<br><br>    
<h1>Edit Personnel</h1>
    {!! Form::open(['action'=>['MaintenancesController@update', $maintenance->id],'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}    
    <div class="form-group">
            {{Form::text('name',$maintenance->name,['class'=>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('Birthdate')}}
            &nbsp&nbsp&nbsp
            {{ Form::date('birthDate',$maintenance->birthDate, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{Form::label('Employment Status')}}
            &nbsp&nbsp&nbsp
            {{Form::select('employmentStatus', ['Part-time' => 'Part-time', 'Full-time' => 'Full-time','On-call' => 'On-call', 'Inactive' => 'Inactive'],$maintenance->employmentStatus)}}
        </div>
        <div class="form-group">
            {{Form::label('Position')}}
            &nbsp&nbsp&nbsp
            {{Form::select('position', ['Maintenance' => 'Maintenance', 'Housekeeping' => 'Housekeeping','Others' => 'Others'],$maintenance->position)}}
        </div>
        <div class="form-group">
            {{Form::text('schedule',$maintenance->schedule,['class'=>'form-control','placeholder'=>'Schedule (ex. 8-5 MTWTH)'])}}
        </div>
        <div class="form-group">
                {{Form::text('mobileNumber',$maintenance->mobileNumber,['class'=>'form-control','placeholder'=>'Mobile Number'])}}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-secondary'])}}    

     {!! Form::close() !!}    
@endsection
