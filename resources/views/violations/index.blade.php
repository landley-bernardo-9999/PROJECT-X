@extends('layouts.app')
@section('content')
<br>

    <div class="container" >
            <a class="btn btn-secondary btn-md" role="button" href="/propertymgmt"><i class="fas fa-arrow-circle-left"></i>&nbspBack</a>
            <a class="btn btn-secondary btn-md" role="button" href="/violations/create"><i class="fas fa-plus-circle fa-1x"></i>&nbspViolation</a>
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
                    <th>Details</th>
                    <th>Description</th>
                    <th>Reported By</th>
                    <th>Fine</th>
                </tr>
                 @foreach($violations as $violation)
                <tr>
                    <td>{{$rowNo++}}</td>
                    <td>{{$violation->dateReported}}</td>
                    <td>{{$violation->name}}</td>
                    <td>{{$violation->roomNo}}</td>
                    <td><a href="/violations/{{$violation->id}}">MORE INFO</a></td>
                    <td>{{$violation->description}}</td>
                    <td>{{$violation->reportedBy}}</td>
                    <td>{{$violation->fine}}</td>
                </tr>  
        @endforeach   
            </table>
            
    @else
    <div class="alert alert-danger" role="alert"><p>No Repairs found!</p></div>
    @endif
            </div>
@endsection


