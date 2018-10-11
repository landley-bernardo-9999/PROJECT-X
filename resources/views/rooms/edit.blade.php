@extends('layouts.app')
@section('content')
<a class="btn btn-secondary btn-md" role="button" href="/rooms"><i class="fas fa-arrow-circle-left"></i>&nbspBack</a>
    <h1>Edit Room</h1>
    {!! Form::open(['action'=>['RoomsController@update', $room->roomNo],'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::text('roomNo',$room->roomNo,['class'=>'form-control','placeholder'=>'Room No'])}}
        </div>
        <div class="form-group">
            {{Form::label('Under Leasing?')}}
            &nbsp&nbsp&nbsp
            {{Form::select('isUnderLeasing', ['Yes'=>'Yes', 'No' => 'No'],$room->isUnderLeasing)}}
        </div>
        <div class="form-group">
            {{Form::label('Building')}}
            {{Form::select('building',['Harvard' => 'Harvard', 'Princeton' => 'Princeton', 'Wharton' => 'Wharton', 'Courtyard'=> 'Courtyard'],'$room->building')}}
        </div>
        <div class="form-group">
            {{Form::number('rentalFee',$room->rentalFee,['class'=>'form-control','placeholder'=>'Monthly Rent'])}}
        </div>
        <div class="form-group">
            {{Form::label('Status')}}
            &nbsp&nbsp&nbsp
            {{Form::select('roomStatus', ['Occupied' => 'Occupied', 'Vacant' => 'Vacant','Reserved' => 'Reserved', 'NRFO' => 'NRFO'],$room->roomStatus)}}
        </div>
        <div class="form-group">
            {{Form::number('size',$room->size,['class'=>'form-control','placeholder'=>'Size'])}}
        </div>
        <div class="form-group">
            {{Form::number('capacity',$room->capacity,['class'=>'form-control','placeholder'=>'Capacity'])}}
        </div>    
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-secondary'])}}    

     {!! Form::close() !!}    
@endsection

