@extends('layouts.appsidebar')
@section('content')
@include('includes.messages')
<div id="add-resident-info" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                  <h4 class="add-resident-info-title float-left"> </h4>
                <button class="close" type="button" data-dismiss="modal" >&times;</button>
              
            </div>

            <div class="modal-body">
                {!! Form::open(['action'=>'ResidentsController@store','method' => 'POST', 'enctype' => 'multipart/form-data', 'class'=>'add-resident-info-form']) !!}
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name:<span style="color:red">&nbsp*</span></label>
                    <div class="col-md-6">
                        {{Form::text('name','',['class'=>'form-control'])}}
                    </div>
                </div>
                    
                    <div class="form-group row">
                            <label for="birthDate" class="col-md-4 col-form-label text-md-right">BirthDate:</label>
                            <div class="col-md-6">
                                {{ Form::date('birthDate',' ', ['class' => 'form-control']) }}
                            </div>
                    </div>

                    <div class="form-group row">
                            <label for="residentStatus" class="col-md-4 col-form-label text-md-right">Status:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-6">
                            <select class="form-control" name="residentStatus" id="residentStatus">
                                <option value="" disabled selected>Please select</option>    
                                <option value="Pending">Pending</option>
                                <option value="Moving-in">Moving-in</option>
                                <option value="Active">Active</option>
                                <option value="Pre-terminated">Pre-terminated</option>
                                <option value="Extended">Extended</option>
                                <option value="Moving-out">Moving-out</option>
                                <option value="Inactive">Inactive</option>
                                <option value="Evicted">Evicted</option>
                            </select>
                            </div>   
                    </div>
                  
                    <div class="form-group row">
                            <label for="school" class="col-md-4 col-form-label text-md-right">School:</label>
                            <div class="col-md-6">
                                    {{Form::text('school','',['class'=>'form-control'])}}
                     
                            </div>
                        </div>

                   
                        <div class="form-group row">
                                <label for="course" class="col-md-4 col-form-label text-md-right">Course:</label>
                                <div class="col-md-6">
                                        {{Form::text('course','',['class'=>'form-control'])}}
                                </div>
                            </div>  
                            
                            <div class="form-group row">
                                    <label for="yearLevel" class="col-md-4 col-form-label text-md-right">Year Level:</label>
                                    <div class="col-md-6">
                                        {{Form::number('yearLevel','',['class'=>'form-control', 'min'=>'1'])}}
                                    </div>
                                </div>  
               
                                <div class="form-group row">
                                        <label for="mobileNumber" class="col-md-4 col-form-label text-md-right">Mobile Number:</label>
                                        <div class="col-md-6">
                                            {{Form::text('mobileNumber','',['class'=>'form-control'])}}
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                            <label for="emailAddress" class="col-md-4 col-form-label text-md-right">Email Address:</label>
                                            <div class="col-md-6">
                                                    {{Form::email('emailAddress','',['class'=>'form-control'])}}
                                            </div>
                                        </div>     
                                
                                        <div class="form-group row mb-0">
                                            <label for="" class="col-md-4 col-form-label text-md-right">Image:</label>
                                            <div class="col-md-6">
                                                {{Form::file('cover_image', ['class' => 'form-control'])}}
                                            </div>
                                    </div>
                   
            </div>

            <div class="modal-footer">
                <div class="col-md-5 float-right">
                    <button class="btn btn-danger" data-dismiss="modal" type="button">CLOSE</button>              
                        {{Form::submit('SUBMIT',['class'=>'btn btn-warning', 'float'=>'right'])}}
                        {!! Form::close() !!}            
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <a class="btn btn-dark float-left" role="button" href="/propertymgmt"><i class="fas fa-arrow-circle-left"></i>&nbspBACK</a> --}}

<form action="/search/residents" method="GET">
    <input style="width:200px" class ="float-right form-control" type="text" name="s" value="{{ Request::query('s') }}" placeholder="Search residents" />
</form>

<a class="btn btn-warning float-left add-resident-info" role="button" href="#"><i class="fas fa-plus-circle"></i>&nbspRESIDENT</a>

<br>
<br>

<div class=" card container-fluid" >
     <div class="card-header">
        <h3 class="text-center">Residents found: {{count($residents)}}</h3>     
    </div> 
        <div class="row card-body">
            <table class="table table-hover table-striped table-bordered">
                <thead class=""> 
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
                        {{-- <td><a href="/propertymgmt/residents/{{$row->residentId}}">{{$row->name}}</a></td> --}}
                        <td>{{$row->name}}</td>
                        <td>{{$row->residentRoomNo}}</td>
                        {{-- <td><a href="/propertymgmt/rooms/{{$row->residentRoomNo}}">{{$row->residentRoomNo}}</a></td> --}}
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
            </div>
        </div>
        <br>
        <h6 class="text-center">{{$residents->links()}}</h6>

@endsection


