@extends('layouts.app')
@section('content')
<a class="btn btn-secondary btn-md" role="button" href="/owners"><i class="fas fa-arrow-circle-left"></i>&nbspBack</a> 
<br><br>    
<h1>Add Owner</h1>
    {!! Form::open(['action'=>'OwnersController@store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::text('name','',['class'=>'form-control','placeholder'=>'Name'])}}
        </div>
        <div class="form-group">
                {{Form::text('roomNo','',['class'=>'form-control','placeholder'=>'Room No'])}}
            </div>   
        <div class="form-group">
            {{Form::label('Birthdate')}}
            &nbsp&nbsp&nbsp
            {{ Form::date('birthDate',' ', ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
                {{Form::text('mobileNumber','',['class'=>'form-control','placeholder'=>'Mobile Number'])}}
        </div>
        <div class="form-group">
                {{Form::email('emailAddress','',['class'=>'form-control','placeholder'=>'Email Address'])}}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::submit('Submit',['class'=>'btn btn-secondary'])}}    

     {!! Form::close() !!}    
@endsection

