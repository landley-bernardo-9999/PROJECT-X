@extends('layouts.app')
@section('content')
<br>
    <a class="btn btn-dark" role="button" href="/propertymgmt/residents" style="width:155px"><i class="fas fa-arrow-circle-left"></i>&nbspBACK</a>
    <a class="btn btn-dark" role="button" href="/propertymgmt/rooms" style="width:155px"> <i class="fas fa-store-alt"></i>&nbspROOMS</a>
    <a href="{{$resident->id}}/edit" class="btn btn-danger float-right" style="width:155px"><i class="fas fa-user-edit"></i>&nbspEDIT</a>
    {{-- {!!Form::open(['action' => ['ResidentsController@destroy', $resident->id], 'method' => 'POST', 'class' =>'float-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}  
        {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
    {!!Form::close()!!} --}}
<br> 
<br>
<hr>
<h3>Resident&nbsp<i class="fas fa-users"></i></h3>
<br>
    <div class="container-fluid">
       <div class="row">
            <div class="col-lg-9">
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
            <div class="col-lg-3">
                <div class="card" style="width: 20rem" >
                    <img class="card-img-top" src="/storage/resident_images/{{ $resident->cover_image }}" alt="Card image cap">
                </div>
            </div>
        </div>  
    
        <div class="row">
            <div class="col-lg-12">
            <hr>
            <h3>Rooms&nbsp<i class="fas fa-store-alt"></i></h3>
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
                        <td><a href="/propertymgmt/contracts/{{$contract->contractId}}" class="btn btn-info">CONTRACT</a></td>        
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
                <hr>
                    <h3>Concerns/Repairs&nbsp<i class="fas fa-toolbox"></i></h3>
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
                          <a class="btn btn-warning" role="button" href="/repairs/create" style="width:160px"><i class="fas fa-plus-circle fa-1x"></i>&nbspADD REPAIR</a>  
                </div>
                <br>
                    </div>
                    <br>
                <hr>
       
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Violations&nbsp<i class="fas fa-user-times"></i></h3>
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
                                    
                                </tr>
                                @endforeach
                             </tbody>
                            
                            </table>
                            @else
                            <div class="alert alert-danger" role="alert"><p>No records of violations!</p></div>
                            @endif
                          </div>
                               <a class="btn btn-warning" role="button" href="/violations/create" style="width:160px"><i class="fas fa-plus-circle fa-1x"></i>&nbspADD VIOLATION</a>   --}}
                    </div>
                        <br>      
                        </div>         
                        </div>
                    </div>
    </div>
    </div>
    <br>
     
        
@endsection

