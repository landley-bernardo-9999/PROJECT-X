@extends('layouts.app')
@section('content')
<br>
    <div class="container" >
            <a class="btn btn-secondary btn-md" role="button" href="/propertymgmt"><i class="fas fa-arrow-circle-left"></i></a>
            <a class="btn btn-secondary btn-md" role="button" href="/maintenances/create"><i class="fas fa-user-plus"></i></a>
    </div>
   <br>
    @if(count($maintenances) > 0)
    <div class="container"  >
            <table class="table table-striped">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Schedule</th>
                    <th>Employment Status</th>
                    <th>Mobile Number</th>
                    <th>Position</th>
                    <th></th>
                    <th></th>                    
                </tr>
                 @foreach($maintenances as $maintenance)
                <tr>
                    <td>{{$rowNum++}}</td>
                    <td><a href="/maintenances/{{$maintenance->id}}">{{$maintenance->name}}</a></td>
                    <td>{{$maintenance->schedule}}</td>
                    <td>{{$maintenance->employmentStatus}}</td>
                    <td>{{$maintenance->mobileNumber}}</td>
                    <td>{{$maintenance->position}}</td>
                    <td>
                        <a href="/maintenances/{{$maintenance->id}}/edit" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                    </td>
                    <td>
                        {!!Form::open(['action' => ['MaintenancesController@destroy', $maintenance->id], 'method' => 'POST', 'class' =>'pull-right'])!!}
                            {{Form::hidden('_method', 'DELETE')}}  
                            {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!}
                    </td>
                   
                </tr>  
        @endforeach   
            </table> 
        
    @else
    <div class="alert alert-danger" role="alert"><p>No Maintenance Personnels found!</p></div>
    @endif
            </div>
@endsection


