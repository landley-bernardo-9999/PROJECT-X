@extends('layouts.app')
@section('content')
<a class="btn btn-dark" role="button" href="/propertymgmt/repairs" style="width:155px"><i class="fas fa-arrow-circle-left"></i>&nbspBACK</a>   
{!! Form::open(['action'=>['RepairsController@update', $repair->id],'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card"  style="padding:6%">
                    <div class="card-header">
                        <h3>Edit Repair</h3>
                    </div>
                <br>
                <!--Select Room No of the resident or owner-->
                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">Room No</label>
                
                <div class="col-md-6">
                    <select name="roomNo" id="roomNo" class="form-control">
                        <option value="{{$repair->roomNo}}" selected>{{$repair->roomNo}}</option>
                            @foreach($registeredRooms as $registeredRoom)
                        <option value="{{$registeredRoom->roomNo}}">
                            {{$registeredRoom->roomNo}}
                        </option>
                            @endforeach
                    </select>
                </div>
                </div>

                
                <div class="form-group row">
                        <label for="concernDepartment" class="col-md-4 col-form-label text-md-right" >Concern Department</label>
                    <div class="col-md-6">
                        <select class="form-control" name="concernDeparment" id="concernDepartment">
                            <option value="{{$repair->concernDepartment}}" selected>{{$repair->concernDepartment}}</option>    
                            <option value="Leasing">Leasing</option>
                            <option value="Property Management">Property Management</option>
                            <option value="Accounting">Accounting</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                        <label for="concernDepartment" class="col-md-4 col-form-label text-md-right" >Urgency</label>
                    <div class="col-md-6">
                        <select class="form-control" name="urgency" id="urgency">
                            <option value="{{$repair->urgency}}" selected>{{$repair->urgency}}</option>    
                            <option value="Emergency">Emergency</option>
                            <option value="Major Concern">Major Concern</option>
                            <option value="Minor Concern">Minor Concern</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                        <label for="isWarranty" class="col-md-4 col-form-label text-md-right" >Under Warranty?</label>
                    <div class="col-md-6">
                        <select class="form-control" name="isWarranry" id="isWarranty">
                            <option value="{{$repair->isWarranty}}" selected>{{$repair->isWarranty}}</option>    
                            <option value="Emergency">Yes</option>
                            <option value="Major Concern">No</option>
                            <option value="Minor Concern">Unknown</option>
                        </select>
                    </div>
                </div>

                <!--Select Name of the resident or owner-->
                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">Name of the Resident/Owner</label>
                
                <div class="col-md-6">
                    <select name="name" id="name" class="form-control">
                        <option value="{{$repair->name}}" selected>{{$repair->name}}</option>
                        <option value="None">None</option>
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
                        {{ Form::date('dateReported',$repair->dateReported, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group row">
                        <label for="desc" class="col-md-4 col-form-label text-md-right" >Description</label>
                    <div class="col-md-6">
                        <select class="form-control" name="desc" id="desc">
                            <option value="{{$repair->desc}}" selected>{{$repair->desc}}</option>    
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
                        <option value="{{$repair->endorsedTo}}" selected>{{$repair->endorsedTo}}</option>
                            @foreach($registeredPersonnels as $registeredPersonnel)
                        <option value="{{$registeredPersonnel->name}}">
                            {{$registeredPersonnel->name}}
                        </option>
                            @endforeach
                    </select>
                </div>
              </div>

              <div class="form-group row">
                 <label for="cost" class="col-md-4 col-form-label text-md-right">Cost</label>
                 <div class="col-md-6">
                    {{Form::number('cost',$repair->cost,['class'=>'form-control'])}}
                </div>     
              </div>

            <div class="form-group row">
                <label for="repairStatus" class="col-md-4 col-form-label text-md-right">Status</label>
             <div class="col-md-6">
                <select class="form-control" name="repairStatus" id="repairStatus">
                    <option value="{{$repair->repairStatus}}" selected>{{$repair->repairStatus}}</option>    
                    <option value="Pending">Pending</option>
                    <option value="Ongoing">Ongoing</option>
                    <option value="Closed">Closed</option>
                </select>
            </div>   
            </div>

            <div class="form-group row">
                <label for="dateFinished" class="col-md-4 col-form-label text-md-right">Date Finished</label>
                    <div class="col-md-6">
                        {{ Form::date('dateFinished',$repair->dateFinished, ['class' => 'form-control']) }}
                    </div>
            </div>

            <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        {{Form::file('cover_image', ['class' => 'form-control'])}}
                    </div>
            </div>

            <div class="form-group row">
                    <label for="clientSatisfaction" class="col-md-4 col-form-label text-md-right" >Client Satisfaction</label>
                <div class="col-md-6">
                    <select class="form-control" name="isWarranry" id="isWarranty">
                        <option value="{{$repair->clientSatifaction}}" selected>{{$repair->clientSatifaction}}</option>    
                        <option value="Very Poor">Very Poor</option>
                        <option value="Somewhat Unsatisfactory">Somewhat Unsatisfactory</option>
                        <option value="Average">Average</option>
                        <option value="Very Satisfactory">Very Satisfactory</option>
                        <option value="Superior">Superior</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                {{Form::hidden('_method','PUT')}}
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



