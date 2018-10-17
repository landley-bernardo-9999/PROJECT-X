@extends('layouts.app')
@section('content')
<br>
    <a class="btn btn-secondary btn-md" role="button" href="/rooms"><i class="fas fa-arrow-circle-left"></i></a>
    <a href="{{$room->roomNo}}/edit" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
    {!!Form::open(['action' => ['RoomsController@destroy', $room->roomNo], 'method' => 'POST', 'class' =>'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}  
                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
<br>
<br>
<h3>{{$room->roomNo}}</h3>
    <div class="container">
       <hr>
       <div class="row">
            <div class="col-lg-9">
                    <table class="table table-striped">
                        <tr>
                            <th>Under Leasing?</th>
                            <td>{{$room->isUnderLeasing}}</td>
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
                            <th>Rent </th>
                            <td>{{$room->rentalFee}}</td>
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
                    
                        <h3>Residents</h3>

                        <div class="panel panel-default">
                            @if(count($resident) > 0)             
                            <table class="table">
                             <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Move-In Date</th>
                                <th>Mobile Number</th>
                                <th>Email Address</th>
                               
                             </tr>
                            @foreach($resident as $resident)
                             <tr>
                                <td>{{ $residentsRowNo++ }}</td>
                                <td><a href="/residents/{{$resident->id}}">{{$resident->name}}</a></td>
                                <td>{{$resident->residentStatus}}</td>
                                <td>{{$resident->created_at}}</td>
                                <td>{{$resident->mobileNumber}}</td>
                                <td>{{$resident->emailAddress}}</td>
                             </tr>
                            @endforeach
                            </table>
                            @else
                            <div class="alert alert-success" role="alert"><p>No records of residents!</p></div>
                            @endif
                          </div>
                          <a class="btn btn-secondary btn-md" role="button" href="/residents/create"><i class="fas fa-user-plus"></i></a>  
                   <br>
                   <br>
                    <div>
                            <h3>Repairs</h3>
                             <div class="panel panel-default">
                            @if(count($repair) > 0)              
                            <table class="table table-striped">
                             <tr>
                                <th>No</th>
                                <th>Date Reported</th>
                                <th>Reported By</th>
                                <th>Description</th>
                                <th>Endorse To</th>
                                <th>Status</th>
                                
                                <th>Cost</th>
                                <th></th>
                             </tr>
                             @foreach($repair as $repair)
                             <tr>
                                <td>{{ $repairsRowNo++ }}</td>
                                <td>{{ $repair->dateReported}}</td>
                                <td>{{$repair->name}}</td>
                                <td>{{$repair->desc}}</td>
                                <td>{{$repair->endorsedTo}}</td>
                                <td>{{$repair->repairStatus}}</td>
                                
                                <td>{{$repair->cost}}</td>
                                <td><a href="/repairs/{{$repair->id}}" class="btn btn-secondary"><i class="far fa-eye"></i></a></td>
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
                        <h3>Owners</h3>
                        <div class="panel panel-default">
                                @if(count($owner) > 0)              
                                <table class="table table-striped">
                                 <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Move-In Date</th>
                                    <th>Mobile Number</th>
                                    <th>Email Address</th>
                                 </tr>
                                 @foreach($owner as $owner)
                                 <tr>
                                    <td>{{ $ownersRowNo++ }}</td>
                                    <td><a href="/owners/{{$owner->id}}">{{$owner->name}}</a></td>
                                    <td>{{$owner->created_at}}</td>
                                    <td>{{$owner->mobileNumber}}</td>
                                    <td>{{$owner->emailAddress}}</td>
                                 </tr>
                                 @endforeach
                                </table>
                                @else
                                <div class="alert alert-success" role="alert"><p>No records of owners!</p></div>
                                @endif
                              </div>
                    </div>
                    <a class="btn btn-secondary btn-md" role="button" href="/owners/create"><i class="fas fa-user-plus"></i></a>
                    <div>
                        <br>
                    </div> 
            </div>
                <div class="col-lg-3">
                    <div class="card" style="width: 20rem" >
                        <img class="card-img-top" src="/storage/cover_images/{{$room->cover_image}}" alt="Card image cap">
                      </div>
                </div>

                
       </div>        
    </div>
@endsection

