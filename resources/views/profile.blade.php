@extends('layouts.app')

@section('content')
    <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-lg-4">
                        
                </div>
                <div class="col-md-4 col-lg-4 text-center" >
                      <i class="far fa-user-circle fa-9x"></i>
                </div>
               
            </div>
          <br>
            <div class="row">
                <div class="col-md-12 col-lg-12">
                        <table class="table table-striped">
                                  <tr>
                                    <th scope="col">Name</th>
                                    <td scope="col">{{ Auth::user()->name }}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Email Address</th>
                                    <td>{{Auth::user()->email}}</td>    
                                  </tr>
                                  <tr>
                                    <th scope="row">Mobile Number</th>
                                    <td>{{Auth::user()->mobileNumber}}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Position</th>
                                    <td>{{Auth::user()->type}}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Department</th>
                                    <td>{{Auth::user()->department}}</td> 
                                  </tr>
                                  <tr>
                                    <th scope="row">Date Hired</th>
                                    <td>{{Carbon\Carbon::parse(Auth::user()->created_at)->formatLocalized('%b %d %Y')}}</td> 
                                  </tr>
                              </table>
                </div>
            </div>
    </div>
    
@endsection
