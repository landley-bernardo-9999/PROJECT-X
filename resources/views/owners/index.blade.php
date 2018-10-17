@extends('layouts.app')
@section('content')
<br>
    <div class="container" >
            <a class="btn btn-secondary btn-md" role="button" href="/propertymgmt"><i class="fas fa-arrow-circle-left"></i></a>
            <a class="btn btn-secondary btn-md" role="button" href="/owners/create"><i class="fas fa-user-plus"></i></a>
    </div>
   <br>
    @if(count($owners) > 0)
    <div class="container"  >
            <table class="table table-striped">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Room No</th>
                    <th>Mobile Number</th>
                    <th>Email Address</th>
                    <th></th>
                    <th></th>
                </tr>
            @foreach($owners as $owner)
                <tr>
                    <td>{{$rowNum++}}</td>
                    <td><a href="/owners/{{$owner->id}}">{{$owner->name}}</a></td>
                    <td><a href="/rooms/{{$owner->roomNo}}">{{$owner->roomNo}}</a></td>
                    <td>{{$owner->mobileNumber}}</td>
                    <td>{{$owner->emailAddress}}</td>
                    <td>
                        <a href="/owners/{{$owner->id}}/edit" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                    </td>
                    <td>
                        {!!Form::open(['action' => ['OwnersController@destroy', $owner->id], 'method' => 'POST', 'class' =>'pull-right'])!!}
                            {{Form::hidden('_method', 'DELETE')}}  
                            {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!}
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


