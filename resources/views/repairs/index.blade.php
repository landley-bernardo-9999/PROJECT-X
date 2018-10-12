@extends('layouts.app')
@section('content')
<br>
<div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-2 btn" style="border:solid black 1px; padding-bottom: 2%; padding-top: 2%; margin-left:14%">
                <h3>Total</h3>
                <h1>{{count($repairs)}}</h1>
            </div>
            <div class="col-md-2 btn btn-outline-warning" style="border:solid black 1px; padding-bottom: 4%; padding-top: 2%; margin-left:2%">
                <h3>Pending</h3>
                <h1>{{count($pending)}}</h1>
            </div>
            <div class="col-md-2 btn btn-outline-success" style="border:solid black 1px; padding-bottom: 4%; padding-top: 2%; margin-left:2%">
                <h3>Ongoing</h3>
                <h1>{{count($ongoing)}}</h1>
            </div>
            <div class="col-md-2 btn btn-outline-danger" style="border:solid black 1px; padding-bottom: 4%; padding-top: 2%; margin-left:2%">
                <h3>Closed</h3>
                <h1>{{count($closed)}}</h1>
            </div>
        </div>
    </div>
    <br>

    <div class="container" >
            <a class="btn btn-secondary btn-md" role="button" href="/propertymgmt"><i class="fas fa-arrow-circle-left"></i>&nbspBack</a>
            <a class="btn btn-secondary btn-md" role="button" href="/repairs/create"><i class="fas fa-plus-circle fa-1x"></i>&nbspRepair</a>
    </div>
   <br>
    @if(count($repairs) > 0)
    <div class="container"  >
            <table class="table table-striped">
                <tr>
                    <th>No</th>
                    <th>Room No</th>
                    <th>Date Reported</th>
                    <th>Description</th>
                    <th>Endorse To</th>
                    <th>Cost</th>
                    <th>Status</th>
                </tr>
                 @foreach($repairs as $repair)
                <tr>
                    <td>{{$rowNum++}}</td>
                    <td><a href="/rooms/{{$repair->roomNo}}">{{$repair->roomNo}}</a></td>
                    <td><a href="/repairs/{{$repair->id}}">{{$repair->dateReported}}</a></td>
                    <td>{{$repair->desc}}</td>
                    <td>{{$repair->endorsedTo}}</td>
                    <td>{{$repair->cost}}</td>
                    <td>{{$repair->repairStatus}}</td>
                </tr>  
        @endforeach   
            </table>
            {{$repairs->links()}}
    @else
    <div class="alert alert-danger" role="alert"><p>No Repairs found!</p></div>
    @endif
            </div>
@endsection


