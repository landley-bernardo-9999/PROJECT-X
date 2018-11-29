@extends('layouts.appsidebar')
@section('content')
@include('includes.messages')
<br>
            <a class="btn btn-dark" role="button" href="/propertymgmt/owners/"><i class="fas fa-arrow-circle-left"></i>&nbspBACK</a>
            
            
            <a href="#" class="btn btn-info edit-owner"><i class="fas fa-user-edit"></i>&nbspEDIT</a>
            {!!Form::open(['action' => ['OwnersController@destroy', $owner->id], 'id'=>'FormDeleteTime','method' => 'POST', 'class' =>'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}  
                {{Form::submit('DELETE',['class' => 'btn btn-danger'])}}
            {!!Form::close()!!} 
<br>
<br>
<hr>
<h3>Owner&nbsp<i class="fas fa-user-tie"></i></h3>
<br>
    <div class="container">
       <div class="row">
            <div class="col-lg-9">
                <table class="table table-striped">
                    <tr>
                        <th>Name of the owner</th>
                        <td>{{$owner->name}}</td>
                    </tr>
                    <tr>
                        <th>Move-In</th>
                        <td>{{$owner->moveInDate}}</td>
                    </tr>
                    <tr>
                        <th>Birthdate</th>
                        <td>{{Carbon\Carbon::parse($owner->birthDate)->formatLocalized('%b %d %Y')}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$owner->emailAddress}}</td>
                    </tr>
                    <tr>
                      <th>Mobile</th>
                      <td>{{$owner->mobileNumber}}</td>
                  </tr>
                    </table>

            </div>

            <div class="col-lg-3">
                    <div class="card" style="width: 20rem" >
                        <img class="card-img-top" src="/storage/owner_images/{{$owner->cover_image}}" alt="Card image cap">
                </div>
            </div>
        
       </div>

       <div class="row">
        <div class="col-lg-12">
             <div>
                 <hr>
                     <h3>Rooms&nbsp<i class="fas fa-store-alt fa-1x"></i></h3>
                     <br>
                      <div class="panel panel-default">
                     @if(count($transaction) > 0)              
                     <table class="table table-striped table-hover">
                      <thead class="thead-dark">
                        <tr>
                            <th>No</th> 
                            <th>Room</th>
                            <th>Move-In</th>
                            <th>Buying Price</th>
                            <th>Form Of Payment</th>
                            <th></th>
                         </tr>
                      </thead>
                      @foreach($transaction as $transaction)
                      <tbody>
                        
                        <tr>
                           <td>{{ $rowNoForTransactions++ }}</td>
                           <td><a href="/propertymgmt/rooms/{{$transaction->roomNo}}" class="btn btn-primary">{{$transaction->roomNo}}</a></td>
                           <td>{{$transaction->moveInDate}}</td>
                           <td>{{$transaction->totalPrice}}</td>
                           <td>{{$transaction->formOfPayment}}</td>
                           <td><a href="/propertymgmt/transactions/{{$transaction->id}}" class="btn btn-info">MORE INFO</a></td>
                        </tr>
                      
                      </tbody>

                      @endforeach
                     </table>
                     @else
                     <div class="alert alert-danger" role="alert"><p>No records of rooms!</p></div>
                     @endif
                   </div>
                       {{-- <a class="btn btn-warning" role="button" href="/propertymgmt/transactions/create" "><i class="fas fa-plus-circle fa-1x"></i>&nbspADD</a>   --}}
             </div>
             </div>           
        </div>

        <div id="edit-owner" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                              <h4 class="edit-owner-title float-left"> </h4>
                            <button class="close" type="button" data-dismiss="modal" >&times;</button>
                              
                        </div>
        
                        <div class="modal-body">
                                {!! Form::open(['action'=>['OwnersController@update', $owner->id],'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    
                                <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">Name:</label>
                                        <div class="col-md-6">
                                            {{Form::text('name',$owner->name,['class'=>'form-control'])}}
                                        </div>
                                    </div>
                                        
                                        <div class="form-group row">
                                                <label for="birthDate" class="col-md-4 col-form-label text-md-right">Birthdate:</label>
                                                <div class="col-md-6">
                                                    {{ Form::date('birthDate',$owner->birthDate, ['class' => 'form-control']) }}
                                                </div>
                                        </div>
                    
                                    
                                                    <div class="form-group row">
                                                            <label for="mobileNumber" class="col-md-4 col-form-label text-md-right">Mobile Number:</label>
                                                            <div class="col-md-6">
                                                                {{Form::text('mobileNumber',$owner->mobileNumber,['class'=>'form-control'])}}
                                                            </div>
                                                        </div> 
                                                        <div class="form-group row">
                                                                <label for="emailAddress" class="col-md-4 col-form-label text-md-right">Email Address:</label>
                                                                <div class="col-md-6">
                                                                        {{Form::email('emailAddress',$owner->emailAddress,['class'=>'form-control'])}}
                                                                </div>
                                                            </div>                            
                                                        
                    
                                <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            {{Form::file('cover_image', ['class' => 'form-control'])}}
                                        </div>
                                </div>
                        
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


        
       <div class="row">
           <div class="col-lg-12">
                <div>
                    <hr>
                        <h3>Concerns/Repairs &nbsp<i class="fas fa-toolbox fa-1x"></i></h3>
                        <br>
                         <div class="panel panel-default">
                        @if(count($repair) > 0)              
                        <table class="table table-striped">
                         <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Date Reported</th>
                                <th>Reported By</th>
                                <th>Description</th>
                                <th>Endorse To</th>
                                <th>Status</th>
                                
                                <th>Cost</th>
                                <th></th>
                             </tr>
                         </thead>
                         @foreach($repair as $repair)
                         <tbody>
                            <tr>
                                <td>{{ $rowNoForConcerns++ }}</td>
                                <td>{{ $repair->dateReported}}</td>
                                <td>{{$repair->name}}</td>
                                <td>{{$repair->desc}}</td>
                                <td>{{$repair->endorsedTo}}</td>
                                <td>{{$repair->repairStatus}}</td>
                                
                                <td>{{$repair->cost}}</td>
                                <td><a href="/propertymgmt/repairs/{{$repair->id}}" class="btn btn-info"></a></td>
                             </tr>
                         </tbody>
                         @endforeach
                        </table>
                        @else
                        <div class="alert alert-danger" role="alert"><p>No records of repairs!</p></div>
                        @endif
                      </div>
                      {{-- <a class="btn btn-warning" role="button" href="/propertymgmt/transactions/create"><i class="fas fa-plus-circle fa-1x"></i>&nbspADD </a> --}}
                </div>
                </div>           
           </div>
       </div>
       </div>
       <br>
@endsection

