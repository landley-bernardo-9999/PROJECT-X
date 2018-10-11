@extends('layouts.app')
@section('content')
<a class="btn btn-secondary btn-md" role="button" href="/rooms"><i class="fas fa-arrow-circle-left"></i>&nbspBack</a> 
<br><br>  
<h1>Add Room</h1>
    {!! Form::open(['action'=>'RoomsController@store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::text('roomNo','',['class'=>'form-control','placeholder'=>'Room No'])}}
        </div>  
        <div class="form-group">
            {{Form::label('Under Leasing?')}}
            &nbsp&nbsp&nbsp
            {{Form::select('isUnderLeasing', ['Yes'=>'Yes', 'No' => 'No'],'Harvard',['placeholder' => 'Please select'])}}
        </div>
        <div class="form-group">
            {{Form::label('Building')}}
            &nbsp&nbsp&nbsp
            {{Form::select('building', ['Harvard' => 'Harvard', 'Princeton' => 'Princeton', 'Wharton' => 'Wharton', 'Courtyard' => 'Courtyard'],'Harvard',['placeholder' => 'Please select'])}}
        </div>
        <div class="form-group">
            {{Form::number('rentalFee','6000',['class'=>'form-control','placeholder'=>'Monthly Rent'],['min'=>'0'])}}
        </div>
        <div class="form-group">
            {{Form::label('Status')}}
            &nbsp&nbsp&nbsp
            {{Form::select('roomStatus', ['Occupied' => 'Occupied', 'Vacant' => 'Vacant','Reserved' => 'Reserved', 'NRFO' => 'NRFO'],'Occupied',['placeholder' => 'Please select'])}}
        </div>
        <div class="form-group">
            {{Form::number('size','15',['class'=>'form-control','placeholder'=>'Size'])}}
        </div>
        <div class="form-group">
            {{Form::number('capacity','2',['class'=>'form-control','placeholder'=>'Capacity'])}}
        </div>    
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::submit('Submit',['class'=>'btn btn-secondary'])}}    

     {!! Form::close() !!}    
@endsection

