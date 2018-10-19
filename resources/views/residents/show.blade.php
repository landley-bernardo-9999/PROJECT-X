@extends('layouts.app')
@section('content')
<br>
    <a class="btn btn-secondary btn-md" role="button" href="/residents"><i class="fas fa-arrow-circle-left"></i></a>
    <a class="btn btn-secondary btn-md" role="button" href="/rooms"> <i class="fas fa-store-alt"></i></a>
    <a href="{{$resident->id}}/edit" class="btn btn-secondary"><i class="fas fa-user-edit"></i></a>
    {!!Form::open(['action' => ['ResidentsController@destroy', $resident->id], 'method' => 'POST', 'class' =>'float-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}  
        {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
<br> 
<br>
<h3>{{$resident->name}}&nbsp<i class="fas fa-users"></i></h3>
<hr>
    <div class="container">
       <div class="row">
            <div class="col-lg-9">
                <table class="table table-striped">
                    <tr>
                        <th>Birthdate</th>
                        <td>{{$resident->birthDate}}</td>
                    </tr>
                    <tr>
                        <th>Room No</th>
                        <td>{{$resident->roomNo}}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{$resident->residentStatus}}</td>
                    </tr>
                    <tr>
                        <th>Security Deposit</th>
                        <td>{{$resident->securityDeposit}}</td>
                    </tr>
                    <tr>
                        <th>Move-in Date</th>
                        <td>{{$resident->moveInDate}}</td>
                    </tr>
                    <tr>
                        <th>Move-out Date</th>
                        <td>{{$resident->moveOutDate}}</td>
                    </tr>
                    <tr>
                        <th>Email Address</th>
                        <td>{{$resident->emailAddress}}</td>
                    </tr>
                    <tr>
                        <th>Mobile Number</th>
                        <td>{{$resident->mobileNumber}}</td>
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
                        <th>Year Level</th>
                        <td>{{$resident->yearLevel}}</td>
                    </tr>
                    </table>
                    <br>
                    <div>
                        <h3>Concerns&nbsp<i class="fas fa-toolbox"></i></h3>
                        <br>
                         <div class="panel panel-default">
                        @if(count($repair) > 0)              
                        <table class="table table-striped">
                         <tr>
                            <th>No</th>
                            <th>Date Reported</th>
                            <th>Description</th>
                            <th>Endorse To</th>
                            <th>Status</th>
                            <th>Cost</th>
                            <th></th>
                         </tr>
                         @foreach($repair as $repair)
                         <tr>
                            <td>{{ $rowNoForConcerns++ }}</td>
                            <td>{{$repair->dateReported}}</td>
                            <td>{{$repair->desc}}</td>
                            <td>{{$repair->endorsedTo}}</td>
                            <td>{{$repair->repairStatus}}</td>
                            <td>{{$repair->cost}}</td>
                            <td><a href="/repairs/{{$repair->id}}">MORE INFO</a></td>
                            
                         </tr>
                         @endforeach
                        </table>
                        @else
                        <div class="alert alert-success" role="alert"><p>No records of repairs!</p></div>
                        @endif
                      </div>
                          <a class="btn btn-secondary btn-md" role="button" href="/repairs/create"><i class="fas fa-plus-circle fa-1x"></i></a>  
                </div>
                <br>
                <div>
                    <h3>Violations&nbsp<i class="fas fa-user-times"></i></h3>
                    <br>
                     <div class="panel panel-default">
                    @if(count($violation) > 0)              
                    <table class="table table-striped">
                     <tr>
                        <th>No</th>
                        <th>Date Reported</th>
                        <th>Description</th>
                        <th>Date Committed</th>
                        <th>Reported By</th>
                        <th>Fine</th>
                        <th></th>
                     </tr>
                     @foreach($violation as $violation)
                     <tr>
                        <td>{{ $rowNoForViolations++ }}</td>
                        <td>{{ $violation->dateReported }}</td>
                        <td>{{ $violation->description }}</td>
                        <td>{{ $violation->dateCommitted }}</td>
                        <td>{{ $violation->reportedBy }}</td>
                        <td>{{ $violation->fine }}</td>
                        <td><a href="/violations/{{$violation->id}}">MORE INFO</a></td>
                     </tr>
                     @endforeach
                    </table>
                    @else
                    <div class="alert alert-success" role="alert"><p>No records of violations!</p></div>
                    @endif
                  </div>
                      <a class="btn btn-secondary btn-md" role="button" href="/violations/create"><i class="fas fa-plus-circle fa-1x"></i></a>  
            </div>
                <br>      
                </div>             
                <div class="col-lg-3">
                    <div class="card" style="width: 20rem" >
                        <img class="card-img-top" src="/storage/resident_images/{{$resident->cover_image}}" alt="Card image cap">
                </div>
                </div>
       </div>
    </div>
     
        
@endsection

