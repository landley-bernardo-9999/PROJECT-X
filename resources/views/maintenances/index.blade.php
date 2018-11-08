@extends('layouts.app')
@section('content')
<br>
    <div class="container-fluid" >
            <a class="btn btn-dark" role="button" href="/propertymgmt" style="width:155px"><i class="fas fa-arrow-circle-left"></i>&nbspBACK</a>
            <a class="btn btn-warning float-right" role="button" href="/propertymgmt/maintenances/create" style="width:155px"><i class="fas fa-user-plus"></i>&nbspADD PERSONNEL</a>
            <a href="/propertymgmt/maintenances" class="btn btn-dark" style="width:155px"><i class="fas fa-wrench"></i>&nbspPERSONNEL</a>
    </div>
   
   <br>
    @if(count($maintenances) > 0)
    <div class="container-fluid"  >
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Profile</th>
                        <th>Name</th>
                        <th>Schedule</th>
                        <th>Status</th>
                        <th>Mobile</th>
                        <th>Position</th>
                        {{-- <th></th>                     --}}
                    </tr>
                </thead>
                 
                <tbody>
                        @foreach($maintenances as $maintenance)
                    <tr>
                        <th>{{$rowNum++}}</td>
                        <td><img class="card-img-top" style="width: 35px" src="/storage/maintenance_images/{{$maintenance->cover_image}}" alt="Card image cap"></td>
                        <td><a href="/propertymgmt/maintenances/{{$maintenance->id}}">{{$maintenance->name}}</a></td>
                        <td>{{$maintenance->schedule}}</td>
                        <td>{{$maintenance->employmentStatus}}</td>
                        <td>{{$maintenance->mobileNumber}}</td>
                        <td>{{$maintenance->position}}</td>
                      
                        {{-- <td>
                            {!!Form::open(['action' => ['MaintenancesController@destroy', $maintenance->id], 'method' => 'POST', 'class' =>'pull-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}  
                                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                            {!!Form::close()!!} 
                        </td> --}}
                       
                    </tr>  
                    @endforeach   
                </tbody>
       
            </table> 
        
    @else
    <div class="alert alert-danger" role="alert"><p>No Maintenance Personnels found!</p></div>
    @endif
            </div>
@endsection


