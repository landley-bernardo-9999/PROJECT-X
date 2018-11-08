@extends('layouts.app')
@section('content')
<br>

    <div class="container-fluid" >
            <a class="btn btn-dark" role="button" href="/propertymgmt" style="width: 155px"><i class="fas fa-arrow-circle-left"></i>&nbspBACK</a>
            <a class="btn btn-warning float-right" role="button" href="/propertymgmt/violations/create" style="width: 155px"><i class="fas fa-plus-circle fa-1x"></i>&nbspADD VIOLATION</a>
            <a href="/propertymgmt/violations" class="btn btn-dark" style="width: 155px"><i class="fas fa-user-times"></i>&nbspVIOLATIONS</a>
    </div>
   <br>
    @if(count($violations) > 0)
    <div class="container-fluid" >
            <table class="table table-striped">
               <thead class="thead-dark">
                <tr>
                    <th>No</th>
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
                            <td>{{$rowNo++}}</td>
                            <td>{{$violation->dateReported}}</td>
                            <td>{{$violation->name}}</td>
                            <td>{{$violation->roomNo}}</td>
                            <td>{{$violation->description}}</td>
                            <td>{{$violation->reportedBy}}</td>
                            <td>{{$violation->fine}}</td>
                            <td><a href="/propertymgmt/violations/{{$violation->id}}" class="btn btn-primary">MORE INFO</a></td>
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
    <div class="alert alert-danger" role="alert"><p>No Violations found!</p></div>
    @endif
            </div>
@endsection


