@extends('layouts.app')
@section('content')
<br>

    <div class="container" >
            <a class="btn btn-secondary btn-md" role="button" href="/propertymgmt"><i class="fas fa-arrow-circle-left"></i></a>
            <a class="btn btn-secondary btn-md" role="button" href="/violations/create"><i class="fas fa-plus-circle fa-1x"></i></a>
            <a href="/violations" class="btn btn-secondary"><i class="fas fa-user-times">&nbspViolations</i></a>
    </div>
   <br>
    @if(count($violations) > 0)
    <div class="container"  >
            <table class="table table-striped">
                <tr>
                    <th>No</th>
                    <th>Date Reported</th>
                    <th>Name</th>
                    <th>Room No</th>
                    <th>Description</th>
                    <th>Reported By</th>
                    <th>Fine</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    
                </tr>
                 @foreach($violations as $violation)
                <tr>
                    <td>{{$rowNo++}}</td>
                    <td>{{$violation->dateReported}}</td>
                    <td>{{$violation->name}}</td>
                    <td>{{$violation->roomNo}}</td>
                    <td>{{$violation->description}}</td>
                    <td>{{$violation->reportedBy}}</td>
                    <td>{{$violation->fine}}</td>
                    <td><a href="/violations/{{$violation->id}}" class="btn btn-secondary"><i class="far fa-eye"></i></a></td>
                    <td>
                        <a href="/violations/{{$violation->id}}/edit" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                    </td>
                    <td>
                        {{-- {!!Form::open(['action' => ['ViolationsController@destroy', $violation->id], 'method' => 'POST', 'class' =>'pull-right'])!!}
                            {{Form::hidden('_method', 'DELETE')}}  
                            {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!} --}}
                    </td>
                </tr>  
        @endforeach   
            </table>
            
    @else
    <div class="alert alert-danger" role="alert"><p>No Violations found!</p></div>
    @endif
            </div>
@endsection


