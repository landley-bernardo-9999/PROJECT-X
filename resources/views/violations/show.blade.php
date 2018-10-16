@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-1">
            <a class="btn btn-secondary btn-md" role="button" href="/violations"><i class="fas fa-arrow-circle-left"></i>&nbspBack</a>
        </div>

        <div class="col-lg-1">
            <a href="{{$violation->id}}/edit" class="btn btn-secondary"><i class="fas fa-edit"></i>&nbspEdit</a>
        </div>

        <div class="col-lg-1">
            {!!Form::open(['action' => ['ViolationsController@destroy', $violation->id], 'method' => 'POST', 'class' =>'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}  
                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        </div>

    </div>
</div>
<br>
<h3>{{$violation->name}}(Violator)</h3>
<br>
    <div class="container">
       <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped">
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

