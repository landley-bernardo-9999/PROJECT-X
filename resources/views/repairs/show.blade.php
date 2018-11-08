@extends('layouts.app')
@section('content')
<br>
    <a class="btn btn-dark" role="button" href="/repairs"  style="width:155px"><i class="fas fa-arrow-circle-left"></i>&nbspBACK</a>
    <a href="{{$repair->id}}/edit" class="btn btn-danger float-right"  style="width:155px"><i class="fas fa-edit"></i>&nbspEDIT</a>
    {{-- {!!Form::open(['action' => ['RepairsController@destroy', $repair->id], 'method' => 'POST', 'class' =>'float-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}  
        {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
    {!!Form::close()!!} --}}
<br>
<br>
<hr>
<h3>Repair&nbsp<i class="fas fa-toolbox"></i></h3>
<br>
    <div class="container-fluid">
       <div class="row">
            <div class="col-lg-9">
                <table class="table table-striped">
                    <tr>
                        <th>Room No</th>
                        <td>{{$repair->roomNo}}</td>
                    </tr>
                    <tr>
                        <th>Reported By</th>
                        <td>{{$repair->name}}</td>
                    </tr>
                    <tr>
                        <th>Date Reported</th>
                        <td>{{Carbon\Carbon::parse($repair->dateReported)->formatLocalized('%b %d %Y')}}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{$repair->desc}}</td>
                    </tr>
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
                        <td>{{Carbon\Carbon::parse($repair->dateFinished)->formatLocalized('%b %d %Y')}}</td>
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

