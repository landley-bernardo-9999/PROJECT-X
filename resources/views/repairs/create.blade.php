@extends('layouts.app')
@section('content')
<a class="btn btn-secondary btn-md" role="button" href="/repairs"><i class="fas fa-arrow-circle-left"></i>&nbspBack</a> 
<br><br>    
<h1>Add Repair</h1>
    {!! Form::open(['action'=>'RepairsController@store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::text('roomNo','',['class'=>'form-control','placeholder'=>'Room No'])}}
        </div>    
        <div class="form-group">
                {{Form::label('Date Reported')}}
                &nbsp&nbsp&nbsp
                {{ Form::date('dateReported',' ', ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{Form::label('Description')}}
            &nbsp&nbsp&nbsp
            {{Form::select('desc', ['Plumbing' => 'Plumbing', 'Carpentry' => 'Carpentry', 
            'Electric' => 'Electric', 'Tilling' => 'Tilling', 'Replacement' => 'Replacement',
            'Renovation' => 'Renovation'],null,['placeholder' => 'Please select'])}}
        </div>
        <div class="form-group">
                {{Form::label('Endorsed To')}}
                &nbsp&nbsp&nbsp
                {{Form::select('endorsedTo', ['Armando' => 'Armando', 'Chris' => 'Chris','Marlon' => 'Marlon', 'Marquez' => 'Marquez','Old Jeff' => 'Old Jeff', 'New Jeff' => 'New Jeff'],null,['placeholder' => 'Please select'])}}
        </div>
        <div class="form-group">
            {{Form::number('cost','',['class'=>'form-control','placeholder'=>'Cost'])}}
        </div>
        <div class="form-group">
            {{Form::label('Status')}}
            &nbsp&nbsp&nbsp
            {{Form::select('repairStatus', ['Pending' => 'Pending', 'Ongoing' => 'Ongoing','Done' => 'Done'],null,['placeholder' => 'Please select'])}}
        </div>
        <div class="form-group">
            {{Form::label('Date Finished')}}
            &nbsp&nbsp&nbsp
            {{ Form::date('dateFinished',' ', ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::submit('Submit',['class'=>'btn btn-secondary'])}}    

     {!! Form::close() !!}    
@endsection

