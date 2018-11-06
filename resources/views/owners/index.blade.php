@extends('layouts.app')
@section('content')
<br>
    <div class="container-fluid" >
            <a class="btn btn-dark" role="button" href="/propertymgmt" style="width:155px"><i class="fas fa-arrow-circle-left"></i>&nbspBACK</a>
            <a class="btn btn-warning float-right" role="button" href="/owners/create" style="width:155px"><i class="fas fa-user-plus"></i>&nbspADD OWNER</a>
            <a href="/owners" class="btn btn-dark" style="width:155px"><i class="fas fa-user-tie" ></i>&nbspOWNERS</a>
        </div>
   <br>
    @if(count($owners) > 0)
    <div class="container-fluid"  >
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
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
                    <td><a href="/owners/{{$owner->ownerId}}">{{$owner->name}}</a></td>
                    <td><a href="/rooms/{{$owner->roomNo}}">{{$owner->roomNo}}</a></td>
                    <td>{{Carbon\Carbon::parse($owner->moveInDate)->format('F j, Y')}}</td>
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
            {{-- {{$owners->links()}} --}}
    @else
    <div class="alert alert-danger" role="alert"><p>No Owners found!</p></div>
    @endif
            </div>
@endsection


