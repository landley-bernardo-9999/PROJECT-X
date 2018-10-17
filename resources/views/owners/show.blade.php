@extends('layouts.app')
@section('content')
<br>
            <a class="btn btn-secondary btn-md" role="button" href="/owners"><i class="fas fa-arrow-circle-left"></i></a>
            <a href="{{$owner->id}}/edit" class="btn btn-secondary"><i class="fas fa-user-edit"></i></a>
            {!!Form::open(['action' => ['OwnersController@destroy', $owner->id], 'method' => 'POST', 'class' =>'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}  
                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
<br>
<br>
<h3>{{$owner->name}}(Owner)</h3>
    <div class="container">
       <div class="row">
            <div class="col-lg-9">
                <table class="table table-striped">
                    <tr>
                        <th>Room No</th>
                        <td>{{$owner->roomNo}}</td>
                    </tr>
                    <tr>
                        <th>BirthDate</th>
                        <td>{{$owner->birthDate}}</td>
                    </tr>
                    <tr>
                        <th>Move-in Date</th>
                        <td>{{$owner->created_at}}</td>
                    </tr>
                    <tr>
                        <th>Email Address</th>
                        <td>{{$owner->emailAddress}}</td>
                    </tr>
                    <tr>
                      <th>Mobile Number</th>
                      <td>{{$owner->mobileNumber}}</td>
                  </tr>
                    </table>
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
                            <td>{{ $rowNo++ }}</td>
                            <td>{{ $repair->dateReported}}</td>
                            <td>{{$repair->name}}</td>
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
                </div>             
                <div class="col-lg-3">
                    <div class="card" style="width: 20rem" >
                        <img class="card-img-top" src="/storage/owner_images/{{$owner->cover_image}}" alt="Card image cap">
                </div>
                </div>
       </div>
    </div>
     
        
@endsection

