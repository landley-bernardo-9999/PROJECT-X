@extends('layouts.app')
@section('content')
            
<a class="btn btn-dark" role="button" href="/propertymgmt" ><i class="fas fa-arrow-circle-left"></i>&nbspBACK</a>
<a class="btn btn-warning float-right" role="button" href="/propertymgmt/owners/create" ><i class="fas fa-user-plus"></i>&nbspADD OWNER</a>
<br><br>
<div class="card container-fluid" >
    <div class="card-header">
        <h3 class="text-center">Owners found: {{count($owners)}}</h3>
    </div>
<div class="row card-body">
            <table class="table table-striped table-hover table-bordered">
                <thead class="">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Profile</th>
                        <th scope="col">Name</th>
                        <th scope="col">Room</th>
                        <th scope="col">Move-In</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Email</th>                    
                    </tr>
                </thead>
            <tbody>   
                    @foreach($owners as $owner)
                <tr>
                    <th scope="row">{{$rowNum++}}</td>
                    <td ><img class="card-img-top" style="width: 35px" src="/storage/owner_images/{{$owner->cover_image}}" alt="Card image cap"></td>
                    <td><a href="/propertymgmt/owners/{{$owner->ownerId}}">{{$owner->name}}</a></td>
                    <td><a href="/propertymgmt/rooms/{{$owner->roomNo}}">{{$owner->roomNo}}</a></td>
                    <td>{{Carbon\Carbon::parse($owner->moveInDate)->formatLocalized('%b %d %Y')}}</td>
                    <td>{{$owner->mobileNumber}}</td>
                    <td>{{$owner->emailAddress}}</td>
                    {{-- <td>
                        <a href="/owners/{{$owner->ownerId}}/edit" class="btn btn-info"><i class="fas fa-user-edit"></i>&nbspEDIT</a>
                    </td> --}}
                    {{-- <td>
                        {!!Form::open(['action' => ['OwnersController@destroy', $owner->id], 'method' => 'POST', 'class' =>'pull-right'])!!}
                            {{Form::hidden('_method', 'DELETE')}}  
                            {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!} 
                    </td> --}}
                       
                </tr>
                @endforeach 
            </tbody>  
        </table> 
        </div>      
            </div>
            <br>
    {{$owners->links()}}
@endsection


