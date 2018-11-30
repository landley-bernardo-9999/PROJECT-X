@extends('layouts.appsidebar')
@section('content')
@include('includes.messages')
{{-- <a class="btn btn-dark" role="button" href="/propertymgmt "  ><i class="fas fa-arrow-circle-left"></i>&nbspBACK</a> --}}
{{-- <a class="btn btn-warning float-right add-repair" role="button" href="#" ><i class="fas fa-plus-circle fa-1x"></i>&nbspADD</a>    --}}

  {{-- Create a repair form --}}

  <div id="create-repair" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                      <h4 class="repair-title float-left"> </h4>
                    <button class="close" type="button" data-dismiss="modal" >&times;</button>
                      
                </div>

                <div class="modal-body">
                    
                  {!! Form::open(['action'=>'RepairsController@store','method' => 'POST', 'enctype' => 'multipart/form-data', 'class'=>'repair-form'] ) !!}

                      {{-- Resident's Room Number --}}
                      
                      <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">Room No:<span style="color:red">&nbsp*</span></label>
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

                        {{-- Concern department of the repair         --}}

                        <div class="form-group row">
                                <label for="concernDepartment" class="col-md-4 col-form-label text-md-right" >Concern Department:</label>
                            <div class="col-md-6">
                                <select class="form-control" name="concernDeparment" id="concernDepartment">
                                    <option value="" disabled selected>Please select</option>    
                                    <option value="Leasing">Leasing</option>
                                    <option value="Property Management">Property Management</option>
                                    <option value="Accounting">Accounting</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>


                        {{-- Urgency of the repair --}}

                        <div class="form-group row">
                                <label for="concernDepartment" class="col-md-4 col-form-label text-md-right" >Urgency:</label>
                            <div class="col-md-6">
                                <select class="form-control" name="urgency" id="urgency">
                                    <option value="" disabled selected>Please select</option>    
                                    <option value="Emergency">Emergency</option>
                                    <option value="Major Concern">Major Concern</option>
                                    <option value="Minor Concern">Minor Concern</option>
                                </select>
                            </div>
                        </div>

                        {{-- Verify if the unit is still under warranty --}}

                        <div class="form-group row">
                                <label for="isWarranty" class="col-md-4 col-form-label text-md-right" >Under Warranty?:</label>
                            <div class="col-md-6">
                                <select class="form-control" name="isWarranry" id="isWarranty">
                                    <option value="" disabled selected>Please select</option>    
                                    <option value="Emergency">Yes</option>
                                    <option value="Major Concern">No</option>
                                    <option value="Minor Concern">Unknown</option>
                                </select>
                            </div>
                        </div>
{{-- 
                        Name of the resident/owner who requested for the repairs/concern --}}

                        <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right">Reported by:</label>
                            
                            <div class="col-md-6">
                                <select name="name" id="name" class="form-control">
                                    <option value="" disabled selected>Please select</option>
                                    <option value="None">None</option>
                                        @foreach($registeredResidentsAndOwners as $registeredResidentAndOwner)
                                    <option value="{{$registeredResidentAndOwner->name}}">
                                        {{$registeredResidentAndOwner->name}}
                                    </option>
                                        @endforeach
                                </select>
                            </div>
                            </div>

                            {{-- Date when the repair/concern reported --}}
                        
                            <div class="form-group row">
                                    <label for="" class="col-md-4 col-form-label text-md-right">Date Reported:<span style="color:red">&nbsp*</span></label>
                                    <div class="col-md-6">
                                        {{ Form::date('dateReported',' ', ['class' => 'form-control']) }}
                                    </div>
                                </div>

                             {{-- Category of the concern/repair    --}}
                            
                                <div class="form-group row">
                                        <label for="desc" class="col-md-4 col-form-label text-md-right" >Category:<span style="color:red">&nbsp*</span></label>
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
                                            <option value="Door/Window">Door/Window</option>
                                            <option value="General">General</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- The person incharge for the repair --}}

                                <div class="form-group row">
                                        <label for="endorsedTo" class="col-md-4 col-form-label text-md-right">Endorsed to:<span style="color:red">&nbsp*</span></label>
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

                                  {{-- Cost of the repair if applicable --}}
                                
                                  <div class="form-group row">
                                        <label for="" class="col-md-4 col-form-label text-md-right">Cost:<span style="color:red">&nbsp*</span></label>
                                        <div class="col-md-6">
                                           {{Form::number('cost','',['class'=>'form-control'])}}
                                       </div>     
                                     </div>

                                    {{-- The status of the repair --}}

                                     <div class="form-group row">
                                            <label for="repairStatus" class="col-md-4 col-form-label text-md-right">Status:<span style="color:red">&nbsp*</span></label>
                                         <div class="col-md-6">
                                            <select class="form-control" name="repairStatus" id="repairStatus">
                                                <option value=""disabled selected>Please select</option>    
                                                <option value="Pending">Pending</option>
                                                <option value="Ongoing">Ongoing</option>
                                                <option value="Closed">Closed</option>
                                            </select>
                                        </div>   
                                        </div>
            
                                    {{-- The date when repairs was finished --}}

                                        <div class="form-group row">
                                                <label for="dateFinished" class="col-md-4 col-form-label text-md-right">Date Finished:</label>
                                                    <div class="col-md-6">
                                                        {{ Form::date('dateFinished',' ', ['class' => 'form-control']) }}
                                                    </div>
                                            </div>

                                    {{-- Image of the repair/concern if applicable --}}

                                    <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <label for="cover_image" class="col-md-4 col-form-label text-md-right">Image:</label>
                                                {{Form::file('cover_image', ['class' => 'form-control'])}}
                                            </div>
                                    </div>

                                    <br>

                                    {{-- The satisfaction for the repair --}}

                                    <div class="form-group row">
                                            <label for="clientSatisfaction" class="col-md-4 col-form-label text-md-right" >Client Satisfaction:</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="isWarranry" id="isWarranty">
                                                <option value="" disabled selected>Please select</option>    
                                                <option value="None">None</option>
                                                <option value="Very Poor">Very Poor</option>
                                                <option value="Somewhat Unsatisfactory">Somewhat Unsatisfactory</option>
                                                <option value="Average">Average</option>
                                                <option value="Very Satisfactory">Very Satisfactory</option>
                                                <option value="Superior">Superior</option>
                                            </select>
                                        </div>
                                    </div>

                                
                    

                        </div>

                        <div class="modal-footer">
                              <div class="col-md-5 float-right">

                                  <button class="btn btn-danger" data-dismiss="modal" type="button">CLOSE</button>
                                  
                                  {{Form::submit('SUBMIT',['class'=>'btn btn-warning', 'float'=>'right'])}}
                                  {!! Form::close() !!}  

                                  
                              </div>

                              
                          </div>
                    
                </div>

                
            </div>
        </div>

    @if(count($repairs) > 0)
    <div class="container"  >
            <table class="table table-hover table-striped">
                <thead class="">
                    <tr>
                        <th>#</th>
                        <th>Room</th>
                        <th>Resident</th>
                        <th>Reported</th>
                        <th>Description</th>
                        <th>Peronnel</th> 
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                 
                <tbody>
                    @foreach($repairs as $repair)  
                        <tr>
                                <th>{{$rowNum++}}</th>
                                {{-- <td><a href="/rooms/{{$repair->roomNo}}">{{$repair->roomNo}}</a></td> --}}
                                <td>{{$repair->roomNo}}</td>
                                <td>{{$repair->residentName}}</td>
                                <td>{{Carbon\Carbon::parse($repair->dateReported)->formatLocalized('%b %d %Y')}}</td>
                                <td>{{$repair->desc}}</td>
                                <td>{{$repair->endorsedTo}}</td>
                                <td>{{$repair->repairStatus}}</td>
                                <td>
                                    <a href="/propertymgmt/repairs/{{$repair->repairsId}}" class="btn btn-info">MORE</a>
                                </td>
                               
                               
                              
                        </tr>
                        @endforeach   
                </tbody>
          
            </table>
            
    @else
    <div class="alert alert-danger" role="alert"><p>No Repairs found!</p></div>
    @endif
            </div>
@endsection


