@extends('layouts.app')
@section('content')
    <a class="btn btn-secondary btn-md" role="button" href="/violations"><i class="fas fa-arrow-circle-left"></i></a>
    <a href="{{$violation->id}}/edit" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
    {{-- {!!Form::open(['action' => ['ViolationsController@destroy', $violation->id], 'method' => 'POST', 'class' =>'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}  
        {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
    {!!Form::close()!!} --}}
<br>
<br>
<hr>
<h3>Violation&nbsp<i class="fas fa-user-times"></i></h3>
<br>
    <div class="container">
       <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <tr>
                        <th>Name of the violator</th>
                        <td>{{$violation->name}}</td>
                    </tr>
                    <tr>
                        <th>Date Reported</th>
                        <td>{{$violation->dateReported}}</td>
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
                        <td>{{$violation->dateCommitted}}</td>
                    </tr>
                    <tr>
                        <th>Reported By</th>
                        <td>{{$violation->reportedBy}}</td>
                    </tr>
                    <tr>
                        <th>Fine</th>
                        <td>{{$violation->fine}}</td>
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

