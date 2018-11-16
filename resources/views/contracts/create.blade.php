@extends('layouts.app')
@section('content')
<a class="btn btn-secondary btn-md" role="button" href="/propertymgmt/residents"><i class="fas fa-arrow-circle-left"></i></a>   
{!! Form::open(['action'=>'ContractsController@store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card"style="padding:6%">
                    <div class="card-header">
                        <h3>Contract Information</h3>
                    </div>
                <br>

         
                <div class="form-group row">
                        <label for="residentRoomNo" class="col-md-4 col-form-label text-md-right">Room No</label>
                    
                    <div class="col-md-6">
                        <select name="residentRoomNo" id="residentRoomNo" class="form-control">
                            <option value="" disabled selected>Please select</option>
                                @foreach($registeredRooms as $registeredRoom)
                            <option value="{{$registeredRoom->roomNo}}">
                                {{$registeredRoom->roomNo}}
                            </option>
                                @endforeach
                        </select>
                    </div>
                </div>

                
                <div class="form-group row">
                    <label for="term" class="col-md-4 col-form-label text-md-right">Term</label>
                        <div class="col-md-6">
                    <select class="form-control" name="term" id="term">
                            <option value="" selected>Please select</option>
                            <option value="Short Term" >Short Term</option>    
                            <option value="Long Term">Long Term</option>
                            <option value="Transient">Transient</option>                            
                    </select>
                        </div>   
                </div>

                <div class="form-group row">
                        <label for="residentName" class="col-md-4 col-form-label text-md-right">Name of the Resident</label>
                    
                    <div class="col-md-6">
                        <select name="residentName" id="residentName" class="form-control">
                            <option value="" disabled selected>Please select</option>
                                @foreach($registeredResidents as $registeredResident)
                            <option value="{{$registeredResident->id}}">
                                {{$registeredResident->name}}
                            </option>
                                @endforeach
                        </select>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="moveInDate" class="col-md-4 col-form-label text-md-right">Move-In Date</label>
                    <div class="col-md-6">
                        {{ Form::date('moveInDate',' ', ['class' => 'form-control']) }}
                    </div>
                </div>


                <div class="form-group row">
                    <label for="moveOutDate" class="col-md-4 col-form-label text-md-right">Move-Out Date</label>
                    <div class="col-md-6">
                        {{ Form::date('moveOutDate',' ', ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="amountPaid" class="col-md-4 col-form-label text-md-right">Rent</label>
                    <div class="col-md-6">
                        {{Form::number('amountPaid','',['class'=>'form-control'])}}
                    </div>     
                </div>
                
                <div class="form-group row">
                    <label for="securityDeposit" class="col-md-4 col-form-label text-md-right">Security Deposit</label>
                    <div class="col-md-6">
                        {{Form::number('securityDeposit','',['class'=>'form-control'])}}
                    </div>     
                </div>

                <div class="form-group row">
                    <label for="reasonForMovingOut" class="col-md-4 col-form-label text-md-right">Reason for Moving-out (Optional)</label>
                        <div class="col-md-6">
                        <select class="form-control" name="reasonForMovingOut" id="reasonForMovingOut">
                            <option value="Not Applicable">Not Applicable</option>
                            <option value="Not Applicable" selected>Please select</option>    
                            <option value="End of Contract">End of Contract</option>
                            <option value="Delinquent">Delinquent</option>
                            <option value="Misconduct">Misconduct</option>
                            <option value="Force Majeure">Force Majeure</option>
                            <option value="Others">Others</option>
                        </select>
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
  

    <br>
@endsection