@extends('layouts.app')
@section('content')
<br>

    <a class="btn btn-dark" role="button" href="/propertymgmt"><i class="fas fa-arrow-circle-left"></i>&nbspBACK</a>
    {{-- <a class="btn btn-warning float-right add-violation" role="button" href="#" ><i class="fas fa-plus-circle fa-1x"></i>&nbspADD</a> --}}

    {!! Form::open(['action'=>'ViolationsController@store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    
    <div id="create-violation" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                          <h4 class="add-violation-title float-left"> </h4>
                        <button class="close" type="button" data-dismiss="modal" >&times;</button>
                          
                    </div>

                    <div class="modal-body">
                        <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label text-md-right">Date Reported</label>
                        <div class="col-md-6">
                            {{ Form::date('dateReported',' ', ['class' => 'form-control']) }}
                        </div>
                    </div>


                      <!--Select Name of the resident or owner-->
                <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label text-md-right">Name: <span style="color:red">&nbsp*</span></label>
                    
                    <div class="col-md-6">
                        <select name="name" id="name" class="form-control">
                            <option value="" disabled selected>Please select</option>
                                @foreach($registeredResidentsAndOwners as $registeredResidentAndOwner)
                            <option value="{{$registeredResidentAndOwner->name}}">
                                {{$registeredResidentAndOwner->name}}
                            </option>
                                @endforeach
                        </select>
                    </div>
                    </div>
                <!--Select Room No of the resident or owner-->
                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">Room No<span style="color:red">&nbsp*</span></label>
                
                <div class="col-md-6">
                    <select name="roomNo" id="roomNo" class="form-control">
                        <option value="" disabled selected>Please select</option>
                            @foreach($registeredRooms as $registeredRoom)
                        <option value="{{$registeredRoom->roomNo}}">
                            {{$registeredRoom->roomNo}}
                        </option>
                            @endforeach
                    </select>
                </div>
                </div>


                <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">Description<span style="color:red">&nbsp*</span></label>
                        <div class="col-md-6">
                            {{Form::text('description','',['class'=>'form-control'])}}
                        </div>
                    </div> 
              
                    <div class="form-group row">
                            <label for="details" class="col-md-4 col-form-label text-md-right">Details of the violation/s</label>
                            <div class="col-md-6">
                                    {{Form::textarea('details','',['class'=>'form-control'])}}
                            </div>
                        </div>
                    
                        <div class="form-group row">
                                <label for="dateCommitted" class="col-md-4 col-form-label text-md-right">Date Committed</label>
                                <div class="col-md-6">
                                    {{ Form::date('dateCommitted',' ', ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label for="reportedBy" class="col-md-4 col-form-label text-md-right">Reported By<span style="color:red">&nbsp*</span></label>
                                    <div class="col-md-6">
                                            {{Form::text('reportedBy','',['class'=>'form-control'])}}
                                    </div>
                                </div>
                                
                <div class="form-group row">
                    <label for="fine" class="col-md-4 col-form-label text-md-right">Fine<span style="color:red">&nbsp*</span></label>
                    <div class="col-md-6">
                        {{Form::number('fine','',['class'=>'form-control'])}}
                    </div>     
                </div> 
         
              <div class="form-group row">
                            <label for="actionTaken" class="col-md-4 col-form-label text-md-right">Action/s Taken<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-6">
                                    {{Form::textarea('actionTaken','',['class'=>'form-control'])}}

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

   <br>
    @if(count($violations) > 0)
    <div class="container-fluid" >
            <table class="table table-striped">
               <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Date Reported</th>
                    <th>Name</th>
                    <th>Room No</th>
                    <th>Description</th>
                    <th>Reported By</th>
                    <th>Fine</th>
                    <th></th>
                    {{-- <th></th>
                    <th></th> --}}
                    
                </tr>
               </thead>
                <tbody>
                        @foreach($violations as $violation)
                        <tr>
                            <th>{{$rowNo++}}</th>
                            <td>{{$violation->dateReported}}</td>
                            <td>{{$violation->name}}</td>
                            <td>{{$violation->roomNo}}</td>
                            <td>{{$violation->description}}</td>
                            <td>{{$violation->reportedBy}}</td>
                            <td>{{$violation->fine}}</td>
                            <td><a href="/propertymgmt/violations/{{$violation->id}}" class="btn btn-primary">MORE</a></td>
                            {{-- <td>
                                <a href="/violations/{{$violation->id}}/edit" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                            </td>
                            <td>
                                {!!Form::open(['action' => ['ViolationsController@destroy', $violation->id], 'method' => 'POST', 'class' =>'pull-right'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}  
                                    {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!} 
                            </td> --}}
                        </tr>  
                @endforeach   
                 
                </tbody>        
            </table>
            
    @else
    {{-- <div class="alert alert-danger" role="alert"><p>No Violations found!</p></div> --}}
    @endif
            </div>
@endsection


