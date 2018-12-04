@extends('layouts.style')
@section('content')
@include('includes.messages')
<div class="card">
    <div class="card-header">
            <a class="btn btn-dark" role="button" href="/propertymgmt/maintenances"><i class="fas fa-arrow-circle-left"></i>&nbspBACK</a>
            <a href="#" class="btn btn-primary edit-personnel" ><i class="fas fa-user-edit"></i>&nbspEDIT</a>
            {!!Form::open(['action' => ['MaintenancesController@destroy', $maintenances->id],'id' => 'FormDeleteTime','method' => 'POST', 'class' =>'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}  
                    {{Form::submit('DELETE',['class' => 'btn btn-danger'])}}
                {!!Form::close()!!} 
        <br>    
    </div>  
    <div class="card-body">

   
    <h3>{{$maintenances->name}}&nbsp<i class="fas fa-wrench"></i></h3>
<hr>
    <div class="container">
       <div class="row">
            <div class="col-lg-8">
                <table class="table table-striped">
                    <tr>
                        <th>Birthdate</th>
                      
                        <td>{{Carbon\Carbon::parse($maintenances->birthDate)->formatLocalized('%b %d %Y')}}</td>
                    </tr>
                    <tr>
                        <th>Employment Status</th>
                        <td>{{$maintenances->employmentStatus}}</td>
                    </tr>
                </tr>
                        <th>Position</th>
                        <td>{{$maintenances->position}}</td>
                    </tr>
                    <tr>
                        <th>Schedule</th>
                        <td>{{$maintenances->schedule}}</td>
                    </tr>
                    <tr>
                        <th>Mobile Number</th>
                        <td>{{$maintenances->mobileNumber}}</td>
                    </tr>
                        
                    </table>
                </div>             
                <div class="col-lg-4">
                    <div class="card">
                        <img class="card-img-top" src="/storage/maintenance_images/{{$maintenances->cover_image}}" alt="Card image cap">
                </div>
                </div>
       </div>

       
       <div class="row">
        <div class="col-lg-12">
            <hr>
            <h3>Repairs&nbsp<i class="fas fa-toolbox"></i></h3>
            <br>
             <div class="panel panel-default">
            @if(count($repair) > 0)              
            <table class="table table-striped">
             <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Room</th>
                    <th>Date Reported</th>
                    <th>Reported By</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Cost</th>   
                    <th></th>
                 </tr>
             </thead>
            
             <tbody>
                    @foreach($repair as $repair)
                <tr>
                    <td>{{ $rowNoForRepairs++ }}</td>
                    {{-- <td><a href="/rooms/{{$repair->roomNo}}" class="btn btn-primary">{{$repair->roomNo}}</a></td> --}}
                    <td>{{$repair->roomNo}}</td>
                    <td>{{Carbon\Carbon::parse($repair->dateReported)->formatLocalized('%b %d %Y')}}</td>
                    <td>{{$repair->name}}</td>
                    <td>{{$repair->desc}}</td>
                    <td>{{$repair->repairStatus}}</td>
                    <td>{{$repair->cost}}</td>
                    <td><a href="/propertymgmt/repairs/{{$repair->id}}" class="btn btn-primary">MORE INFO</a></td>
                 </tr>
                 @endforeach 
             </tbody>
                        
            </table>
            
            @else
            <div class="alert alert-danger" role="alert"><p>No records of concerns/repairs!</p></div>
            @endif
          </div>
              {{-- <a class="btn btn-secondary btn-md" role="button" href="/repairs/create"><i class="fas fa-plus-circle fa-1x"></i></a>  --}}
    </div>
</div>
    <br>
        </div>
    </div>
</div>

<div id="edit-personnel" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                      <h4 class="edit-personnel-title float-left"> </h4>
                    <button class="close" type="button" data-dismiss="modal" >&times;</button>
                </div>

                <div class="modal-body">
                {!! Form::open(['action'=>['MaintenancesController@update', $maintenances->id],'method' => 'POST', 'class' => 'edit-personal-form','enctype' => 'multipart/form-data']) !!}

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name:</label>
                    <div class="col-md-6">
                        {{Form::text('name',$maintenances->name,['class'=>'form-control'])}}
                    </div>
                </div>
    
                <div class="form-group row">
                    <label for="birthDate" class="col-md-4 col-form-label text-md-right">Birthdate:</label>
                    <div class="col-md-6">
                        {{ Form::date('birthDate',$maintenances->birthDate, ['class' => 'form-control']) }}
                    </div>
                </div>
    
                <div class="form-group row">
                    <label for="employmentStatus" class="col-md-4 col-form-label text-md-right">Status:</label>
                    <div class="col-md-6">
                        <select class="form-control" name="employmentStatus" id="employmentStatus">
                            <option value="{{$maintenances->employmentStatus}}" selected>{{$maintenances->employmentStatus}}</option>    
                            <option value="Full-time">Full-time</option>
                            <option value="Part-time">Part-time</option>
                            <option value="On-call">On-call</option>    
                        </select>
                    </div>   
                </div>
    
                <div class="form-group row">
                    <label for="position" class="col-md-4 col-form-label text-md-right">Position:</label>
                    <div class="col-md-6">
                        <select class="form-control" name="position" id="position">
                            <option value="{{$maintenances->position}}" selected>{{$maintenances->position}}</option>    
                            <option value="Maintenance">Maintenance</option>
                            <option value="Housekeeping">Housekeeping</option>
                            <option value="Admin Assistant">Admin Assistant</option>
                            <option value="Others">Others</option>    
                        </select>
                    </div>   
                </div>
    
                        {{-- <div class="form-group row">
                                <label for="schedule" class="col-md-4 col-form-label text-md-right">Schedule</label>
                                <div class="col-md-6">
                                        {{Form::textarea('schedule',$maintenances->schedule,['class'=>'form-control'])}}
                                </div>
                            </div> 
     --}}
                        
    
                <div class="form-group row">
                    <label for="mobileNumber" class="col-md-4 col-form-label text-md-right">Mobile Number:</label>
                    <div class="col-md-6">
                        {{Form::text('mobileNumber',$maintenances->mobileNumber,['class'=>'form-control'])}}
                    </div>
                </div> 
                                                            
                                        
    
                <div class="form-group row">
                    <label for="cover_image" class="col-md-4 col-form-label text-md-right">Image:</label>
                    <div class="col-md-6">
                        {{Form::file('cover_image', ['class' => 'form-control'])}}
                    </div>
                </div>
            </div>
                <br>
                      
                <div class="modal-footer">
                    <div class="col-md-6 float-right">
                        <button class="btn btn-danger" data-dismiss="modal" type="button">CLOSE</button>
                        {{Form::hidden('_method','PUT')}}              
                            {{Form::submit('SUBMIT',['class'=>'btn btn-warning', 'float'=>'right'])}}
                            {!! Form::close() !!}            
                    </div>
                </div>
            </div>
            </div>
        </div>

</div>
@endsection

