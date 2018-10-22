@extends('layouts.app')
@section('content')
<br>
            <a class="btn btn-secondary btn-md" role="button" href="/owners"><i class="fas fa-arrow-circle-left"></i></a>
            <a class="btn btn-secondary btn-md" role="button" href="/rooms"><i class="fas fa-store-alt"></i></a>
            
            <a href="{{$owner->id}}/edit" class="btn btn-secondary"><i class="fas fa-user-edit"></i></a>
            {!!Form::open(['action' => ['OwnersController@destroy', $owner->id], 'method' => 'POST', 'class' =>'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}  
                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
<br>
<br>
<hr>
<h3>Owner&nbsp<i class="fas fa-user-tie"></i></h3>
    <div class="container">
       <div class="row">
            <div class="col-lg-9">
                <table class="table">
                    <tr>
                        <th>Name of the owner</th>
                        <td>{{$owner->name}}</td>
                    </tr>
                    <tr>
                        <th>Birthdate</th>
                        <td>{{$owner->birthDate}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$owner->emailAddress}}</td>
                    </tr>
                    <tr>
                      <th>Mobile</th>
                      <td>{{$owner->mobileNumber}}</td>
                  </tr>
                    </table>

            </div>

            <div class="col-lg-3">
                    <div class="card" style="width: 20rem" >
                        <img class="card-img-top" src="/storage/owner_images/{{$owner->cover_image}}" alt="Card image cap">
                </div>
            </div>
        
       </div>
        
       <div class="row">
           <div class="col-lg-12">
                <div>
                    <hr>
                        <h3>Concerns/Repairs &nbsp<i class="fas fa-toolbox fa-1x"></i></h3>
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
                            <td>{{ $rowNo++ }}</td>
                            <td>{{ $repair->dateReported}}</td>
                            <td>{{$repair->name}}</td>
                            <td>{{$repair->desc}}</td>
                            <td>{{$repair->endorsedTo}}</td>
                            <td>{{$repair->repairStatus}}</td>
                            
                            <td>{{$repair->cost}}</td>
                            <td><a href="/repairs/{{$repair->id}}"><i class="far fa-eye"></i></a></td>
                         </tr>
                         @endforeach
                        </table>
                        @else
                        <div class="alert alert-danger" role="alert"><p>No records of repairs!</p></div>
                        @endif
                      </div>
                          <a class="btn btn-secondary btn-md" role="button" href="/repairs/create"><i class="fas fa-plus-circle fa-1x"></i></a>  
                </div>
                </div>           
           </div>
       </div>
       </div>
       <br>
@endsection

