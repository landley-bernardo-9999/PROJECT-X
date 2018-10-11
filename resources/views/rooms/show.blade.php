@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-1">
            <a class="btn btn-secondary btn-md" role="button" href="/rooms"><i class="fas fa-arrow-circle-left"></i>&nbspBack</a>
        </div>

        <div class="col-lg-1">
            <a href="{{$room->roomNo}}/edit" class="btn btn-secondary"><i class="fas fa-edit"></i>&nbspEdit</a>
        </div>

        <div class="col-lg-1">
            {!!Form::open(['action' => ['RoomsController@destroy', $room->roomNo], 'method' => 'POST', 'class' =>'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}  
                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        </div>

    </div>
</div>
<br>
<h1>{{$room->roomNo}}</h1>
    <div class="container">
       <hr>
       <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                    <table class="table">
                        <tr>
                            <th>Building:</th>
                            <td>{{$room->building}}</td>
                        </tr>
                        <tr>
                            <th>Status:</th>
                            <td>{{$room->roomStatus}}</td>
                        </tr>
                        <tr>
                            <th>Rent: </th>
                            <td>{{$room->rentalFee}}</td>
                        </tr>
                        <tr>
                            <th>Size:</th>
                            <td>{{$room->size}}</td>
                        </tr>
                        <tr>
                            <th>Capacity:</th>
                            <td>{{$room->capacity}}</td>
                        </tr>
                        <tr>
                            <th>Updated:</th>
                            <td>&nbsp{{$room->updated_at}}</td>
                        </tr>  
                    </table>
                    
                        <h1>Residents</h1>

                        <div class="panel panel-default">
                            @if(count($resident) > 0)             
                            <table class="table">
                             <tr>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Since</th>
                                <th>Mobile Number</th>
                                <th>Email Address</th>
                             </tr>
                            @foreach($resident as $resident)
                             <tr>
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
                          <a class="btn btn-secondary btn-md" role="button" href="/residents/create"><i class="fas fa-plus-circle fa-1x"></i>&nbspResident</a>  
                   
                    <div>
                            <h1>Repairs</h1>
                             <div class="panel panel-default">
                            @if(count($repair) > 0)              
                            <table class="table">
                             <tr>
                                <th>Date Reported</th>
                                <th>Description</th>
                                <th>Endorse To</th>
                                <th>Status</th>
                                <th>Date Finished</th>
                                <th>Cost</th>
                             </tr>
                             @foreach($repair as $repair)
                             <tr>
                                <td><a href="/repairs/{{$repair->id}}">{{$repair->dateReported}}</a></td>
                                <td>{{$repair->desc}}</td>
                                <td>{{$repair->endorsedTo}}</td>
                                <td>{{$repair->repairStatus}}</td>
                                <td>{{$repair->dateFinished}}</td>
                                <td>{{$repair->cost}}</td>
                             </tr>
                             @endforeach
                            </table>
                            @else
                            <div class="alert alert-success" role="alert"><p>No records of repairs!</p></div>
                            @endif
                          </div>
                              <a class="btn btn-secondary btn-md" role="button" href="/repairs/create"><i class="fas fa-plus-circle fa-1x"></i>&nbspRepair</a>  
                    </div>
                    <div>
                        <h1>Owner</h1>
                        <div class="panel panel-default">
                                @if(count($owner) > 0)              
                                <table class="table">
                                 <tr>
                                    <th>Name</th>
                                    <th>Since</th>
                                    <th>Mobile Number</th>
                                    <th>Email Address</th>
                                 </tr>
                                 @foreach($owner as $owner)
                                 <tr>
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
                    <a class="btn btn-secondary btn-md" role="button" href="/owners/create"><i class="fas fa-plus-circle fa-1x"></i>&nbspOwner</a>
                    <div>
                        <br>
                    </div> 
            </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                    <div class="card" style="width: 35rem" >
                        <img style="width:90%" class="card-img-top" src="/storage/cover_images/{{$room->cover_image}}" alt="Card image cap">
                      </div>
                </div>

                
       </div>        
    </div>
@endsection

