@extends('layouts.app')
@section('content')
<br>    
    <a class="btn btn-secondary btn-md" role="button" href="/maintenances"><i class="fas fa-arrow-circle-left"></i></a>
    <a href="{{$maintenances->id}}/edit" class="btn btn-secondary"><i class="fas fa-user-edit"></i></a>
    {!!Form::open(['action' => ['MaintenancesController@destroy', $maintenances->id], 'method' => 'POST', 'class' =>'float-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}  
            {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
<br>
<br>
<h1>{{$maintenances->name}}</h1>
    <div class="container">
       <div class="row">
            <div class="col-lg-9">
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
                <div class="col-lg-3">
                    <div class="card" style="width: 20rem" >
                        <img class="card-img-top" src="/storage/maintenance_images/{{$maintenances->cover_image}}" alt="Card image cap">
                </div>
                </div>
       </div>
    </div>
@endsection

