@extends('layouts.app')
@section('content')
<a class="btn btn-dark float-left" role="button" href="/propertymgmt/rooms/{{$contract->residentRoomNo}}" ><i class="fas fa-arrow-circle-left"></i>&nbspBACK</a>
    
<a href="{{$contract->id}}/edit" class="btn btn-info float-left"><i class="fas fa-user-edit"></i>&nbspEDIT</a>

{!!Form::open(['action' => ['ContractsController@destroy', $contract->id],'id' => 'FormDeleteTime', 'method' => 'POST', 'class' =>'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}  
        {{Form::submit('DELETE',['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
<br>
<br>
<hr>
<h3>Contract&nbsp<i class="fas fa-archive"></i></h3>
<br>
    <div class="container-fluid">
       <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped">
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
                        <th>Security Deposit </th>
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

