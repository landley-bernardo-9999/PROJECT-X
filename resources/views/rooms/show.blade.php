@extends('layouts.style')
@section('content')
@include('includes.messages')

    {{-- Edit form  --}}    
    
    <div id="edit-room" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                      <h4 class="edit-room-title float-left"> </h4>
                    <button class="close" type="button" data-dismiss="modal" >&times;</button>
                      
                </div>

                <div class="modal-body">

                        {!! Form::open(['action'=>['RoomsController@update', $room->roomNo],'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group row">
                        <label for="roomNo" class="col-md-4 col-form-label text-md-right">Room No:</label>
                        <div class="col-md-6">
                            {{Form::text('roomNo',$room->roomNo,['class'=>'form-control'])}}
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="building" class="col-md-4 col-form-label text-md-right">Building:</label>
                        <div class="col-md-6">
                        <select class="form-control" name="building" id="building">
                            <option value="{{$room->building}}" selected>{{$room->building}}</option>    
                            <option value="Harvard">Harvard</option>
                            <option value="Princeton">Princeton</option>
                            <option value="Wharton">Wharton</option>
                            <option value="Courtyard">Courtyard</option>
                        </select>
                        </div>   
                    </div>
    
    
                    <div class="form-group row">
                        <label for="shortTermRent" class="col-md-4 col-form-label text-md-right">Short Term Rent:</label>
                        <div class="col-md-6">
                            {{Form::number('shortTermRent',$room->shortTermRent,['class'=>'form-control'],['min'>'0'])}}
                       </div>     
                </div>
    
                
                <div class="form-group row">
                    <label for="longTermRent" class="col-md-4 col-form-label text-md-right">Long Term Rent:</label>
                    <div class="col-md-6">
                        {{Form::number('longTermRent',$room->longTermRent,['class'=>'form-control'],['min'>'0'])}}
                   </div>     
                </div>
    
                    <div class="form-group row">
                            <label for="roomStatus" class="col-md-4 col-form-label text-md-right">Status:</label>
                            <div class="col-md-6">
                            <select class="form-control" name="roomStatus" id="roomStatus">
                                <option value="{{$room->roomStatus}}" selected>{{$room->roomStatus}}</option>    
                                <option value="Occupied">Occupied</option>
                                <option value="Vacant">Vacant</option>
                                <option value="Reserved">Reserved</option>
                                <option value="NRFO">NRFO</option>
                            </select>
                            </div>   
                    </div>
    
                    <div class="form-group row">
                            <label for="size" class="col-md-4 col-form-label text-md-right">Size(sqm):</label>
                            <div class="col-md-6">
                                {{Form::number('size',$room->size,['class'=>'form-control'])}}
                           </div>     
                    </div>
    
                    <div class="form-group row">
                            <label for="capacity" class="col-md-4 col-form-label text-md-right">Capacity:</label>
                            <div class="col-md-6">
                                {{Form::number('capacity',$room->capacity,['class'=>'form-control'])}}
                           </div>     
                    </div>
    
                    <div class="form-group row mb-0">
                            <label for="" class="col-md-4 col-form-label text-md-right">Image:</label>
                            <div class="col-md-6">
                                {{Form::file('cover_image', ['class' => 'form-control'])}}
                            </div>
                    </div>
                      
                    <br>
                    
                </div>

                <div class="modal-footer">
                    <div class="col-md-5 float-right">

                        <button class="btn btn-danger" data-dismiss="modal" type="button">CLOSE</button>
                        {{Form::hidden('_method','PUT')}}
                        {{Form::submit('SUBMIT',['class'=>'btn btn-warning', 'float'=>'right'])}}
                        {!! Form::close() !!}  

                        
                    </div>

                    
                </div>

                
            </div>
        </div>
    </div> 
    {{-- end of the edit room modal --}}

<div class="card">
    <div class="card-header">
            <a class="btn btn-dark" role="button" href="/propertymgmt/rooms/" ><i class="fas fa-arrow-circle-left"></i>&nbspBACK</a>
            <a href="#" class="btn btn-primary edit-room"  ><i class="fas fa-edit"></i>&nbspEDIT</a>
            {!!Form::open(['action' => ['RoomsController@destroy', $room->roomNo],'id' => 'FormDeleteTime', 'method' => 'POST', 'class' =>'float-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}  
            {{Form::submit('DELETE',['class' => 'btn btn-danger'])}}
    {!!Form::close()!!} 
    </div>
    <div class="card-body">


<div class="card-header">
        <h3>Room&nbsp<i class="fas fa-store-alt"></i></h3>
</div>
<br>
    <div class="container-fluid">
       <div class="row">
            <div class="col-lg-7">
                    <table class="table table-striped">
                        <tr>
                            <th>Room No</th>
                            <td>{{$room->roomNo}}</td>
                        </tr>
                       
                        <tr>
                            <th>Building</th>
                            <td>{{$room->building}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{$room->roomStatus}}</td>
                        </tr>
                        <tr>
                            <th>Short Term Rent </th>
                            <td>{{$room->shortTermRent}}</td>
                        </tr>
                        <tr>
                            <th>Long Term Rent</th>
                            <td>{{$room->longTermRent}}</td>
                        </tr>
                        
                        <tr>
                            <th>Size</th>
                            <td>{{$room->size}}</td>
                        </tr>
                        <tr>
                            <th>Capacity</th>
                            <td>{{$room->capacity}}</td>
                        </tr>
                    </table>
            </div>  

            <div class="col-lg-5">
                
                    <img class="card-img-top" src="/storage/cover_images/{{$room->cover_image}}" alt="Card image cap">
                  
            </div>
        </div>
        <br>
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="card-header">
                            <h3>Residents&nbsp <i class="fas fa-users"></i></h3>
                    </div>

                    <br>
                   
                        @if(count($resident_contract) > 0)             
                        <table class="table table-striped">
                         <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Profile</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Term</th>
                                <th>Rent</th>
                                <th>Move-In</th>
                                <th>Move-Out</th>
                                <th></th>
                               
                             </tr>
                         </thead>
                         
                        <tbody>
                                @foreach($resident_contract as $resident_contract)
                         <tr>
                            <th>{{ $residentsRowNo++ }}</th>
                            <td><img class="card-img-top" style="width:35px" src="/storage/resident_images/{{$resident_contract->cover_image}}" alt="Card image cap"></td>
                            <td><a href="/propertymgmt/residents/{{$resident_contract->residentName}}" class="btn btn-primary">{{$resident_contract->name}}</a></td>
                                
                            <td>{{$resident_contract->residentStatus}}</td>
                            <td>{{$resident_contract->term}}</td>
                            <td>{{$resident_contract->amountPaid}}</td>
                            <td>{{Carbon\Carbon::parse($resident_contract->moveInDate)->formatLocalized('%b %d %Y')}}</td>
                            <td>{{Carbon\Carbon::parse($resident_contract->moveOutDate)->formatLocalized('%b %d %Y')}}</td>
                            <td><a href="/propertymgmt/contracts/{{$resident_contract->id}}" class="btn btn-info">MORE</td>
                         </tr>
                         @endforeach
                        </tbody>
                        
                        </table>
                        @else
                        <div class="alert alert-danger" role="alert"><p>No records of residents!</p></div>
                        @endif
                      
                      <a class="btn btn-warning add-resident" href="#" style="width:150px"><i class="fas fa-plus-circle fa-1x"></i>&nbspADD RESIDENT</a> 
                    

                </div>
                      {{-- Create a resident registration form --}}

                      <div id="create-resident" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                        <h4 class="resident-title float-left"> </h4>
                                      <button class="close" type="button" data-dismiss="modal" >&times;</button>
                                        
                                  </div>

                                  <div class="modal-body">
                                      
                                    {!! Form::open(['action'=>'ContractsController@store','method' => 'POST', 'enctype' => 'multipart/form-data', 'class'=>'resident-form'] ) !!}

                                        {{-- Resident's Room Number --}}
                                        
                                        <div class="form-group row add" >
                                            <label for="residentRoomNo" class="col-md-5 text-md-right">Room No:<span style="color:red">&nbsp*</span></label> 
                                            <div class="col-md-6">
                                                <select name="residentRoomNo" id="residentRoomNo" class="form-control">   
                                                    <option value="{{$room->roomNo}}" selected >
                                                        {{$room->roomNo}}
                                                    </option>
                                                        
                                                </select>

                                            
                                            </div>                                            
                                        </div>
                                         {{-- Resident's full name --}}


                                        <div class="form-group row">
                                            <label for="residentName" class="col-md-5 col-form-label text-md-right">Name:<span style="color:red">&nbsp*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="residentName">
                                            </div>
                                        </div>

                                         {{-- <div class="form-group row">
                                                <label for="residentName" class="col-md-5 col-form-label text-md-right">Name:<span style="color:red">&nbsp*</span></label>
                                            
                                            <div class="col-md-6">
                                                <select name="residentName" id="residentName" class="form-control">
                                                    <option value="" disabled selected>Please select</option>
                                                        @foreach($registeredResidents as $registeredResident)
                                                    <option value="{{$registeredResident->id}}">
                                                        {{$registeredResident->name}}&nbsp|&nbsp{{Carbon\Carbon::parse($registeredResident->created_at)->formatLocalized('%b %d %Y')}}
                                                    </option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div> --}}

                                      

                                        {{-- Resident's duration of stay --}}

                                        <div class="form-group row">
                                            <label for="term" class="col-md-5 col-form-label text-md-right">Term<span style="color:red">&nbsp*</span></label>
                                                <div class="col-md-6">
                                                    <select class="form-control" name="term" id="term">
                                                        <option value="" selected disabled>Please select</option>  
                                                        <option value="Short Term">Short Term</option>  
                                                        <option value="Long Term">Long Term</option>
                                                        <option value="Transient">Transient</option>                            
                                                    </select>
                                                </div>   
                                        </div>

                                        {{-- Residet's move-in date. --}}

                                        <div class="form-group row">    
                                            <label for="moveInDate" class="col-md-5 col-form-label text-md-right">Move-In Date:</label>
                                            <div class="col-md-6">
                                                {{ Form::date('moveInDate',\Carbon\Carbon::now() , ['class' => 'form-control']) }}
                                            </div>
                                        </div>

                                        {{-- Resident's move out date. --}}

                                        <div class="form-group row">
                                            <label for="moveOutDate" class="col-md-5 col-form-label text-md-right">Move-Out Date:</label>
                                            <div class="col-md-6">
                                                {{ Form::date('moveOutDate',' ', ['class' => 'form-control']) }}
                                            </div>
                                        </div>

                                        {{-- Resident's move-in charges. --}}

                                        <div class="form-group row">
                                            <label for="amountPaid" class="col-md-5 col-form-label text-md-right">Rent:<span style="color:red">&nbsp*</span></label>
                                            <div class="col-md-6">
                                                <input name="amountPaid" id="amountPaid" type="number" min="0" class="form-control" value="{{ old('amountPaid') }}"></input>
                                            </div>     
                                        </div>

                                        {{-- Resident's security deposit --}}

                                        <div class="form-group row">
                                            <label for="securityDeposit" class="col-md-5 col-form-label text-md-right">Security Deposit:<span style="color:red">&nbsp*</span></label>
                                            <div class="col-md-6">
                                                <input name="securityDeposit" id="securityDeposit" type="number" min="0" class="form-control" value="{{ old('securityDeposit') }}"></input>
                                            </div>     
                                        </div>

                                        {{-- Resident's reason for moving-out.

                                        <div class="form-group row">
                                            <label for="reasonForMovingOut" class="col-md-5 col-form-label text-md-right">Reason for Moving-out:</label>
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
                                        </div> --}}

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

                        </div>
<br>
                <div class="row">
                         <div class="col-lg-12">
                                 <div class="card-header">
                                        <h3>Repairs&nbsp<i class="fas fa-toolbox"></i></h3>
                                 </div>
                                 <br>
                                  <div class="panel panel-default">
                                 @if(count($repair) > 0)              
                                 <table class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Date Reported</th>
                                            <th>Reported By</th>
                                            <th>Description</th>
                                            <th>Endorse To</th>
                                            <th>Status</th> 
                                            <th>Cost</th>
                                            
                                        </tr>
                                </thead>
                                
                                  <tbody>
                                        @foreach($repair as $repair)
                                  <tr>
                                     <th>{{ $repairsRowNo++ }}</th>
                                     <td>{{ $repair->dateReported}}</td>
                                     <td>{{$repair->name}}</td>
                                     <td>{{$repair->desc}}</td>
                                     <td>{{$repair->endorsedTo}}</td>
                                     <td>{{$repair->repairStatus}}</td> 
                                     <td>{{$repair->cost}}</td>
                                     
                                  </tr>
                                  @endforeach
                                </tbody>
                                
                                 </table>
                                 @else
                                 <div class="alert alert-danger" role="alert"><p>No records of repairs!</p></div>
                                 @endif
                               </div>
                               <a class="btn btn-warning add-repair" role="button" href="#" style="width:150px" ><i class="fas fa-plus-circle fa-1x"></i>&nbspADD REPAIR</a>
                         </div>
                </div>

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
                                                <option value="{{$room->roomNo}}" selected >
                                                    {{$room->roomNo}}
                                                </option>
                                            </select>
                                        </div>
                                        </div>

{{--                              

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

                                        {{-- <div class="form-group row">
                                                <label for="isWarranty" class="col-md-4 col-form-label text-md-right" >Under Warranty?:</label>
                                            <div class="col-md-6">
                                                <select class="form-control" name="isWarranry" id="isWarranty">
                                                    <option value="" disabled selected>Please select</option>    
                                                    <option value="Emergency">Yes</option>
                                                    <option value="Major Concern">No</option>
                                                    <option value="Minor Concern">Unknown</option>
                                                </select>
                                            </div>
                                        </div> --}} 

                              

                                        <div class="form-group row">
                                                <label for="" class="col-md-4 col-form-label text-md-right">Reported by:<span style="color:red">&nbsp*</span></label>
                                            
                                            <div class="col-md-6">
                                                <select name="name" id="name" class="form-control">
                                                    <option value="" disabled selected>Please select</option>
                                                    <option value="None">None</option>
                                                        @foreach($registeredResidents as $registeredResident)
                                                    <option value="{{$registeredResident->name}}">
                                                        {{$registeredResident->name}}&nbsp|&nbsp{{Carbon\Carbon::parse($registeredResident->created_at)->formatLocalized('%b %d %Y')}}
                                                    </option>
                                                        @endforeach
                                                </select>
                                            </div>
                                            </div>

                                            {{-- Date when the repair/concern reported --}}
                                        
                                            <div class="form-group row">
                                                    <label for="" class="col-md-4 col-form-label text-md-right">Date Reported:<span style="color:red">&nbsp*</span></label>
                                                    <div class="col-md-6">
                                                        {{ Form::date('dateReported',\Carbon\Carbon::now(), ['class' => 'form-control']) }}
                                                    </div>
                                                </div>

                                             {{-- Category of the concern/repair    --}}
                                            
                                                <div class="form-group row">
                                                        <label for="desc" class="col-md-4 col-form-label text-md-right" >Description:<span style="color:red">&nbsp*</span></label>
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
                                                            <input name="cost" id="cost" type="number" min="0" class="form-control" value="{{ old('cost') }}"></input>
                                                       </div>     
                                                     </div>

                                                    {{-- The status of the repair --}}

                                                     <div class="form-group row">
                                                            <label for="repairStatus" class="col-md-4 col-form-label text-md-right">Status:<span style="color:red">&nbsp*</span></label>
                                                         <div class="col-md-6">
                                                            <select class="form-control" name="repairStatus" id="repairStatus">    
                                                                <option value="Pending" selected>Pending</option>
                                                                <option value="Ongoing">Ongoing</option>
                                                                <option value="Closed">Closed</option>
                                                            </select>
                                                        </div>   
                                                        </div>
                            
                                                    {{-- The date when repairs was finished

                                                        <div class="form-group row">
                                                                <label for="dateFinished" class="col-md-4 col-form-label text-md-right">Date Finished:</label>
                                                                    <div class="col-md-6">
                                                                        {{ Form::date('dateFinished',' ', ['class' => 'form-control']) }}
                                                                    </div>
                                                            </div> --}}

                                                   {{-- Image of the repair/concern if applicable --}}

                                                   {{-- <div class="form-group row mb-0">
                                                        <label for="" class="col-md-4 col-form-label text-md-right">Image:</label>
                                                        <div class="col-md-6">
                                                            {{Form::file('cover_image', ['class' => 'form-control'])}}
                                                        </div>
                                                </div> --}}
                                                  
                                                

                                                    {{-- The satisfaction for the repair --}}

                                                    {{-- <div class="form-group row">
                                                            <label for="clientSatisfaction" class="col-md-4 col-form-label text-md-right" >Client Satisfaction:</label>
                                                        <div class="col-md-6">
                                                            <select class="form-control" name="isWarranry" id="isWarranty">
                                                                <option value="" disabled selected>Please select</option>    
                                                                <option value="None">None</option>
                                                                <option value="Very Poor">Very Poor</option>
                                                                <option value="Somewhat Unsatisfa   ctory">Somewhat Unsatisfactory</option>
                                                                <option value="Average">Average</option>
                                                                <option value="Very Satisfactory">Very Satisfactory</option>
                                                                <option value="Superior">Superior</option>
                                                            </select>
                                                        </div>
                                                    </div> --}}

                                                
                                    

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
               <br>
    <div class="row">
        <div class="col-lg-12">
                <div class="card-header">
                        <h3>Owners&nbsp<i class="fas fa-user-tie"></i></h3>
                </div>
                <br>
                <div class="panel panel-default">
                        @if(count($owner) > 0)              
                        <table class="table table-striped">
                        <thead>
                            <tr class="thead-dark">
                                <th>#</th>
                                <th>Profile</th>
                                <th>Name</th>
                                <th>Move-In</th>
                                <th>Buying Price</th>
                                <th>DownPayment</th>
                                <th>Form of Payment</th>
                                <th></th>
                             </tr>
                        </thead>
                         @foreach($owner as $owner)
                         <tr>
                            <th>{{ $ownersRowNo++ }}</th>
                            <td><img class="card-img-top" style="width:35px" src="/storage/owner_images/{{$owner->cover_image}}" alt="Card image cap"></td>
                            <td><a href="/propertymgmt/owners/{{$owner->ownerName}}" class="btn btn-primary">{{$owner->name}}</a></td>
                            <td>{{Carbon\Carbon::parse($owner->moveInDate)->formatLocalized('%b %d %Y')}}</td>
                            <td>{{$owner->totalPrice}}</td>
                            <td>{{$owner->downPayment}}</td>
                            <td>{{$owner->formOfPayment}}</td>
                            <td><a href="/propertymgmt/transactions/{{$owner->id}}" class="btn btn-info">MORE</a></td>
                         </tr>
                         @endforeach
                        </table>
                        
                        @else
                        <div class="alert alert-danger" role="alert"><p>No records of owners!</p></div>
                        @endif
                      </div>
            </div>
</div>
                    <a class="btn btn-warning add-owner" role="button" href="#" style="width:150px" ><i class="fas fa-plus-circle fa-1x"></i>&nbspADD OWNER</a> 

       </div>     
       
       <div id="create-owner" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                      <h4 class="owner-title float-left"> </h4>
                    <button class="close" type="button" data-dismiss="modal" >&times;</button>
                      
                </div>

                <div class="modal-body">
                    
                  {!! Form::open(['action'=>'OwnersController@store','method' => 'POST', 'enctype' => 'multipart/form-data', 'class'=>'owner-form'] ) !!}

                  
                <div class="form-group row" >
                    <label for="roomNo" class="col-md-4 col-form-label text-md-right">Room No:<spans style="color:red">&nbsp*</spans></label>
                    <div class="col-md-6">
                        <select name="roomNo" id="roomNo" class="form-control">
                            <option value="{{$room->roomNo}}" selected >
                                {{$room->roomNo}}
                            </option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="ownerName" class="col-md-4 col-form-label text-md-right">Name: <spans style="color:red">&nbsp*</spans></label>
                    <div class="col-md-6">
                        <select name="ownerName" id="ownerName" class="form-control">
                            <option value="" disabled selected>Please select</option>
                                @foreach($registeredOwners as $registeredOwner)
                            <option value="{{$registeredOwner->id}}">
                                {{$registeredOwner->name}}&nbsp|&nbsp{{Carbon\Carbon::parse($registeredResident->created_at)->formatLocalized('%b %d %Y')}}
                            </option>
                                @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="moveInDate" class="col-md-4 col-form-label text-md-right">Move-In Date:</label>
                    <div class="col-md-6">
                        {{ Form::date('moveInDate',\Carbon\Carbon::now(), ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="totalPrice" class="col-md-4 col-form-label text-md-right">Buying Price:</label>
                    <div class="col-md-6">
                        <input name="totalPrice" id="totalPrice" type="number" min="0" class="form-control" value="{{ old('totalPrice') }}"></input>
                    </div>     
                </div>

                {{-- <div class="form-group row">
                    <label for="downPayment" class="col-md-4 col-form-label text-md-right">DownPayment:</label>
                    <div class="col-md-6">
                        {{Form::number('downPayment','',['class'=>'form-control', 'min'=> '0'])}}
                    </div>     
                </div>

                <div class="form-group row">
                    <label for="downPaymentMonthlyAmortization" class="col-md-4 col-form-label text-md-right">DownPayment Monthly Amortization:</label>
                    <div class="col-md-6">
                        {{Form::number('downPaymentMonthlyAmortization','',['class'=>'form-control', 'min' => '0'])}}
                    </div>     
                </div>

                <div class="form-group row">
                    <label for="monthlyAmortization" class="col-md-4 col-form-label text-md-right">Monthly Amortization:</label>
                    <div class="col-md-6">
                        {{Form::number('monthlyAmortization','',['class'=>'form-control', 'min' => '0'])}}
                    </div>     
                </div>

                <div class="form-group row">
                    <label for="formOfPayment" class="col-md-4 col-form-label text-md-right">Form of Payment:</label>
                        <div class="col-md-6">
                            <select class="form-control" name="formOfPayment" id="formOfPayment">
                                <option value="" selected disabled>Please select</option>    
                                <option value="PAG-IBIG">PAG-IBIG</option>
                                <option value="Cash">Cash</option>
                                <option value="Installment">Installment</option>
                                <option value="Others">Others</option>                
                            </select>
                        </div>   
                    </div>
                  
                   --}}
                </div>

                <div class="modal-footer">
                    <div class="col-md-5 float-right">
                        <button class="btn btn-danger" data-dismiss="modal" type="button">CLOSE</button>              
                            {{Form::submit('SUBMIT',['class'=>'btn btn-warning', 'float'=>'right'])}}
                            {!! Form::close() !!}            
                    </div>
                </div>


                    
            </div>
            <div class="acasa">  ssdfsf</div>
                       
    </div> 

    
            </div>
          
        </div>

        

        <div class="card-footer">

        </div>
    </div>
<br>
@endsection


