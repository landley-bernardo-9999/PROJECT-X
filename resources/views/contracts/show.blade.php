@extends('layouts.app')
@section('content')
    <a class="btn btn-secondary btn-md" role="button" href="/rooms"><i class="fas fa-arrow-circle-left"></i></a>
    <a href="{{$contract->id}}/edit" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
    {{-- {!!Form::open(['action' => ['ContractsController@destroy', $contract->id], 'method' => 'POST', 'class' =>'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}  
        {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
    {!!Form::close()!!} --}}
<br>
<br>
<hr>
<h3>Contracts&nbsp<i class="fas fa-archive"></i></h3>
<br>
    <div class="container">
       <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <tr>
                        <th>Room of the Resident</th>
                        <td>{{$contract->residentRoomNo}}</td>
                    </tr>
                    <tr>
                        <th>Term of Contract</th>
                        <td>{{$contract->term}}</td>
                    </tr>
                    <tr>
                        <th>Name of the Resident</th>
                        <td>{{$contract->residentName   }}</td>
                    </tr> 
                    <tr>
                        <th>Move-In Charges</th>
                        <td>{{$contract->amountPaid}}</td>
                    </tr>
                    <tr>
                        <th>Move-In</th>
                        <td>{{Carbon\Carbon::parse($contract->moveInDate)->format('F j, Y')}}</td>
                    </tr>
                    <tr>
                        <th>Move-Out</th>
                        <td>{{Carbon\Carbon::parse($contract->moveOutDate)->format('F j, Y')}}</td>
                    </tr>
                   
                    <tr>
                        <th>Security Deposit</th>
                        <td>{{$contract->securityDeposit}}</td>
                    </tr>                  
                    <tr>
                        <th>Reason For Moving Out</th>
                        <td>{{$contract->reasonForMovingOut}}</td>
                    </tr>   
                </table>
                </div>             
       </div>
    </div>
     
        
@endsection

