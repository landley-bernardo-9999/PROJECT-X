@extends('layouts.app')
@section('content')
<br>
    <div class="container" >
            <a class="btn btn-secondary btn-md" role="button" href="/propertymgmt"><i class="fas fa-arrow-circle-left"></i>&nbspBack</a>
    </div>
   <br><br><br>
    @if(count($repairs) > 0)
    <div class="container"  >
            <table class="table">
                <tr>
                    <th>Date Reported</th>
                    <th>Room No</th>
                    <th>Description</th>
                    <th>Endorse To</th>
                    <th>Cost</th>
                    <th>Status</th>
                </tr>
                 @foreach($repairs as $repair)
                <tr>
                    <td><a href="/repairs/{{$repair->id}}">{{$repair->dateReported}}</a></td>
                    <td><a href="/rooms/{{$repair->roomNo}}">{{$repair->roomNo}}</a></td>
                    <td>{{$repair->desc}}</td>
                    <td>{{$repair->endorsedTo}}</td>
                    <td>{{$repair->cost}}</td>
                    <td>{{$repair->repairStatus}}</td>
                </tr>  
        @endforeach   
            </table>
    @else
    <div class="alert alert-danger" role="alert"><p>No Repairs found!</p></div>
    @endif
            </div>
@endsection


