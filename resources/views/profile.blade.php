@extends('layouts.app')

@section('content')
    <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-lg-4">
                        
                </div>
                <div class="col-md-4 col-lg-4 text-center" >
                        <i class="far fa-user-circle fa-10x"></i>
                </div>
                <div class="col-md-4 col-lg-4" >
                        
                </div>
            </div>
            <div class="row">
                <br><br>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12">
                        <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Name</th>
                                    <td scope="col">{{ Auth::user()->name }}</td>
                                
                                  </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <th scope="row">Email Address</th>
                                    <td>{{Auth::user()->email}}</td>    
                                  </tr>
                                  <tr>
                                    <th scope="row">Contact</th>
                                    <td>{{Auth::user()->contact}}</td>
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
                                    <td>{{Auth::user()->created_at}}</td> 
                                  </tr>
                                </tbody>
                              </table>
                </div>
            </div>
    </div>
    
@endsection
