@extends('layouts.app')
@section('content')

<a class="btn btn-secondary btn-md" role="button" href="/propertymgmt"><i class="fas fa-arrow-circle-left"></i></a>
<a class="btn btn-secondary btn-md" role="button" href="/residents/create"><i class="fas fa-user-plus"></i></a>
<a href="/residents" class="btn btn-secondary"><i class="fas fa-users"></i>&nbspResidents</a>
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
    </div>
    <br>
    @if(count($residents) > 0)
    <div class="container"  >
            <table class="table table-striped">
                <tr>
                    <th>No</th>
                    <th>Profile</th>
                    <th>Name</th>
                    
                    <th>Status</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    
                    
                    <th></th>
                    <th></th>
                </tr>
                 @foreach($residents as $resident)
                    <tr>
                        <td>{{$rowNum++}}</td>
                        <td><img class="card-img-top" style="width:35px" src="/storage/resident_images/{{$resident->cover_image}}" alt="Card image cap"></td>
                        <td><a href="/residents/{{$resident->id}}">{{$resident->name}}</a></td>
                        <td>{{$resident->residentStatus}}</td>
                        <td>{{$resident->mobileNumber}}</td>
                        <td>{{$resident->emailAddress}}</td>
                        
                        
                        <td>
                            <a href="/residents/{{$resident->id}}/edit" class="btn btn-secondary"><i class="fas fa-user-edit"></i></a>
                        </td>
                        <td>
                            {{-- {!!Form::open(['action' => ['ResidentsController@destroy', $resident->id], 'method' => 'POST', 'class' =>'pull-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}  
                                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                            {!!Form::close()!!} --}}
                        </td>
                    </tr>  
                @endforeach   
            </table> 
    @else
    <div class="alert alert-danger" role="alert"><p>No residents found!</p></div>
    @endif
            </div>
@endsection


