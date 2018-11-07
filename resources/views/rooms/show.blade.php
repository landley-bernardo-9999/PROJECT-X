@extends('layouts.app')
@section('content')
<br>
    <a class="btn btn-dark" role="button" href="/rooms" style="width:155px"><i class="fas fa-arrow-circle-left"></i>&nbspBACK</a>
    <a href="{{$room->roomNo}}/edit" class="btn btn-danger float-right" style="width:155px" ><i class="fas fa-edit"></i>&nbspEDIT</a>
    {{-- {!!Form::open(['action' => ['RoomsController@destroy', $room->roomNo], 'method' => 'POST', 'class' =>'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}  
                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
            {!!Form::close()!!} --}}
<br>
<br>
<hr>
<h3>Room&nbsp<i class="fas fa-store-alt"></i></h3>
<br>
    <div class="container-fluid">
       <div class="row">
            <div class="col-lg-9">
                    <table class="table table-striped">
                        <tr>
                            <th>Room No</th>
                            <td>{{$room->roomNo}}</td>
                        </tr>
                        <tr>
                            <th>Accepted?</th>
                            <td>{{$room->isAccepted}}</td>
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
                    
                    <h3>Residents&nbsp <i class="fas fa-users"></i></h3>
                    <br>
                    <div class="panel panel-default">
                        @if(count($resident_contract) > 0)             
                        <table class="table table-striped">
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
                        @foreach($resident_contract as $resident_contract)
                         <tr>
                            <th>{{ $residentsRowNo++ }}</th>
                            <td><img class="card-img-top" style="width:35px" src="/storage/resident_images/{{$resident_contract->cover_image}}" alt="Card image cap"></td>
                            <td><a href="/residents/{{$resident_contract->residentName}}" class="btn btn-primary">{{$resident_contract->name}}</a></td>
                                
                            <td>{{$resident_contract->residentStatus}}</td>
                            <td>{{$resident_contract->term}}</td>
                            <td>{{$resident_contract->amountPaid}}</td>
                            <td>{{Carbon\Carbon::parse($resident_contract->moveInDate)->format('F j, Y')}}</td>
                            <td>{{Carbon\Carbon::parse($resident_contract->moveOutDate)->format('F j, Y')}}</td>
                            <td><a href="/contracts/{{$resident_contract->id}}" class="btn btn-info">MORE INFO</td>
                         </tr>
                        @endforeach
                        </table>
                        @else
                        <div class="alert alert-danger" role="alert"><p>No records of residents!</p></div>
                        @endif
                      </div>
                      <a class="btn btn-warning" role="button" href="/contracts/create" style="width:150px"><i class="fas fa-plus-circle fa-1x"></i>&nbspADD RESIDENT</a> 
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
                                    <thead>
                                            <tr>
                                                    <th>#</th>
                                                    <th>Date Reported</th>
                                                    <th>Reported By</th>
                                                    <th>Description</th>
                                                    <th>Endorse To</th>
                                                    <th>Status</th>
                                                    
                                                    <th>Cost</th>
                                                    <th></th>
                                    </thead>
                                  </tr>
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
                                     <td><a href="/repairs/{{$repair->id}}" class="btn btn-info">MORE INFO</a></td>
                                  </tr>
                                  @endforeach
                                </tbody>
                                
                                 </table>
                                 @else
                                 <div class="alert alert-danger" role="alert"><p>No records of repairs!</p></div>
                                 @endif
                               </div>
                                   <a class="btn btn-warning" role="button" href="/repairs/create" style="width:150px"><i class="fas fa-plus-circle fa-1x"></i>&nbspADD REPAIR</a>  
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
                            <th>#</th>
                            <th>Profile</th>
                            <th>Name</th>
                            <th>Move-In</th>
                            <th>Buying Price</th>
                            <th>DownPayment</th>
                            <th>Form of Payment</th>
                            <th></th>
                         </tr>
                         @foreach($owner as $owner)
                         <tr>
                            <th>{{ $ownersRowNo++ }}</th>
                            <td><img class="card-img-top" style="width:35px" src="/storage/owner_images/{{$owner->cover_image}}" alt="Card image cap"></td>
                            <td><a href="/owners/{{$owner->ownerName}}" class="btn btn-primary">{{$owner->name}}</a></td>
                            <td>{{Carbon\Carbon::parse($owner->moveInDate)->format('F j, Y')}}</td>
                            <td>{{$owner->totalPrice}}</td>
                            <td>{{$owner->downPayment}}</td>
                            <td>{{$owner->formOfPayment}}</td>
                            <td><a href="/transactions/{{$owner->id}}" class="btn btn-info">MORE INFO</a></td>
                         </tr>
                         @endforeach
                        </table>
                        
                        @else
                        <div class="alert alert-danger" role="alert"><p>No records of owners!</p></div>
                        @endif
                      </div>
            </div>
</div>
                    <a class="btn btn-warning" role="button" href="/transactions/create" style="width:150px" ><i class="fas fa-plus-circle fa-1x"></i>&nbspADD OWNER</a> 

       </div>        
   <br>
@endsection

