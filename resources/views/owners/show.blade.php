@extends('layouts.app')
@section('content')

<a class="btn btn-secondary btn-md" role="button" href="/owners"><i class="fas fa-arrow-circle-left"></i>&nbspBack</a>
<a class="btn btn-secondary btn-md" role="button" href="/propertymgmt"><i class="fas fa-home"></i>&nbspHome</a>
<a href="{{$owner->id}}/edit" class="btn btn-secondary"><i class="fas fa-edit"></i>&nbspEdit</a>
{!!Form::open(['action' => ['OwnersController@destroy', $owner->id], 'method' => 'POST', 'class' =>'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}  
    {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
{!!Form::close()!!}

<h1>{{$owner->name}}</h1>
    <div class="container">
       <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                <table class="table">
                    <tr>
                        <th>birthDate</th>
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
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                    <div class="card" style="width: 35rem" >
                        <img style="width:90%" class="card-img-top" src="/storage/owner_images/{{$owner->cover_image}}" alt="Card image cap">
                </div>
                </div>
       </div>
    </div>
     
        
@endsection

