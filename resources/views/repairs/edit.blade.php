@extends('layouts.app')
@section('content')
<a class="btn btn-secondary btn-md" role="button" href="/repairs/".{{$repair->id}}><i class="fas fa-arrow-circle-left"></i>&nbspBack</a> 
    <h1>Edit Resident</h1>
    {!! Form::open(['action'=>['RepairsController@update', $repair->id],'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('Date Reported')}}
            &nbsp&nbsp&nbsp
            {{ Form::date('dateReported',$repair->dateReported, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
                {{Form::text('roomNo',$repair->roomNo,['class'=>'form-control'])}}
            </div>
        <div class="form-group">
            {{Form::label('Description')}}
            &nbsp&nbsp&nbsp
            {{Form::select('desc', ['Plumbing' => 'Plumbing', 'Carpentry' => 'Carpentry', 
            'Electric' => 'Electric', 'Tilling' => 'Tilling', 'Replacement' => 'Replacement',
            'Renovation' => 'Renovation'],$repair->desc)}}
        </div>
        <div class="form-group">
                {{Form::label('Endorsed To')}}
                &nbsp&nbsp&nbsp
                {{Form::select('endorsedTo', ['Armando' => 'Armando', 'Chris' => 'Chris','Marlon' => 'Marlon','Old Jeff' => 'Old Jeff', 'New Jeff' => 'New Jeff'],$repair->endorseTo)}}
        </div>
        <div class="form-group">
            {{Form::number('cost',$repair->cost,['class'=>'form-control','placeholder'=>'Cost'])}}
        </div>
        <div class="form-group">
            {{Form::label('Status')}}
            &nbsp&nbsp&nbsp
        {{Form::select('repairStatus', ['Pending' => 'Pending', 'Ongoing' => 'Ongoing','Done' => 'Done'],$repair->repairStatus)}}
        </div>
        <div class="form-group">
            {{Form::label('Date Finished')}}
            &nbsp&nbsp&nbsp
            {{Form::date('dateFinished',$repair->dateFinished, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Submit',['class'=>'btn btn-secondary'])}}    
            {!! Form::close() !!}    
@endsection

