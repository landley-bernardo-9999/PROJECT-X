@extends('layouts.app')
@section('content')
<br>
    <a class="btn btn-dark" role="button" href="/propertymgmt/repairs"  "><i class="fas fa-arrow-circle-left"></i>&nbspBACK</a>
    <a href="#" class="btn btn-primary edit" ><i class="fas fa-edit edit"></i>&nbspEDIT</a>


     {{-- Create a repair form --}}

     {!! Form::open(['action'=>['RepairsController@update', $repair->id],'method' => 'POST', 'enctype' => 'multipart/form-data', 'class'=>'edit-repair-form']) !!}

     <div id="edit-repair" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                          <h4 class="edit-repair-title float-left"> </h4>
                        <button class="close" type="button" data-dismiss="modal" >&times;</button>
                          
                    </div>

                    <div class="modal-body">
                        
                            <div class="form-group row">
                                    <label for="" class="col-md-4 col-form-label text-md-right">Room No:</label>
                                
                                <div class="col-md-6">
                                    <select name="roomNo" id="roomNo" class="form-control">
                                        <option value="{{$repair->roomNo}}" selected>{{$repair->roomNo}}</option>
                                            @foreach($registeredRooms as $registeredRoom)
                                        <option value="{{$registeredRoom->roomNo}}">
                                            {{$registeredRoom->roomNo}}
                                        </option>
                                            @endforeach
                                    </select>
                                </div>
                                </div>
                
                                
                                <div class="form-group row">
                                        <label for="concernDepartment" class="col-md-4 col-form-label text-md-right" >Concern Department:</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="concernDeparment" id="concernDepartment">
                                            <option value="{{$repair->concernDepartment}}" selected>{{$repair->concernDepartment}}</option>    
                                            <option value="Leasing">Leasing</option>
                                            <option value="Property Management">Property Management</option>
                                            <option value="Accounting">Accounting</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                </div>
                
                                <div class="form-group row">
                                        <label for="concernDepartment" class="col-md-4 col-form-label text-md-right" >Urgency:</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="urgency" id="urgency">
                                            <option value="{{$repair->urgency}}" selected>{{$repair->urgency}}</option>    
                                            <option value="Emergency">Emergency</option>
                                            <option value="Major Concern">Major Concern</option>
                                            <option value="Minor Concern">Minor Concern</option>
                                        </select>
                                    </div>
                                </div>
                
                                <div class="form-group row">
                                        <label for="isWarranty" class="col-md-4 col-form-label text-md-right" >Under Warranty?:</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="isWarranry" id="isWarranty">
                                            <option value="{{$repair->isWarranty}}" selected>{{$repair->isWarranty}}</option>    
                                            <option value="Emergency">Yes</option>
                                            <option value="Major Concern">No</option>
                                            <option value="Minor Concern">Unknown</option>
                                        </select>
                                    </div>
                                </div>
                
                                <!--Select Name of the resident or owner-->
                                <div class="form-group row">
                                    <label for="" class="col-md-4 col-form-label text-md-right">Name:</label>
                                
                                <div class="col-md-6">
                                    <select name="name" id="name" class="form-control">
                                        <option value="{{$repair->name}}" selected>{{$repair->name}}</option>
                                        <option value="None">None</option>
                                            @foreach($registeredResidentsAndOwners as $registeredResidentAndOwner)
                                        <option value="{{$registeredResidentAndOwner->name}}">
                                            {{$registeredResidentAndOwner->name}}
                                        </option>
                                            @endforeach
                                    </select>
                                </div>
                                </div>
                
                                <!--Date when the repair reported-->
                                <div class="form-group row">
                                    <label for="" class="col-md-4 col-form-label text-md-right">Date Reported:</label>
                                    <div class="col-md-6">
                                        {{ Form::date('dateReported',$repair->dateReported, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                
                                <div class="form-group row">
                                        <label for="desc" class="col-md-4 col-form-label text-md-right" >Description:</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="desc" id="desc">
                                            <option value="{{$repair->desc}}" selected>{{$repair->desc}}</option>    
                                            <option value="Carpentry">Carpentry</option>
                                            <option value="Electrical">Electrical</option>
                                            <option value="Plumbing">Plumbing</option>
                                            <option value="Installations">Installations</option>
                                            <option value="Masonry">Masonry</option>
                                            <option value="Painting">Painting</option>
                                            <option value="Cleaning">Cleaning</option>
                                            <option value="Security">Security</option>
                                            <option value="Internet">Internet</option>
                                            <option value="Request">Request</option>
                                            <option value="General">General</option>
                                        </select>
                                    </div>
                                </div>
                
                              <div class="form-group row">
                                    <label for="" class="col-md-4 col-form-label text-md-right">Endorsed To:</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="endorsedTo" id="endorsedTo">
                                        <option value="{{$repair->endorsedTo}}" selected>{{$repair->endorsedTo}}</option>
                                            @foreach($registeredPersonnels as $registeredPersonnel)
                                        <option value="{{$registeredPersonnel->name}}">
                                            {{$registeredPersonnel->name}}
                                        </option>
                                            @endforeach
                                    </select>
                                </div>
                              </div>
                
                              <div class="form-group row">
                                 <label for="cost" class="col-md-4 col-form-label text-md-right">Cost:</label>
                                 <div class="col-md-6">
                                    {{Form::number('cost',$repair->cost,['class'=>'form-control'])}}
                                </div>     
                              </div>
                
                            <div class="form-group row">
                                <label for="repairStatus" class="col-md-4 col-form-label text-md-right">Status:</label>
                             <div class="col-md-6">
                                <select class="form-control" name="repairStatus" id="repairStatus">
                                    <option value="{{$repair->repairStatus}}" selected>{{$repair->repairStatus}}</option>    
                                    <option value="Pending">Pending</option>
                                    <option value="Ongoing">Ongoing</option>
                                    <option value="Closed">Closed</option>
                                </select>
                            </div>   
                            </div>
                
                            <div class="form-group row">
                                <label for="dateFinished" class="col-md-4 col-form-label text-md-right">Date Finished:</label>
                                    <div class="col-md-6">
                                        {{ Form::date('dateFinished',$repair->dateFinished, ['class' => 'form-control']) }}
                                    </div>
                            </div>
                
                            <div class="form-group row mb-0">
                                    <label for="dateFinished" class="col-md-4 col-form-label text-md-right">Image:</label>
                                    <div class="col-md-6 offset-md-4">
                                        {{Form::file('cover_image', ['class' => 'form-control'])}}
                                    </div>
                            </div>
                
                            <div class="form-group row">
                                    <label for="clientSatisfaction" class="col-md-4 col-form-label text-md-right" >Client Satisfaction:</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="isWarranry" id="isWarranty">
                                        <option value="{{$repair->clientSatifaction}}" selected>{{$repair->clientSatifaction}}</option>    
                                        <option value="Very Poor">Very Poor</option>
                                        <option value="Somewhat Unsatisfactory">Somewhat Unsatisfactory</option>
                                        <option value="Average">Average</option>
                                        <option value="Very Satisfactory">Very Satisfactory</option>
                                        <option value="Superior">Superior</option>
                                    </select>
                                </div>
                            </div>
                            
                            

                    </div>

                    <div class="modal-footer">
                            <div class="col-md-5 float-right">
        
                                <button class="btn btn-danger" data-dismiss="modal" type="button">CLOSE</button>
                                {{Form::hidden('_method','PUT')}}
                                {{Form::submit('SUBMIT',['class'=>'btn btn-warning', 'float'=>'right'])}}
                                {!! Form::close() !!}  
        
                                
                            </div>
        
                            
                        </div>

                </div>

            </div>
     </div>

    {!!Form::open(['action' => ['RepairsController@destroy', $repair->id],'class' => 'float-right','method' => 'POST', 'class' =>'float-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}  
        {{Form::submit('DELETE',['class' => 'btn btn-danger'])}}
    {!!Form::close()!!} 
<br>
<br>
<hr>
<h3>Repair&nbsp<i class="fas fa-toolbox"></i></h3>
<br>
    <div class="container-fluid">
       <div class="row">
            <div class="col-lg-9">
                <table class="table table-striped">
                    <tr>
                        <th>Room No</th>
                        <td>{{$repair->roomNo}}</td>
                    </tr>
                    <tr>
                        <th>Under Warranty</th>
                        <td>{{$repair->isWarranty}}</td>
                    </tr>
                    <tr>
                        <th>Concern Department</th>
                        <td>{{$repair->concernDepartmen}}</td>
                    </tr>
                    <tr>
                        <th>Urgency</th>
                        <td>{{$repair->urgency}}</td>
                    </tr>
                    <tr>
                        <th>Reported By</th>
                        <td>{{$repair->name}}</td>
                    </tr>
                    <tr>
                        <th>Date Reported</th>
                        <td>{{Carbon\Carbon::parse($repair->dateReported)->formatLocalized('%b %d %Y')}}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{$repair->desc}}</td>
                    </tr>
                    <tr>
                        <th>Endorsed To</th>
                        <td>{{$repair->endorsedTo}}</td>
                    </tr>
                    <tr>
                        <th>Cost</th>
                        <td>{{$repair->cost}}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{$repair->repairStatus}}</td>
                    </tr>
                    <tr>
                        <th>Date Finished</th>
                        <td>{{Carbon\Carbon::parse($repair->dateFinished)->formatLocalized('%b %d %Y')}}</td>
                    </tr>
                    <tr>
                        <th>Client Satisfaction</th>
                        <td>{{$repair->clientSatisfaction}}</td>
                    </tr>
                    </table>
                </div>             
                <div class="col-lg-3">
                    <div class="card" style="width: 20rem" >
                        <img class="card-img-top" src="/storage/repair_images/{{$repair->cover_image}}" alt="Card image cap">
                </div>
                </div>
       </div>
    </div>
     
        
@endsection

