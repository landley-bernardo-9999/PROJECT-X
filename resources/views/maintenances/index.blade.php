@extends('layouts.style')
@section('content')
    {{-- <a class="btn btn-dark" role="button" href="/home"><i class="fas fa-arrow-circle-left"></i>&nbspBACK</a> --}}
    

    <div class="container-fluid"  >
        <div class="card">
            <div class="card-header">
                    <a class="btn btn-warning float-left" role="button" href="/propertymgmt/maintenances/create" ><i class="fas fa-user-plus"></i>&nbspADD PERSONNEL</a> 
            </div>
            <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Profile</th>
                        <th>Name</th>
                        <th>Schedule</th>
                        <th>Status</th>
                        <th>Mobile</th>
                        <th>Position</th>
                        <th>Action</th>                     
                    </tr>
                </thead>
                 
                <tbody>
                        @foreach($maintenances as $maintenance)
                    <tr>
                        <th>{{$rowNum++}}</td>
                        <td><img class="card-img-top" style="width: 35px" src="/storage/maintenance_images/{{$maintenance->cover_image}}" alt="Card image cap"></td>
                        <td>{{$maintenance->name}}</td>
                        <td>{{$maintenance->schedule}}</td>
                        <td>{{$maintenance->employmentStatus}}</td>
                        <td>{{$maintenance->mobileNumber}}</td>
                        <td>{{$maintenance->position}}</td>
                        <td><a href="/propertymgmt/maintenances/{{$maintenance->id}}" class="btn btn-info">MORE</a></td>
                      
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

           
        </div>
        <div class="card-footer">
                
            </div>
    </div>

            </div>
            <br>
@endsection


