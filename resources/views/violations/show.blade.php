@extends('layouts.appsidebar')
@section('content')
@include('includes.messages')
     
    {!! Form::open(['action'=>['ViolationsController@update', $violation->id],'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    
    <div id="edit-violation" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                          <h4 class="edit-violation-title float-left"> </h4>
                        <button class="close" type="button" data-dismiss="modal" >&times;</button>
                          
                    </div>

                    <div class="modal-body">
                            <div class="form-group row">
                                    <label for="" class="col-md-4 col-form-label text-md-right">Date Reported</label>
                                    <div class="col-md-6">
                                        {{ Form::date('dateReported',$violation->dateReported, ['class' => 'form-control']) }}
                                    </div>
                                </div>
            
            
                                  <!--Select Name of the resident or owner-->
                            <div class="form-group row">
                                    <label for="" class="col-md-4 col-form-label text-md-right">Name of the Resident/Owner</label>
                                
                                <div class="col-md-6">
                                    <select name="name" id="name" class="form-control">
                                    <option value="{{$violation->name}}" selected>{{$violation->name}}</option>
                                            @foreach($registeredResidents as $registeredResident)
                                        <option value="{{$registeredResident->name}}">
                                            {{$registeredResident->name}}
                                        </option>
                                            @endforeach
                                    </select>
                                </div>
                                </div>
                            <!--Select Room No of the resident or owner-->
                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right">Room No</label>
                            
                            <div class="col-md-6">
                                <select name="roomNo" id="roomNo" class="form-control">
                                    <option value="{{$violation->roomNo}}" selected>{{$violation->roomNo}}</option>
                                        @foreach($registeredRooms as $registeredRoom)
                                    <option value="{{$registeredRoom->roomNo}}">
                                        {{$registeredRoom->roomNo}}
                                    </option>
                                        @endforeach
                                </select>
                            </div>
                            </div>
            
            
                            <div class="form-group row">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                                    <div class="col-md-6">
                                        {{Form::text('description',$violation->description,['class'=>'form-control'])}}
                                    </div>
                                </div> 
                          
                                <div class="form-group row">
                                        <label for="details" class="col-md-4 col-form-label text-md-right">Details of the violation/s</label>
                                        <div class="col-md-6">
                                                {{Form::textarea('details',$violation->details,['class'=>'form-control'])}}
                                        </div>
                                    </div>
                                
                                    <div class="form-group row">
                                            <label for="dateCommitted" class="col-md-4 col-form-label text-md-right">Date Committed</label>
                                            <div class="col-md-6">
                                                {{ Form::date('dateCommitted',$violation->dateCommitted, ['class' => 'form-control']) }}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                                <label for="reportedBy" class="col-md-4 col-form-label text-md-right">Reported By</label>
                                                <div class="col-md-6">
                                                        {{Form::text('reportedBy',$violation->reportedBy,['class'=>'form-control'])}}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                             <label for="fine" class="col-md-4 col-form-label text-md-right">Fine</label>
                             <div class="col-md-6">
                                    {{Form::number('fine',$violation->fine,['class'=>'form-control'])}}
                            </div>     
                          </div> 
                     
                          <div class="form-group row">
                                        <label for="actionTaken" class="col-md-4 col-form-label text-md-right">Action/s Taken</label>
                                        <div class="col-md-6">
                                                {{Form::textarea('actionTaken',$violation->actionTaken,['class'=>'form-control'])}}
            
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

    
     <a class="btn btn-dark" role="button" href="/propertymgmt/residents/"><i class="fas fa-arrow-circle-left"></i>&nbspBACK</a>
    <a href="#" class="btn btn-primary edit-violation"><i class="fas fa-edit"></i>&nbspEDIT</a>
    
    
    
    {!!Form::open(['action' => ['ViolationsController@destroy', $violation->id], 'id'=> 'FormDeleteTime','method' => 'POST', 'class' =>'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}  
        {{Form::submit('DELETE',['class' => 'btn btn-danger'])}}
    {!!Form::close()!!} 
<hr>
<h3>Violation&nbsp<i class="fas fa-user-times"></i></h3>
<br>
    <div class="container">
       <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped">
                   
                    <tr>
                        <th>Date Reported</th>
                        <td>{{Carbon\Carbon::parse($violation->dateReported)->formatLocalized('%b %d %Y')}}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{$violation->name}}</td>
                    </tr>
                    <tr>
                        <th>Room No</th>
                        <td>{{$violation->roomNo}}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{$violation->description}}</td>
                    </tr>
                    <tr>
                        <th>Details</th>
                        <td>{{$violation->details}}</td>
                    </tr>
                    <tr>
                        <th>Date Committed</th>
                        <td>{{Carbon\Carbon::parse($violation->dateCommitted)->formatLocalized('%b %d %Y')}}</td>
                    </tr>
                    <tr>
                        <th>Reported By</th>
                        <td>{{$violation->reportedBy}}</td>
                    </tr>
                    <tr>
                        <th>Fine</th>
                        <td>P&nbsp{{$violation->fine}}.00</td>
                    </tr>
                    <tr>
                        <th>Action Taken</th>
                        <td>{{$violation->actionTaken}}</td>
                    </tr>
                        
                    </table>
                </div>             
       </div>
    </div>
     
        
@endsection

