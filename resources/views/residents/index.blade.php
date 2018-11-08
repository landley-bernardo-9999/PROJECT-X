@extends('layouts.app')
@section('content')

<a class="btn btn-dark" role="button" href="/propertymgmt" style="width:155px"><i class="fas fa-arrow-circle-left"></i>&nbspBACK</a>
<a class="btn btn-warning float-right" role="button" href="/propertymgmt/residents/create" style="width:155px"><i class="fas fa-user-plus"></i>&nbspADD RESIDENT</a>
<a href="/propertymgmt/residents" class="btn btn-dark" style="width:155px"><i class="fas fa-users"></i>&nbspRESIDENTS</a>
<br>
<br>
<div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-2 btn" style="border:solid black 1px; padding-bottom: 2%; padding-top: 2%; margin-left:4%">
                <h3>Active</h3>
                    <h1>{{count($active)}}</h1>
            </div>
            <div class="col-md-2 btn" style="border:solid black 1px; padding-bottom: 4%; padding-top: 2%; margin-left:2%">
                <h3>Harvard</h3>
                 <h1>{{count($harvard)}}</h1> 
            </div>
            <div class="col-md-2 btn" style="border:solid black 1px; padding-bottom: 4%; padding-top: 2%; margin-left:2%">
                <h3>Princeton</h3>
                 <h1>{{count($princeton)}}</h1>
            </div>
            <div class="col-md-2 btn" style="border:solid black 1px; padding-bottom: 4%; padding-top: 2%; margin-left:2%">
                <h3>Wharton</h3>
                 <h1>{{count($wharton)}}</h1>
            </div>
            <div class="col-md-2 btn" style="border:solid black 1px; padding-bottom: 4%; padding-top: 2%; margin-left:2%">
                <h3>Courtyard</h3>
                 <h1>{{count($courtyard)}}</h1> 
            </div>
        </div>
        <br>
        
    </div>
        <div class="container-fluid">
            @if(count($residents) > 0)
            <table class="table table-hover table-striped">
                <thead class="thead-dark"> 
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Profile</th>
                    <th scope="col">Resident</th>
                    <th scope="col">Room</th>
                    <th scope="col">Status</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Email</th>
                    <th scope="col">Move-Out</th>
                    {{-- <th></th> --}}
                  </tr>
                </thead>
                
                <tbody>
                        @foreach($residents as $row)
                    <tr>
                        <th scope="row">{{$rowNum++}}</th>
                        <td><img class="card-img-top" style="width:35px" src="/storage/resident_images/{{$row->cover_image}}" alt="Card image cap"></td>
                        <td><a href="/propertymgmt/residents/{{$row->residentId}}">{{$row->name}}</a></td>
                        <td><a href="/propertymgmt/rooms/{{$row->residentRoomNo}}">{{$row->residentRoomNo}}</a></td>
                        <td>{{$row->residentStatus}}</td>
                        <td>{{$row->mobileNumber}}</td>
                        <td>{{$row->emailAddress}}</td>
                        <td>{{Carbon\Carbon::parse($row->moveOutDate)->formatLocalized('%b %d %Y')}}</td>
                         {{-- <td>
                        <a href="/residents/{{$row->residentId}}/edit" class="btn btn-secondary"><i class="fas fa-user-edit"></i></a>
                    </td> --}}
                    {{-- <td>
                        {!!Form::open(['action' => ['ResidentsController@destroy', $row->id], 'method' => 'POST', 'class' =>'pull-right'])!!}
                            {{Form::hidden('_method', 'DELETE')}}  
                            {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!} 
                    </td> --}}
                    </tr>
                    @endforeach
                </tbody>
              
              </table>
              @else
              <div class="alert alert-danger" role="alert"><p>No residents found!</p></div>
              @endif
        </div>
@endsection


