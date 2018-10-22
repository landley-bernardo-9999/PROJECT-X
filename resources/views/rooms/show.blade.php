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
<hr>
<h3>Room&nbsp<i class="fas fa-store-alt"></i></h3>
<br>
    <div class="container-fluid">
       <div class="row">
            <div class="col-lg-9">
                    <table class="table">
                        <tr>
                            <th>Room No</th>
                            <td>{{$room->roomNo}}</td>
                        </tr>
                        <tr>
                            <th>Enrolled?</th>
                            <td>{{$room->enrolled}}</td>
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

            <div class="col-lg-3">
                <div class="card" style="width: 20rem" >
                    <img class="card-img-top" src="/storage/cover_images/{{$room->cover_image}}" alt="Card image cap">
                  </div>
            </div>
        </div>

        <hr>
            <div class="row">
                <div class="col-lg-12">
                    <h3>Residents&nbsp<i class="fas fa-users"></i></h3>
                    <br>
                    <div class="panel panel-default">
                        @if(count($resident_contract) > 0)             
                        <table class="table table-striped">
                         <tr>
                            <th>No</th>
                            <th>Profile</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Move-In</th>
                            <th>Move-Out</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Reason for Moving-Out</th>
                           
                         </tr>
                        @foreach($resident_contract as $resident_contract)
                         <tr>
                            <td>{{ $residentsRowNo++ }}</td>
                            <td><img class="card-img-top" style="width:35px" src="/storage/resident_images/{{$resident_contract->cover_image}}" alt="Card image cap"></td>
                            <td><a href="/residents/{{$resident_contract->residentName}}" class="btn btn-secondary">{{$resident_contract->name}}</a></td>
                                
                            <td>{{$resident_contract->residentStatus}}</td>
                            <td>{{$resident_contract->moveInDate}}</td>
                            <td>{{$resident_contract->moveOutDate}}</td>
                            <td>{{$resident_contract->mobileNumber}}</td>
                            <td>{{$resident_contract->emailAddress}}</td>
                            <td><a href="/contracts/{{$resident_contract->id}}" class="btn btn-secondary">{{$resident_contract->reasonForMovingOut}}</td>
                         </tr>
                        @endforeach
                        </table>
                        @else
                        <div class="alert alert-success" role="alert"><p>No records of residents!</p></div>
                        @endif
                      </div>
                      {{-- <a class="btn btn-secondary btn-md" role="button" href="/residents/create"><i class="fas fa-user-plus"></i></a>   --}}
                </div>
            </div>
            <hr>
                <div class="row">
                         <div class="col-lg-12">
                                 <h3>Repairs&nbsp<i class="fas fa-toolbox"></i></h3>
                                 <br>
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
                                     <td><a href="/repairs/{{$repair->id}}" class="btn btn-secondary">MORE INFO</a></td>
                                  </tr>
                                  @endforeach
                                 </table>
                                 @else
                                 <div class="alert alert-success" role="alert"><p>No records of repairs!</p></div>
                                 @endif
                               </div>
                                   {{-- <a class="btn btn-secondary btn-md" role="button" href="/repairs/create"><i class="fas fa-plus-circle fa-1x"></i></a>   --}}
                         </div>
                </div>
                <hr>
    <div class="row">
        <div class="col-lg-12">
                <h3>Owners&nbsp<i class="fas fa-user-tie"></i></h3>
                <br>
                <div class="panel panel-default">
                        @if(count($owner) > 0)              
                        <table class="table table-striped">
                         <tr>
                            <th>No</th>
                            <th>Profile</th>
                            <th>Name</th>
                            <th>Move-In</th>
                            <th>Mobile</th>
                            <th>Email</th>
                         </tr>
                         @foreach($owner as $owner)
                         <tr>
                            <td>{{ $ownersRowNo++ }}</td>
                            <td><img class="card-img-top" style="width:35px" src="/storage/owner_images/{{$owner->cover_image}}" alt="Card image cap"></td>
                            <td><a href="/owners/{{$owner->id}}" class="btn btn-secondary">{{$owner->name}}</a></td>
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
</div>
                    {{-- <a class="btn btn-secondary btn-md" role="button" href="/owners/create"><i class="fas fa-user-plus"></i></a> --}}

       </div>        
   
@endsection

