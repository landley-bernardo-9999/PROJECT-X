@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-1">
            <a class="btn btn-secondary btn-md" role="button" href="/owners"><i class="fas fa-arrow-circle-left"></i>&nbspBack</a>
        </div>

        <div class="col-lg-1">
            <a href="{{$owner->id}}/edit" class="btn btn-secondary"><i class="fas fa-edit"></i>&nbspEdit</a>
        </div>

        <div class="col-lg-1">
            {!!Form::open(['action' => ['OwnersController@destroy', $owner->id], 'method' => 'POST', 'class' =>'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}  
                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        </div>

    </div>
</div>
<br>
<h1>{{$owner->name}}(Owner)</h1>
    <div class="container">
       <div class="row">
            <div class="col-lg-9">
                <table class="table">
                    <tr>
                        <th>Room No</th>
                        <td>{{$owner->roomNo}}</td>
                    <tr>
                    <tr>
                        <th>BirthDate</th>
                        <td>{{$owner->birthDate}}</td>
                    <tr>
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
                        <h1>Concerns</h1>
                            <div class="panel panel-default">              
                        <!-- Table -->
                            <table class="table">
                                <tr>
                                    <th>Date Started</th>
                                    <th>Description</th>
                                    <th>Endorsed to</th>
                                    <th>Cost</th>
                                    <th>Status</th>
                                </tr>
                                <tr>
                                    <td>January 12, 2018</td>
                                    <td>Plumbing</td>
                                    <td>Armando</td>
                                    <td>8,000</td>
                                    <td>Pending</td>
                                </tr>
                                    </table>
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

