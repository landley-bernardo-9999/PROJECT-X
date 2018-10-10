@extends('layouts.app')
@section('content')

<a class="btn btn-secondary btn-md" role="button" href="/repairs"><i class="fas fa-arrow-circle-left"></i>&nbspBack</a>
<a class="btn btn-secondary btn-md" role="button" href="/propertymgmt"><i class="fas fa-home"></i>&nbspHome</a>
<a href="{{$repair->id}}/edit" class="btn btn-secondary"><i class="fas fa-edit"></i>&nbspEdit</a>
{!!Form::open(['action' => ['RepairsController@destroy', $repair->id], 'method' => 'POST', 'class' =>'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}  
    {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
<h1>{{$repair->roomNo}}</h1>
    <div class="container">
       <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                <table class="table">
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
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                    <div class="card" style="width: 35rem" >
                        <img style="width:90%" class="card-img-top" src="/storage/repair_images/{{$repair->cover_image}}" alt="Card image cap">
                </div>
                </div>
       </div>
    </div>
     
        
@endsection

