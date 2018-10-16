@extends('layouts.app')
@section('content')
<a class="btn btn-secondary btn-md" role="button" href="/violations"><i class="fas fa-arrow-circle-left"></i>&nbspBack</a> 
<br><br>    
<h1>Edit Violation</h1>
    {!! Form::open(['action'=>['ViolationsController@update', $violation->id],'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    
    <div class="form-group">
        {{Form::label('Date Reported (Leave it blank if unknown)')}}
            &nbsp&nbsp&nbsp
        {{ Form::date('dateReported',$violation->dateReported, ['class' => 'form-control']) }}
    </div>

        
        <div class="form-group">
            <label for="">Name of the Resident/Owner</label>
            <select name="name" id="name">
                <option value="{{$violation->registeredResidentAndOwner}}" selected>{{$violation->registeredResidentAndOwner}}</option>
                @foreach($registeredResidentsAndOwners as $registeredResidentAndOwner)
                <option value="{{$registeredResidentAndOwner->name}}">
                    {{$registeredResidentAndOwner->name}}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="">Room No</label>
            <select name="roomNo" id="roomNo">
                <option value="" disabled selected>Please select</option>
                    @foreach($registeredRooms as $registeredRoom)
                    <option value="{{$registeredRoom->roomNo}}">
                        {{$registeredRoom->roomNo}}
                    </option>
                    @endforeach
            </select>
        </div> 

        <div class="form-group">
            {{Form::text('description','',['class'=>'form-control','placeholder'=>'Description'])}}
        </div>

        <div class="form-group">
            {{Form::textarea('details','',['class'=>'form-control','placeholder'=>'Details of the Violation/s'])}}
        </div>

        <div class="form-group">
            {{Form::label('Date Committed (Leave it blank if unknown)')}}
                    &nbsp&nbsp&nbsp
            {{ Form::date('dateCommitted',' ', ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
                {{Form::text('Reported By','',['class'=>'form-control','placeholder'=>'Reported By'])}}
        </div>

        <div class="form-group">
                {{Form::number('fine','',['class'=>'form-control','placeholder'=>'Fine (PHP)'])}}
        </div>

        <div class="form-group">
            {{Form::textarea('actionTaken','',['class'=>'form-control','placeholder'=>'Repercussions of the Violation/s committed'])}}
        </div>
        
        {{Form::submit('Submit',['class'=>'btn btn-secondary'])}}    

     {!! Form::close() !!}    
@endsection

