@extends('layouts.app')
@section('content')
<br>
    <a class="btn btn-secondary btn-md" role="button" href="/repairs"><i class="fas fa-arrow-circle-left"></i></a>
    <a href="{{$repair->id}}/edit" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
    {!!Form::open(['action' => ['RepairsController@destroy', $repair->id], 'method' => 'POST', 'class' =>'float-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}  
        {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
<br>
<br>
<h3>{{$repair->roomNo}}(Repair)</h3>
<br>
    <div class="container">
       <div class="row">
            <div class="col-lg-9">
                <table class="table">
                    <tr>
                        <th>Reported By</th>
                        <td>{{$repair->name}}</td>
                    <tr>
                    <tr>
                        <th>Date Reported</th>
                        <td>{{$repair->dateReported}}</td>
                    <tr>
                    <tr>
                        <th>Description</th>
                        <td>{{$repair->desc}}</td>
                    <tr>
                    <tr>
                        <th>Person In Charge</th>
                        <td>{{$repair->endorsedTo}}</td>
                    </tr>
                    <tr>
                        <th>Cost</th>
                        <td>{{$repair->cost}}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{$repair->repairStatus}}</td>
                    </tr>
                    <tr>
                        <th>Date Finished</th>
                        <td>{{$repair->dateFinished}}</td>
                    </tr>
                        
                    </table>
                </div>             
                <div class="col-lg-3">
                    <div class="card" style="width: 20rem" >
                        <img class="card-img-top" src="/storage/repair_images/{{$repair->cover_image}}" alt="Card image cap">
                </div>
                </div>
       </div>
    </div>
     
        
@endsection

