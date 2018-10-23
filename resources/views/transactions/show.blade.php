@extends('layouts.app')
@section('content')
    <a class="btn btn-secondary btn-md" role="button" href="/rooms"><i class="fas fa-arrow-circle-left"></i></a>
    <a href="{{$transaction->id}}/edit" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
    {{-- {!!Form::open(['action' => ['TransactionsController@destroy', $transaction->id], 'method' => 'POST', 'class' =>'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}  
        {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
    {!!Form::close()!!} --}}
<br>
<br>
<hr>
<h3>Transactions&nbsp<i class="fas fa-hands-helping"></i></h3>
<br>
    <div class="container">
       <div class="row">
            <div class="col-lg-12">
                <table class="table">
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
     
        
@endsection

