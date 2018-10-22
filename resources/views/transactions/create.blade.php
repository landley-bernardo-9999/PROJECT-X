@extends('layouts.app')
@section('content')
<a class="btn btn-secondary btn-md" role="button" href="/transactions"><i class="fas fa-arrow-circle-left"></i></a>   
{!! Form::open(['action'=>'TransactionsController@store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card"style="padding:6%">
                    <div class="card-header">
                        <h3>Transaction Information</h3>
                    </div>
                <br>

         
                <div class="form-group row">
                        <label for="residenRoomNo" class="col-md-4 col-form-label text-md-right">Room No</label>
                    
                    <div class="col-md-6">
                        <select name="residentRoomNo" id="residentRoomNo" class="form-control">
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
                        <label for="name" class="col-md-4 col-form-label text-md-right">Name of the Owner</label>
                    
                    <div class="col-md-6">
                        <select name="name" id="name" class="form-control">
                            <option value="" disabled selected>Please select</option>
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
                        {{ Form::date('moveInDate',' ', ['class' => 'form-control']) }}
                    </div>
                </div>


                <div class="form-group row">
                    <label for="totalPrice" class="col-md-4 col-form-label text-md-right">Total Price</label>
                    <div class="col-md-6">
                        {{Form::number('totalPrice','',['class'=>'form-control'])}}
                    </div>     
                </div>
                
                <div class="form-group row">
                    <label for="downPayment" class="col-md-4 col-form-label text-md-right">DownPayment</label>
                    <div class="col-md-6">
                        {{Form::number('downPayment','',['class'=>'form-control'])}}
                    </div>     
                </div>

                <div class="form-group row">
                    <label for="downPaymentMonthlyAmortization" class="col-md-4 col-form-label text-md-right">DownPayment Monthly Amortization</label>
                    <div class="col-md-6">
                        {{Form::number('downPaymentMonthlyAmortization','',['class'=>'form-control'])}}
                    </div>     
                </div>

                <div class="form-group row">
                    <label for="monthlyAmortization" class="col-md-4 col-form-label text-md-right">Monthly Amortization</label>
                    <div class="col-md-6">
                        {{Form::number('monthlyAmortization','',['class'=>'form-control'])}}
                    </div>     
                </div>

                <div class="form-group row">
                    <label for="formOfPayment" class="col-md-4 col-form-label text-md-right">Form of Payment</label>
                        <div class="col-md-6">
                        <select class="form-control" name="formOfPayment" id="formOfPayment">
                            <option value="" selected disabled>Please select</option>    
                            <option value="PAG-IBIG">PAG-IBIG</option>
                            <option value="Cash">Cash</option>
                            <option value="Installment">Installment</option>
                            <option value="Others">Others</option>
                            
                        </select>
                    </div>   
                </div>
                
            <br>
            <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
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