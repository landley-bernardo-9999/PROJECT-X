@extends('layouts.app')
@section('content')
<br>    
    <a class="btn btn-secondary btn-md" role="button" href="/maintenances"><i class="fas fa-arrow-circle-left"></i></a>
    <a href="{{$maintenances->id}}/edit" class="btn btn-secondary"><i class="fas fa-user-edit"></i></a>
    {{-- {!!Form::open(['action' => ['MaintenancesController@destroy', $maintenances->id], 'method' => 'POST', 'class' =>'float-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}  
            {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
        {!!Form::close()!!} --}}
<br>
<br>
<h3>{{$maintenances->name}}&nbsp<i class="fas fa-wrench"></i></h3>
    <div class="container">
       <div class="row">
            <div class="col-lg-9">
                <table class="table">
                    <tr>
                        <th>Birthdate</th>
                        <td>{{Carbon\Carbon::parse($maintenances->birthDate)->format('F j, Y')}}</td>
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

       
       <div class="row">
        <div class="col-lg-12">
            <hr>
            <h3>Repairs&nbsp<i class="fas fa-toolbox"></i></h3>
            <br>
             <div class="panel panel-default">
            @if(count($repair) > 0)              
            <table class="table table-striped">
             <tr>
                <th>No</th>
                <th>Room</th>
                <th>Date Reported</th>
                <th>Reported By</th>
                <th>Description</th>
                <th>Status</th>
                <th>Cost</th>   
                <th></th>
             </tr>
             @foreach($repair as $repair)
             <tr>
                <td>{{ $rowNoForRepairs++ }}</td>
                <td><a href="/repairs/{{$repair->id}}" class="btn btn-secondary">{{$repair->roomNo}}</a></td>
                <td>{{Carbon\Carbon::parse($repair->dateReported)->format('F j, Y')}}</td>
                <td>{{$repair->name}}</td>
                <td>{{$repair->desc}}</td>
                <td>{{$repair->repairStatus}}</td>
                <td>{{$repair->cost}}</td>
                <td><a href="/repairs/{{$repair->id}}" class="btn btn-secondary">MORE INFO</a></td>
             </tr>
             @endforeach             
            </table>
            
            @else
            <div class="alert alert-danger" role="alert"><p>No records of concerns/repairs!</p></div>
            @endif
          </div>
              <a class="btn btn-secondary btn-md" role="button" href="/repairs/create"><i class="fas fa-plus-circle fa-1x"></i></a> 
    </div>
    <br>
        </div>
    </div>
@endsection

