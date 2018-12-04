@extends('layouts.style')
@section('content')
@include('includes.messages')
    <div class="container-fluid"  >
        <div class="card">
            <div class="card-header">
                    <a class="btn btn-warning float-left add-personnel" role="button" href="#" ><i class="fas fa-user-plus"></i>&nbspADD PERSONNEL</a> 
            </div>
            <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Profile</th>
                        <th>Name</th>
                        <th>Schedule</th>
                        <th>Status</th>
                        <th>Mobile</th>
                        <th>Position</th>
                        <th>Action</th>                     
                    </tr>
                </thead>
                 
                <tbody>
                        @foreach($maintenances as $maintenance)
                    <tr>
                        <th>{{$rowNum++}}</td>
                        <td><img class="card-img-top" style="width: 35px" src="/storage/maintenance_images/{{$maintenance->cover_image}}" alt="Card image cap"></td>
                        <td>{{$maintenance->name}}</td>
                        <td>{{$maintenance->schedule}}</td>
                        <td>{{$maintenance->employmentStatus}}</td>
                        <td>{{$maintenance->mobileNumber}}</td>
                        <td>{{$maintenance->position}}</td>
                        <td><a href="/propertymgmt/maintenances/{{$maintenance->id}}" class="btn btn-info">MORE</a></td>
                      
                        {{-- <td>
                            {!!Form::open(['action' => ['MaintenancesController@destroy', $maintenance->id], 'method' => 'POST', 'class' =>'pull-right'])!!}
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
                
            </div>
    </div>

            </div>
            <br>
            <div id="add-personnel" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                  <h4 class="add-personnel-title float-left"> </h4>
                                <button class="close" type="button" data-dismiss="modal" >&times;</button>
                                  
                            </div>
            
                            <div class="modal-body">
                            {!! Form::open(['action'=>'MaintenancesController@store','method' => 'POST', 'enctype' => 'multipart/form-data', 'class'=>'add-personnel-form']) !!}
            
                            <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name:<span style="color:red">&nbsp*</span></label>
                                    <div class="col-md-6">
                                        {{Form::text('name','',['class'=>'form-control'])}}
                                    </div>
                                </div>
                
                                    
                                    
                                    <div class="form-group row">
                                            <label for="birthDate" class="col-md-4 col-form-label text-md-right">Birthdate:<span style="color:red">&nbsp*</span></label>
                                            <div class="col-md-6">
                                                {{ Form::date('birthDate',' ', ['class' => 'form-control']) }}
                                            </div>
                                    </div>
                
                                    <div class="form-group row">
                                            <label for="employmentStatus" class="col-md-4 col-form-label text-md-right">Status:<span style="color:red">&nbsp*</span></label>
                                            <div class="col-md-6">
                                            <select class="form-control" name="employmentStatus" id="employmentStatus">
                                                <option value="" disabled selected>Please select</option>    
                                                <option value="Full-time">Full-time</option>
                                                <option value="Part-time">Part-time</option>
                                                <option value="On-call">On-call</option>    
                                            </select>
                                            </div>   
                                    </div>
                
                                    <div class="form-group row">
                                            <label for="position" class="col-md-4 col-form-label text-md-right">Position:<span style="color:red">&nbsp*</span></label>
                                            <div class="col-md-6">
                                            <select class="form-control" name="position" id="position">
                                                <option value="" disabled selected>Please select</option>    
                                                <option value="Maintenance">Maintenance</option>
                                                <option value="Housekeeping">Housekeeping</option>
                                                <option value="Admin Assistant">Admin Assistant</option>
                                                <option value="Others">Others</option>    
                                            </select>
                                            </div>   
                                    </div>
                
                                    {{-- <div class="form-group row">
                                            <label for="schedule" class="col-md-4 col-form-label text-md-right">Schedule<span style="color:red">&nbsp*</span></label>
                                            <div class="col-md-6">
                                                    {{Form::textarea('schedule','',['class'=>'form-control','placeholder'=>'Schedule (ex. 8-5 MTWTH)'])}}
                                            </div>
                                        </div>  --}}
                

                                                <div class="form-group row">
                                                    <label for="mobileNumber" class="col-md-4 col-form-label text-md-right">Mobile Number:</label>
                                                    <div class="col-md-6">
                                                        {{Form::text('mobileNumber','',['class'=>'form-control'])}}
                                                    </div>
                                                </div> 
                                                    
                                                <div class="form-group row">
                                                        <label for="cover_image" class="col-md-4 col-form-label text-md-right">Image:</label>
                                                    <div class="col-md-6">
                                                        {{Form::file('cover_image', ['class' => 'form-control'])}}
                                                    </div>
                                                </div>                
                                  
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


