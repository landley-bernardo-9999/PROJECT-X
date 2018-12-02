@extends('layouts.style')
@section('content')
@include('includes.messages')
            
{{-- <a class="btn btn-dark float-left" role="button" href="/propertymgmt" ><i class="fas fa-arrow-circle-left"></i>&nbspBACK</a> --}}

<div class="container-fluid" >
    <div class="card">
    <div class="card-header">
            <a class="btn btn-warning float-left add-owner" role="button" href="#" ><i class="fas fa-user-plus"></i>&nbspADD NEW OWNER</a>
            <form action="/search/owners" method="GET">
                <input style="width:200px" class ="float-right form-control" type="text" name="s" value="{{ Request::query('s') }}" placeholder="Search owners" />
            </form>
            
    </div>
<div class="card-body">
            <table class="table table-striped table-hover table-bordered">
                <thead class="">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Profile</th>
                        <th scope="col">Name</th>
                        <th scope="col">Room</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Email</th>      
                        <th>Action</th>              
                    </tr>
                </thead>
            <tbody>   
                    @foreach($owners as $owner)
                <tr>
                    <th scope="row">{{$rowNum++}}</td>
                    <td ><img class="card-img-top" style="width: 35px" src="/storage/owner_images/{{$owner->cover_image}}" alt="Card image cap"></td>
                    {{-- <td><a href="/propertymgmt/owners/{{$owner->ownerId}}">{{$owner->name}}</a></td> --}}
                    <td>{{$owner->name}}</td>
                    {{-- <td><a href="/propertymgmt/rooms/{{$owner->roomNo}}">{{$owner->roomNo}}</a></td> --}}
                    <td>{{$owner->roomNo}}</td>
                    {{-- <td>{{Carbon\Carbon::parse($owner->moveInDate)->formatLocalized('%b %d %Y')}}</td> --}}
                    <td>{{$owner->mobileNumber}}</td>
                    <td>{{$owner->emailAddress}}</td>
                    <td><a href="/propertymgmt/owners/{{$owner->ownerId}}" class="btn btn-info">MORE</a></td> 

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
        <div class="card-footer">
                <h3 class="text-center">Owners found: {{count($owners)}}</h3>
            </div>
            </div>
            
        </div>
            <br>
    {{$owners->links()}}

    <div id="add-owner" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                          <h4 class="add-owner-title float-left"> </h4>
                        <button class="close" type="button" data-dismiss="modal" >&times;</button>
                          
                    </div>
    
                    <div class="modal-body">
                            {!! Form::open(['action'=>'OwnersController@store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name:<span style="color:red">&nbsp*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                    </div>
                            </div>
                                                    
                            <div class="form-group row">
                                <label for="birthDate" class="col-md-4 col-form-label text-md-right">Birthdate:</label>
                                    <div class="col-md-6">
                                        <input type="date" name="birthDate" class="form-control" value="{{ old('birthDate') }}">
                                    </div>
                            </div>
                
                                
                            <div class="form-group row">
                                <label for="mobileNumber" class="col-md-4 col-form-label text-md-right">Mobile Number:<span style="color:red">&nbsp*</span></label>
                                    <div class="col-md-6">
                                        <input type="number" name="mobileNumber" class="form-control" value="{{ old('mobileNumber') }}">
                                    </div>
                            </div> 

                            <div class="form-group row">
                                <label for="emailAddress" class="col-md-4 col-form-label text-md-right">Email Address:<span style="color:red">&nbsp*</span></label>
                                    <div class="col-md-6">
                                        <input type="email" name="emailAddress" class="form-control" value="{{ old('emailAddress') }}">
                                    </div>
                            </div>                            
                                                    
                            <div class="form-group row mb-0">
                                <label for="" class="col-md-4 col-form-label text-md-right">Image:</label>
                                    <div class="col-md-6">
                                       <input type="file" name="cover_image" class="form-control" value="{{ old('cover_image') }}">
                                    </div>
                            </div>
                    
                            <br>
                    <div class="modal-footer">
                            <div class="col-md-6 float-right">
                                <button class="btn btn-danger" data-dismiss="modal" type="button">CLOSE</button>              
                                    {{Form::submit('SUBMIT',['class'=>'btn btn-warning', 'float'=>'right'])}}
                                    {!! Form::close() !!}            
                            </div>
                        </div>
                </div>
                </div>
            </div>

    </div>
@endsection


