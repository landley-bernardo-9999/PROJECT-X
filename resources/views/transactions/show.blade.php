@extends('layouts.appsidebar')
@section('content')
@include('includes.messages')
    <a class="btn btn-dark" role="button" href="/propertymgmt/rooms/"{{$transaction->roomNo}}><i class="fas fa-arrow-circle-left"></i>&nbspBACK</a>
    <a href="#" class="btn btn-info edit-transaction"><i class="fas fa-edit"></i>&nbspEDIT</a>
     {!!Form::open(['action' => ['TransactionsController@destroy', $transaction->id],'id'=>'FormDeleteTime' ,'method' => 'POST', 'class' =>'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}  
        {{Form::submit('DELETE',['class' => 'btn btn-danger'])}}
    {!!Form::close()!!} 
<br>
<br>
<hr>
<h3>Transactions&nbsp<i class="fas fa-hands-helping"></i></h3>
<br>
    <div class="container">
       <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped">
                    <tr>
                        <th>Name of the Owner</th>
                        <td>{{$transaction->ownerName}}</td>
                    </tr>
                    <tr>
                        <th>Room No</th>
                        <td>{{$transaction->roomNo}}</td>
                    </tr>
                    <tr>
                        <th>Move-In</th>
                        <td>{{Carbon\Carbon::parse($transaction->moveInDate)->format('F j, Y')}}</td>
                    </tr> 
                    <tr>
                        <th>Total Price of the Unit</th>
                        <td>{{$transaction->totalPrice}}</td>
                    </tr>
                    <tr>
                        <th>DownPayment</th>
                        <td>{{$transaction->downPayment}}</td>
                    </tr>
                    <tr>
                        <th>DownPayment of Monthly Amortization</th>
                        <td>{{$transaction->downPaymentMontlyAmortization}}</td>
                    </tr>
                   
                    <tr>
                        <th>Monthly Amortization</th>
                        <td>{{$transaction->monthlyAmortization}}</td>
                    </tr>                  
                    <tr>
                        <th>Form Of Payment</th>
                        <td>{{$transaction->formOfPayment}}</td>
                    </tr>   
                </table>
                </div>             
       </div>
    </div>

    <div id="edit-transaction" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                          <h4 class="edit-transaction-title float-left"> </h4>
                        <button class="close" type="button" data-dismiss="modal" >&times;</button>
                          
                    </div>
    
                    <div class="modal-body">
                            {!! Form::open(['action'=>['TransactionsController@update', $transactions->id],'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                            
                            <div class="form-group row">
                                    <label for="roomNo" class="col-md-4 col-form-label text-md-right">Room No</label>
                                
                                <div class="col-md-6">
                                    <select name="roomNo" id="roomNo" class="form-control">
                                        <option value="{{$transactions->roomNo}}" selected>{{$transactions->roomNo}}</option>
                                            @foreach($registeredRooms as $registeredRoom)
                                        <option value="{{$registeredRoom->roomNo}}">
                                            {{$registeredRoom->roomNo}}
                                        </option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
            
            
                            <div class="form-group row">
                                    <label for="ownerName" class="col-md-4 col-form-label text-md-right">Name of the Owner</label>
                                
                                <div class="col-md-6">
                                    <select name="ownerName" id="ownerName" class="form-control">
                                        <option value="{{$transactions->id}}" selected>{{$transactions->ownerName}}</option>
                                            @foreach($registeredOwners as $registeredOwner)
                                        <option value="{{$registeredOwner->id}}">
                                            {{$registeredOwner->name}}
                                        </option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
            
            
                            <div class="form-group row">
                                <label for="moveInDate" class="col-md-4 col-form-label text-md-right">Move-In Date</label>
                                <div class="col-md-6">
                                    {{ Form::date('moveInDate',$transactions->moveInDate, ['class' => 'form-control']) }}
                                </div>
                            </div>
            
            
                            <div class="form-group row">
                                <label for="totalPrice" class="col-md-4 col-form-label text-md-right">Buying Price</label>
                                <div class="col-md-6">
                                    {{Form::number('totalPrice',$transactions->totalPrice,['class'=>'form-control'])}}
                                </div>     
                            </div>
                            
                            <div class="form-group row">
                                <label for="downPayment" class="col-md-4 col-form-label text-md-right">DownPayment</label>
                                <div class="col-md-6">
                                    {{Form::number('downPayment',$transactions->downPayment,['class'=>'form-control'])}}
                                </div>     
                            </div>
            
                            <div class="form-group row">
                                <label for="downPaymentMonthlyAmortization" class="col-md-4 col-form-label text-md-right">DownPayment Monthly Amortization</label>
                                <div class="col-md-6">
                                    {{Form::number('downPaymentMonthlyAmortization',$transactions->downPaymentMonthlyAmortization,['class'=>'form-control'])}}
                                </div>     
                            </div>
            
                            <div class="form-group row">
                                <label for="monthlyAmortization" class="col-md-4 col-form-label text-md-right">Monthly Amortization</label>
                                <div class="col-md-6">
                                    {{Form::number('monthlyAmortization',$transactions->monthlyAmortization,['class'=>'form-control'])}}
                                </div>     
                            </div>
            
                            <div class="form-group row">
                                <label for="formOfPayment" class="col-md-4 col-form-label text-md-right">Form of Payment</label>
                                    <div class="col-md-6">
                                    <select class="form-control" name="formOfPayment" id="formOfPayment">
                                        <option value="{{$transactions->formOfPayment}}" selected>{{$transactions->formOfPayment}}</option>    
                                        <option value="PAG-IBIG">PAG-IBIG</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Installment">Installment</option>
                                        <option value="Others">Others</option>
                                        
                                    </select>
                                </div>   
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
     
        
@endsection

