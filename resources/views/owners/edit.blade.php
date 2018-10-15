@extends('layouts.app')
@section('content')
<a class="btn btn-secondary btn-md" role="button" href="/owners"><i class="fas fa-arrow-circle-left"></i>&nbspBack</a> 
    <br><br>    
<h1>Add Owner</h1>
    {!! Form::open(['action'=>['OwnersController@update', $owner->id],'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::text('name',$owner->name,['class'=>'form-control','placeholder'=>'Name'])}}
        </div>
        <div class="form-group">
                <label for="">Room No</label>
                <select name="roomNo" id="roomNo">
                    <option value="{{$owner->roomNo}}"selected>{{$owner->roomNo}}</option>
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
            {{ Form::date('birthDate',$owner->birthDate, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
                {{Form::text('mobileNumber',$owner->mobileNumber,['class'=>'form-control','placeholder'=>'Mobile Number'])}}
        </div>
        <div class="form-group">
                {{Form::email('emailAddress',$owner->emailAddress ,['class'=>'form-control','placeholder'=>'Email Address'])}}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}    
    {!! Form::close() !!}    
@endsection

