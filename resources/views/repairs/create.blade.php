@extends('layouts.app')
@section('content')
<a class="btn btn-secondary btn-md" role="button" href="/repairs"><i class="fas fa-arrow-circle-left"></i>&nbspBack</a> 
<br><br>    
<h1>Add Repair</h1>
    {!! Form::open(['action'=>'RepairsController@store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
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
            <label for="">Name of the Resident/Owner</label>
            <select name="name" id="name">
                <option value="" disabled selected>Please select</option>
                @foreach($registeredResidentsAndOwners as $registeredResidentAndOwner)
                <option value="{{$registeredResidentAndOwner->name}}">
                    {{$registeredResidentAndOwner->name}}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
                {{Form::label('Date Reported')}}
                &nbsp&nbsp&nbsp
                {{ Form::date('dateReported',' ', ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{Form::label('Description')}}
            &nbsp&nbsp&nbsp
            {{Form::select('desc', ['Carpentry'=>'Carpentry', 'Electrical' => 'Electrical', 'Plumbing'=>'Plumbing', 
                                    'General' => 'General', 'Installations' => 'Installations',
                                    'Masonry' => 'Masonry', 'Painting' => 'Painting', 'Cleaning' => 'Cleaning',
                                    'Security' => 'Security', 'Internet' => 'Internet', 'Request' => 'Request'],null,['placeholder' => 'Please select'])}}
        </div>
        

        <div class="form-group">
            <label for="">Endorsed To</label>
            <select name="endorsedTo" id="endorsedTo">
                <option value="" disabled selected>Please select</option>
                @foreach($registeredPersonnels as $registeredPersonnel)
                <option value="{{$registeredPersonnel->name}}">
                    {{$registeredPersonnel->name}}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {{Form::number('cost','',['class'=>'form-control','placeholder'=>'Cost'])}}
        </div>
        <div class="form-group">
            {{Form::label('Status')}}
            &nbsp&nbsp&nbsp
            {{Form::select('repairStatus', ['Pending' => 'Pending', 'Ongoing' => 'Ongoing','Closed' => 'Closed'],null,['placeholder' => 'Please select'])}}
        </div>
        <div class="form-group">
            {{Form::label('Date Finished (Leave it blank if unknown)')}}
            &nbsp&nbsp&nbsp
            {{ Form::date('dateFinished',' ', ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::submit('Submit',['class'=>'btn btn-secondary'])}}    

     {!! Form::close() !!}    
@endsection

