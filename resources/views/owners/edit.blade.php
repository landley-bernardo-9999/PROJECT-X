@extends('layouts.app')
@section('content')
<a class="btn btn-secondary btn-md" role="button" href="/owners"><i class="fas fa-arrow-circle-left"></i></a>   
{!! Form::open(['action'=>['OwnersController@update', $owner->id],'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card"style="padding:6%">
                    <div class="card-header">
                        <h3>Edit Owner</h3>
                    </div>
                <br>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                    <div class="col-md-6">
                        {{Form::text('name',$owner->name,['class'=>'form-control'])}}
                    </div>
                </div>

                <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label text-md-right">Room No</label>
                    
                    <div class="col-md-6">
                        <select name="roomNo" id="roomNo" class="form-control">
                            <option value="{{$owner->roomNo}}"selected>{{$owner->roomNo}}</option>
                                @foreach($registeredRooms as $registeredRoom)
                            <option value="{{$registeredRoom->roomNo}}">
                                {{$registeredRoom->roomNo}}
                            </option>
                                @endforeach
                        </select>
                    </div>
                    </div>
                    
                    
                    <div class="form-group row">
                            <label for="birthDate" class="col-md-4 col-form-label text-md-right">Birthdate</label>
                            <div class="col-md-6">
                                {{ Form::date('birthDate',$owner->birthDate, ['class' => 'form-control']) }}
                            </div>
                    </div>

                
                                <div class="form-group row">
                                        <label for="mobileNumber" class="col-md-4 col-form-label text-md-right">Mobile Number</label>
                                        <div class="col-md-6">
                                            {{Form::text('mobileNumber',$owner->mobileNumber,['class'=>'form-control'])}}
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                            <label for="emailAddress" class="col-md-4 col-form-label text-md-right">Email Address</label>
                                            <div class="col-md-6">
                                                    {{Form::email('emailAddress',$owner->emailAddress,['class'=>'form-control','placeholder'=>'Email Address'])}}
                                            </div>
                                        </div>                            
                                    

            <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        {{Form::file('cover_image', ['class' => 'form-control'])}}
                    </div>
            </div>
            <br>
            <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                            {{Form::hidden('_method','PUT')}}
                        {{Form::submit('Submit',['class'=>'btn btn-secondary'])}}
                        {!! Form::close() !!}  
                    </div>
                </div>
        </div>   
                </div>
                </div>
            </div>
        </div>
    </div> 
    </div>
</div>

    <br>
@endsection