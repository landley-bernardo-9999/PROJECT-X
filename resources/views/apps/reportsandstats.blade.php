@extends('layouts.app')

@section('content')
<a class="btn btn-secondary btn-md" role="button" href="/home"><i class="fas fa-arrow-circle-left"></i>&nbspBack</a>
<br><br>
<div class="container">
        <div class="row">
          <div class="col-md-12">
              <div class="card text-center">
                  <div class="card-body">
                    <h1 class="card-title">Repairs</h1>
                    <h1>{{count($repairs)}}</h1>
               
                  </div>
                </div>
          </div>
        </div>
            <br>
            <h1>Per Status</h1>
        <div class="row">
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                          <h2 class="card-title">Pending</h2>
                          <h1>{{count($pending)}}</h1>
                        </div>
                      </div>
                </div>

                <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                              <h2 class="card-title">Ongoing</h2>
                              <h1>{{count($ongoing)}}</h1>
                            </div>
                          </div>
                    </div>

                <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h2 class="card-title">Closed</h2>
                                <h1>{{count($done)}}</h1>
                            </div>
                      </div>
                </div>
        </div>
        <br>
        <h1>Per Category</h1>
        <div class="row">
                <div class="col-md-2">
                    <div class="card text-center">
                        <div class="card-body">
                          <h5 class="card-title">Plumbing</h5>
                          <h1>{{count($plumbing)}}</h1>
                        </div>
                      </div>
                </div>

                <div class="col-md-2">
                        <div class="card text-center">
                            <div class="card-body">
                              <h5 class="card-title">Electric</h5>
                              <h1>{{count($electric)}}</h1>
                            </div>
                          </div>
                    </div>

                <div class="col-md-2">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Carpentry</h5>
                                <h1>{{count($carpentry)}}</h1>
                            </div>
                      </div>
                </div>

                <div class="col-md-2">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Tilling</h5>
                                <h1>{{count($tilling)}}</h1>
                            </div>
                      </div>
                </div>

                <div class="col-md-2">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Replacement</h5>
                                <h1>{{count($replacement)}}</h1>
                            </div>
                      </div>
                </div>

                <div class="col-md-2">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Renovation</h5>
                                <h1>{{count($renovation)}}</h1>
                            </div>
                      </div>
                </div>
        </div>
        <br>
        <h1>Per Maintenance</h1>
        <div class="row">
                <div class="col-md-2">
                    <div class="card text-center">
                        <div class="card-body">
                          <h5 class="card-title">Armando</h5>
                          <h1>{{count($armando)}}</h1>
                        </div>
                      </div>
                </div>

                <div class="col-md-2">
                        <div class="card text-center">
                            <div class="card-body">
                              <h5 class="card-title">Chris</h5>
                              <h1>{{count($chris)}}</h1>
                            </div>
                          </div>
                    </div>

                <div class="col-md-2">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Old Jeff</h5>
                                <h1>{{count($old_jeff)}}</h1>
                            </div>
                      </div>
                </div>

                <div class="col-md-2">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">New Jeff</h5>
                                <h1>{{count($new_jeff)}}</h1>
                            </div>
                      </div>
                </div>

                <div class="col-md-2">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Marlon</h5>
                                <h1>{{count($marlon)}}</h1>
                            </div>
                      </div>
                </div>

        </div>
        
</div>

@endsection