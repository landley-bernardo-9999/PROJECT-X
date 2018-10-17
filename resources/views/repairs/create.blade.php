@extends('layouts.app')
@section('content')
<a class="btn btn-secondary btn-md" role="button" href="/repairs"><i class="fas fa-arrow-circle-left"></i></a>   
{!! Form::open(['action'=>'RepairsController@store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card"style="padding:6%">
                    <div class="card-header">
                        <h3>Add Repair</h3>
                    </div>
                <br>
                <!--Select Room No of the resident or owner-->
                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">Room No</label>
                
                <div class="col-md-6">
                    <select name="roomNo" id="roomNo" class="form-control">
                        <option value="" disabled selected>Please select</option>
                            @foreach($registeredRooms as $registeredRoom)
                        <option value="{{$registeredRoom->roomNo}}">
                            {{$registeredRoom->roomNo}}
                        </option>
                            @endforeach
                    </select>
                </div>
                </div>

                <!--Select Name of the resident or owner-->
                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">Name of the Resident/Owner</label>
                
                <div class="col-md-6">
                    <select name="name" id="name" class="form-control">
                        <option value="" disabled selected>Please select</option>
                            @foreach($registeredResidentsAndOwners as $registeredResidentAndOwner)
                        <option value="{{$registeredResidentAndOwner->name}}">
                            {{$registeredResidentAndOwner->name}}
                        </option>
                            @endforeach
                    </select>
                </div>
                </div>

                <!--Date when the repair reported-->
                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">Date Reported</label>
                    <div class="col-md-6">
                        {{ Form::date('dateReported',' ', ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group row">
                        <label for="desc" class="col-md-4 col-form-label text-md-right" >Description</label>
                    <div class="col-md-6">
                        <select class="form-control" name="desc" id="desc">
                            <option value="" disabled selected>Please select</option>    
                            <option value="Carpentry">Carpentry</option>
                            <option value="Electrical">Electrical</option>
                            <option value="Plumbing">Plumbing</option>
                            <option value="Installations">Installations</option>
                            <option value="Masonry">Masonry</option>
                            <option value="Painting">Painting</option>
                            <option value="Cleaning">Cleaning</option>
                            <option value="Security">Security</option>
                            <option value="Internet">Internet</option>
                            <option value="Request">Request</option>
                            <option value="General">General</option>
                        </select>
                    </div>
                </div>

              <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">Endorsed To</label>
                <div class="col-md-6">
                    <select class="form-control" name="endorsedTo" id="endorsedTo">
                        <option value="" disabled selected>Please select</option>
                            @foreach($registeredPersonnels as $registeredPersonnel)
                        <option value="{{$registeredPersonnel->name}}">
                            {{$registeredPersonnel->name}}
                        </option>
                            @endforeach
                    </select>
                </div>
              </div>

              <div class="form-group row">
                 <label for="" class="col-md-4 col-form-label text-md-right">Cost</label>
                 <div class="col-md-6">
                    {{Form::number('cost','',['class'=>'form-control'])}}
                </div>     
              </div>

            <div class="form-group row">
                <label for="repairStatus" class="col-md-4 col-form-label text-md-right">Status</label>
             <div class="col-md-6">
                <select class="form-control" name="repairStatus" id="repairStatus">
                    <option value=""disabled selected>Please select</option>    
                    <option value="Pending">Pending</option>
                    <option value="Ongoing">Ongoing</option>
                    <option value="Closed">Closed</option>
                </select>
            </div>   
            </div>

            <div class="form-group row">
                <label for="dateFinished" class="col-md-4 col-form-label text-md-right">Date Finished</label>
                    <div class="col-md-6">
                        {{ Form::date('dateFinished',' ', ['class' => 'form-control']) }}
                    </div>
            </div>

            <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        {{Form::file('cover_image', ['class' => 'form-control'])}}
                    </div>
            </div>
            <br>
            <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        {{Form::submit('Submit',['class'=>'btn btn-secondary'])}}
                        {!! Form::close() !!}  
                    </div>
                </div>
        </div>   
                </div>
                </div>
            </div>
        </div>
    </div> 
    </div>
    <br>
@endsection