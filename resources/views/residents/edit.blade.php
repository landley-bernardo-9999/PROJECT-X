@extends('layouts.app')
@section('content')
<a class="btn btn-secondary btn-md" role="button" href="/rooms/".{{$resident->id}}><i class="fas fa-arrow-circle-left"></i>&nbspBack</a> 
<br><br>    
<h1>Edit Resident</h1>
    {!! Form::open(['action'=>['ResidentsController@update', $resident->id],'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::text('name',$resident->name,['class'=>'form-control','placeholder'=>'Name'])}}
        </div>
        <div class="form-group">
            <label for="">Room No</label>
            <select name="roomNo" id="roomNo">
                <option value="{{$resident->roomNo}}"selected disabled>{{$resident->roomNo}}</option>
                @foreach($registeredRooms as $registeredRoom)
                <option value="{{$registeredRoom->roomNo}}">
                    {{$registeredRoom->roomNo}}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
                {{Form::label('Birthdate')}}
                &nbsp&nbsp&nbsp
                {{ Form::date('birthDate',$resident->birthDate, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{Form::label('Move-in Date')}}
            &nbsp&nbsp&nbsp
            {{ Form::date('moveInDate',$resident->moveInDate, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{Form::label('Move-out Date')}}
            &nbsp&nbsp&nbsp
            {{ Form::date('moveOutDate',$resident->moveOutDate, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{Form::label('Status')}}
            &nbsp&nbsp&nbsp
            {{Form::select('residentStatus', ['Active' => 'Active', 'Inactive' => 'Inactive', 'Pending' => 'Pending'],'$resident->residentStatus')}}
        </div>
        <div class="form-group">
                {{Form::text('school',$resident->school,['class'=>'form-control','placeholder'=>'School'])}}
        </div>
        <div class="form-group">
                {{Form::text('course',$resident->course,['class'=>'form-control','placeholder'=>'Course'])}}
        </div>
        <div class="form-group">
            {{Form::number('yearLevel',$resident->yearLevel,['class'=>'form-control','placeholder'=>'Year Level'])}}
        </div>
        <div class="form-group">
                {{Form::text('mobileNumber',$resident->mobileNumber,['class'=>'form-control','placeholder'=>'Mobile Number'])}}
        </div>
        <div class="form-group">
                {{Form::email('emailAddress',$resident->emailAddress,['class'=>'form-control','placeholder'=>'Email Address'])}}
        </div>
        
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}    
     {!! Form::close() !!}    
@endsection

