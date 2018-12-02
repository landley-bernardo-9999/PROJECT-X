@extends('layouts.style')
@section('content')
@include('includes.messages')
<div id="edit-resident-info" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                  <h4 class="edit-resident-info-title float-left"> </h4>
                <button class="close" type="button" data-dismiss="modal" >&times;</button>
                  
            </div>

            <div class="modal-body">
                {!! Form::open(['action'=>['ResidentsController@update', $resident->id],'method' => 'POST', 'enctype' => 'multipart/form-data', 'class'=>'edit-resident-info-form']) !!}
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                    <div class="col-md-6">
                        {{Form::text('name',$resident->name,['class'=>'form-control'])}}
                    </div>
                </div>
                    
                    <div class="form-group row">
                            <label for="birthDate" class="col-md-4 col-form-label text-md-right">birthDate</label>
                            <div class="col-md-6">
                                {{ Form::date('birthDate',$resident->birthDate, ['class' => 'form-control']) }}
                            </div>
                    </div>

                    <div class="form-group row">
                            <label for="residentStatus" class="col-md-4 col-form-label text-md-right">Status</label>
                            <div class="col-md-6">
                            <select class="form-control" name="residentStatus" id="residentStatus">
                                <option value="{{$resident->residentStatus}}" selected>{{$resident->residentStatus}}</option>    
                                <option value="Pending">Pending</option>
                                <option value="Moving-in">Moving-in</option>
                                <option value="Active">Active</option>
                                <option value="Pre-terminated">Pre-terminated</option>
                                <option value="Extended">Extended</option>
                                <option value="Moving-out">Moving-out</option>
                                <option value="Inactive">Inactive</option>
                                <option value="Evicted">Evicted</option>
                            </select>
                            </div>   
                    </div>
                  
                    <div class="form-group row">
                            <label for="school" class="col-md-4 col-form-label text-md-right">School</label>
                            <div class="col-md-6">
                                    {{Form::text('school',$resident->school,['class'=>'form-control'])}}
                     
                            </div>
                        </div>

                   
                        <div class="form-group row">
                                <label for="course" class="col-md-4 col-form-label text-md-right">Course</label>
                                <div class="col-md-6">
                                        {{Form::text('course',$resident->course,['class'=>'form-control'])}}
                                </div>
                            </div>  
                            
                            <div class="form-group row">
                                    <label for="yearLevel" class="col-md-4 col-form-label text-md-right">Year Level</label>
                                    <div class="col-md-6">
                                        {{Form::number('yearLevel',$resident->yearLevel,['class'=>'form-control', 'min'=>'1'])}}
                                    </div>
                                </div>  
               
                                <div class="form-group row">
                                        <label for="mobileNumber" class="col-md-4 col-form-label text-md-right">Mobile Number</label>
                                        <div class="col-md-6">
                                            {{Form::text('mobileNumber',$resident->mobileNumber,['class'=>'form-control'])}}
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                            <label for="emailAddress" class="col-md-4 col-form-label text-md-right">Email Address</label>
                                            <div class="col-md-6">
                                                    {{Form::email('emailAddress',$resident->emailAddress,['class'=>'form-control','placeholder'=>'Email Address'])}}
                                            </div>
                                        </div>       
                                
                                        <div class="form-group row mb-0">
                                            <label for="" class="col-md-4 col-form-label text-md-right">Image:</label>
                                            <div class="col-md-6">
                                                {{Form::file('cover_image', ['class' => 'form-control'])}}
                                            </div>
                                    </div>
                   
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

<div class="card">
    <div class="card-header">
            <a class="btn btn-dark" role="button" href="/propertymgmt/residents/" ><i class="fas fa-arrow-circle-left"></i>&nbspBACK</a>
  
            <a href="#" class="btn btn-primary edit-resident-info"><i class="fas fa-user-edit"></i>&nbspEDIT</a>
            {!!Form::open(['action' => ['ResidentsController@destroy', $resident->id],'id' => 'FormDeleteTime','method' => 'POST', 'class' =>'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}  
                {{Form::submit('DELETE',['class' => 'btn btn-danger'])}}
            {!!Form::close()!!} 
    </div>

    <div class="card-body">


<div class="card-header">
        <h3>Resident&nbsp<i class="fas fa-users"></i></h3>
</div>
<br>
    <div class="container-fluid">
       <div class="row">
            <div class="col-lg-8">
                <table class="table table-striped">
                    <tr>
                        <th>Name</th>
                        <td>{{$resident->name}}</td>
                    </tr>   
                    <tr>
                        <th>Birthdate</th>
                        <td>{{Carbon\Carbon::parse($resident->birthDate)->formatLocalized('%b %d %Y')}}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{$resident->residentStatus}}</td>
                    </tr>
                    <tr>
                        <th>School</th>
                        <td>{{$resident->school}}</td>
                    </tr>
                    <tr>
                        <th>Course</th>
                        <td>{{$resident->course}}</td>
                    </tr>
                    <tr>
                        <th>YearLevel</th>
                        <td>{{$resident->yearLevel}}</td>
                    </tr>
                    <tr>
                        <th>Mobile</th>
                        <td>{{$resident->mobileNumber}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$resident->emailAddress}}</td>
                    </tr> 
                    </table>
            </div>
            <div class="col-lg-4">
                <div class="card" >
                    <img class="card-img-top" src="/storage/resident_images/{{ $resident->cover_image }}" alt="Card image cap">
                </div>
            </div>
        </div>  
    
        <div class="row">
            <div class="col-lg-12">
                <div class="card-header">
                        <h3>Rooms&nbsp<i class="fas fa-store-alt"></i></h3>
                </div>
            <br>
            <div class="panel panel-default">
            @if(count($contract) > 0)              
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Room</th>
                        <th>Status</th>
                        <th>Rent</th>
                        <th>Deposit</th>
                        <th>Term</th>
                        <th>Move-In</th>
                        <th>Move-Out</th>   
                        <th></th>        
                    </tr>
                </thead>
                <tbody>
                @foreach($contract as $contract)
                    <tr>
                        <td>{{ $rowNoForContracts++ }}</td>
                        <td><a href="/propertymgmt/rooms/{{$contract->residentRoomNo}}" class="btn btn-primary">{{ $contract->residentRoomNo }}</a></td>
                        <td>{{ $contract->residentStatus }}</td>
                        <td>{{ $contract->amountPaid }}</td>
                        <td>{{ $contract->securityDeposit}}</td>
                        <td>{{ $contract->term}}</td>
                        <td>{{ Carbon\Carbon::parse($contract->moveInDate)->formatLocalized('%b %d %Y')}}</td>
                        <td>{{ Carbon\Carbon::parse($contract->moveOutDate)->formatLocalized('%b %d %Y') }}</td>
                        <td><a href="/propertymgmt/contracts/{{$contract->contractId}}" class="btn btn-info">MORE</a></td>        
                    </tr>
                @endforeach
                </tbody>   
            </table>
                @else
                    <div class="alert alert-danger" role="alert"><p>No records of contracts!</p></div>
                @endif
            <br>
        </div>
        
        <br> 
            <div class="row">
                <div class="col-lg-12">
                <div class="card-header">
                        <h3>Concerns/Repairs&nbsp<i class="fas fa-toolbox"></i></h3>
                </div>
                <br>
                    <div class="panel panel-default">
                        @if(count($repair) > 0)              
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Date Reported</th>
                                        <th>Description</th>
                                        <th>Endorse To</th>
                                        <th>Status</th>
                                        <th>Cost</th>   
                                        
                                    </tr>
                                </thead>
                         
                                <tbody>
                                        @foreach($repair as $repair)
                                    <tr>
                                        <td>{{ $rowNoForConcerns++ }}</td>
                                        <td>{{Carbon\Carbon::parse($repair->dateReported)->format('F j, Y')}}</td>
                                        <td>{{$repair->desc}}</td>
                                        <td>{{$repair->endorsedTo}}</td>
                                        <td>{{$repair->repairStatus}}</td>
                                        <td>{{$repair->cost}}</td>
                                        
                                        </tr>
                                        @endforeach
                                </tbody>
                        
                    </table>
                        @else
                        <div class="alert alert-danger" role="alert"><p>No records of concerns/repairs!</p></div>
                        @endif
                      </div>
                      {{-- <a class="btn btn-warning add-repair" role="button" href="#" style="width:150px" ><i class="fas fa-plus-circle fa-1x"></i>&nbspADD REPAIR</a> --}}
                </div>
                <br>
                    </div>
                    <br>
               
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-header">
                                    <h3>Violations&nbsp<i class="fas fa-user-times"></i></h3>
                            </div>
                            <br>
                             <div class="panel panel-default">
                            @if(count($violation) > 0)              
                            <table class="table">
                             <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Date Reported</th>
                                    <th>Description</th>
                                    <th>Date Committed</th>
                                    <th>Reported By</th>
                                    <th>Fine</th>
                                    <th></th>
                                    
                                </tr>
                             </thead>
                             
                             <tbody>
                                    @foreach($violation as $violation)
                                <tr>
                                    <td>{{ $rowNoForViolations++ }}</td>
                                    <td>{{ $violation->dateReported }}</td>
                                    <td>{{ $violation->description }}</td>
                                    <td>{{Carbon\Carbon::parse($violation->dateCommitted)->formatLocalized('%b %d %Y')}}</td>
                                    <td>{{Carbon\Carbon::parse( $violation->reportedBy)->formatLocalized('%b %d %Y')}}</td>
                                    <td>{{ $violation->fine }}</td>
                                    <td><a href="/propertymgmt/violations/{{$violation->id}}" class="btn btn-info">MORE</a></td>
                                </tr>
                                @endforeach
                             </tbody>
                            
                            </table>
                            @else
                            <div class="alert alert-danger" role="alert"><p>No records of violations!</p></div>
                            @endif
                          </div>
                                <a class="btn btn-warning add-violation" role="button" href="#"><i class="fas fa-plus-circle fa-1x"></i>&nbspADD VIOLATION</a>  
                    </div>
                        <br>      
                        </div>
                                 
                        </div>
                    </div>

            {{-- Start of billing section for the resident --}}
                    <br>
                    <div class="row">
                            <div class="col-lg-12">
                                <div class="card-header">
                                        <h3>Billings&nbsp<i class="fas fa-hand-holding-usd"></i></h3>
                                </div>
                                <br>
                                 <div class="panel panel-default">
                                            
                                <table class="table">
                                 <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>Paid</th>
                                        <th>Balance</th>
                                        <th>Surcharge</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                 </thead>
                                 
                                 <tbody>
                                        
                                    <tr>
                                        <td>1</td>
                                        <td>Dec 01 2018</td>
                                        <td>November Monthly Rent</td>
                                        <td>6000</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td><a href="#" class="btn btn-info">MORE</a></td>
                                    </tr>
                                    
                                 </tbody>
                                
                                </table>
                               
                              </div>
                                    <a class="btn btn-warning add-violation" role="button" href="#"><i class="fas fa-plus-circle fa-1x"></i>&nbspADD VIOLATION</a>  
                        </div>
                            <br>      
                            </div> 

                    {{-- End of billing section for the resident --}}
    </div>
    </div>
    <br>

    <div id="add-violation" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                      <h4 class="add-violation-title float-left"> </h4>
                    <button class="close" type="button" data-dismiss="modal" >&times;</button>
                      
                </div>
    
                <div class="modal-body">
                    {!! Form::open(['action'=>'ViolationsController@store','method' => 'POST', 'enctype' => 'multipart/form-data', 'class'=>'add-violation-form']) !!}
                   
                    <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label text-md-right">Date Reported:</label>
                        <div class="col-md-6">
                            {{ Form::date('dateReported',\Carbon\Carbon::now(), ['class' => 'form-control']) }}
                        </div>
                    </div>


                      <!--Select Name of the resident or owner-->
                <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label text-md-right">Name:<span style="color:red">&nbsp*</span></label>
                    
                    <div class="col-md-6">
                        <select name="name" id="name" class="form-control">
                        <option value="{{$resident->id}}" selected>{{$resident->name}}</option>
                        </select>
                    </div>
                    </div>
                <!--Select Room No of the resident or owner-->
                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">Room No:</label>
                
                <div class="col-md-6">
                    <select name="roomNo" id="roomNo" class="form-control">
                    <option value="{{$contract->residentRoomNo}}" selected>{{$contract->residentRoomNo}}</option>
                        
                    </select>
                </div>
                </div>


                <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">Description:<span style="color:red">&nbsp*</span></label>
                        <div class="col-md-6">
                            <select name="description" id="description" class="form-control">
                                <option value=" " selected >Please select</option>
                                <option value="Smoking">Smoking</option>
                                <option value="Drinking of Liquor">Drinking of Liquor</option>
                                <option value="Noisy">Noisy</option>
                                <option value="Garbage Disposal">Garbage Disposal</option>
                                <option value="Parking Policy">Parking Policy</option>
                                <option value="Pet Policy">Pet Policy</option>
                                <option value="Use of Common Areas">Use of Common Areas</option>
                                <option value="Loitering">Loitering</option>
                                <option value="Others">Others</option>
                                    
                                </select>
                        </div>
                    </div> 
              
                    <div class="form-group row">
                            <label for="details" class="col-md-4 col-form-label text-md-right">Details of the violation:</label>
                            <div class="col-md-6">
                                    {{Form::textarea('details','',['class'=>'form-control'])}}
                            </div>
                        </div>
                    
                        <div class="form-group row">
                                <label for="dateCommitted" class="col-md-4 col-form-label text-md-right">Date Committed:</label>
                                <div class="col-md-6">
                                    {{ Form::date('dateCommitted',\Carbon\Carbon::now(), ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label for="reportedBy" class="col-md-4 col-form-label text-md-right">Reported By:<span style="color:red">&nbsp*</span></label>
                                    <div class="col-md-6">
                                            {{Form::text('reportedBy','',['class'=>'form-control'])}}
                                    </div>
                                </div>
                                
                <div class="form-group row">
                    <label for="fine" class="col-md-4 col-form-label text-md-right">Fine:<span style="color:red">&nbsp*</span></label>
                    <div class="col-md-6">
                        {{Form::number('fine','',['class'=>'form-control'])}}
                    </div>     
                </div> 
         
              <div class="form-group row">
                            <label for="actionTaken" class="col-md-4 col-form-label text-md-right">Action/s Taken:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-6">
                                    {{Form::text('actionTaken','',['class'=>'form-control'])}}

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
    
   
</div>

    
</div>

</div>
@endsection

