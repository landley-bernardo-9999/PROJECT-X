@extends('layouts.app')
@section('content')
<br>
    <div class="container" >
            <a class="btn btn-secondary btn-md" role="button" href="/propertymgmt"><i class="fas fa-arrow-circle-left"></i></a>
            <a class="btn btn-secondary btn-md" role="button" href="/owners/create"><i class="fas fa-user-plus"></i></a>
            <a href="/owners" class="btn btn-secondary"><i class="fas fa-user-tie"></i>&nbspOwners</a>
        </div>
   <br>
    @if(count($owners) > 0)
    <div class="container"  >
            <table class="table table-striped">
                <tr>
                    <th>No</th>
                    <th>Profile</th>
                    <th>Name</th>
                    
                    <th>Mobile</th>
                    <th>Email</th>
                    <th></th>
                    <th></th>
                </tr>
            @foreach($owners as $owner)
                <tr>
                    <td>{{$rowNum++}}</td>
                    <td><img class="card-img-top" style="width: 35px" src="/storage/owner_images/{{$owner->cover_image}}" alt="Card image cap"></td>
                    <td><a href="/owners/{{$owner->id}}">{{$owner->name}}</a></td>
                    
                    <td>{{$owner->mobileNumber}}</td>
                    <td>{{$owner->emailAddress}}</td>
                    <td>
                        <a href="/owners/{{$owner->id}}/edit" class="btn btn-secondary"><i class="fas fa-user-edit"></i></a>
                    </td>
                    <td>
                        {{-- {!!Form::open(['action' => ['OwnersController@destroy', $owner->id], 'method' => 'POST', 'class' =>'pull-right'])!!}
                            {{Form::hidden('_method', 'DELETE')}}  
                            {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!} --}}
                    </td>
                       
                </tr>  
            @endforeach   
            </table> 
            {{-- {{$owners->links()}} --}}
    @else
    <div class="alert alert-danger" role="alert"><p>No Owners found!</p></div>
    @endif
            </div>
@endsection


