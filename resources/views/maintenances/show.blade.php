@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-1 col-md-1 col-xs-4">
            <a class="btn btn-secondary btn-md" role="button" href="/maintenances"><i class="fas fa-arrow-circle-left"></i>&nbspBack</a>
        </div>

        <div class="col-lg-1 col-md-1 col-xs-4">
            <a href="{{$maintenances->id}}/edit" class="btn btn-secondary"><i class="fas fa-edit"></i>&nbspEdit</a>
        </div>

        <div class="col-lg-1 col-md-1 col-xs-4">
            {!!Form::open(['action' => ['MaintenancesController@destroy', $maintenances->id], 'method' => 'POST', 'class' =>'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}  
                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        </div>

    </div>
</div>
<br>
<h1>{{$maintenances->name}}</h1>
    <div class="container">
       <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                <table class="table">
                    <tr>
                        <th>Birthdate</th>
                        <td>{{$maintenances->birthDate}}</td>
                    <tr>
                    <tr>
                        <th>Employment Status</th>
                        <td>{{$maintenances->employmentStatus}}</td>
                    </tr>
                    <tr>
                        <th>Position</th>
                        <td>{{$maintenances->position}}</td>
                    </tr>
                    <tr>
                        <th>Schedule</th>
                        <td>{{$maintenances->schedule}}</td>
                    </tr>
                    <tr>
                        <th>Mobile Number</th>
                        <td>{{$maintenances->mobileNumber}}</td>
                    </tr>
                        
                    </table>
                </div>             
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                    <div class="card" style="width: 35rem" >
                        <img style="width:80%" class="card-img-top" src="/storage/maintenance_images/{{$maintenances->cover_image}}" alt="Card image cap">
                </div>
                </div>
       </div>
    </div>
@endsection

