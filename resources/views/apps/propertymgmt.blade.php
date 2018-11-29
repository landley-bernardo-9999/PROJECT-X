@extends('layouts.appsidebar')
@section('content')
<div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-3 btn" style="border:solid black 1px;  padding-bottom: 4%; padding-top: 2%; margin-left:2%">
                <h3>Rooms</h3>
                <h1>{{count($rooms)}}</h1>
            </div>
            <div class="col-md-3 btn " style="border:solid black 1px; padding-bottom: 4%; padding-top: 2%; margin-left:2%">
                <h3>Residents</h3>
                <h1>{{count($residents)}}</h1>
            </div>
            <div class="col-md-3 btn " style="border:solid black 1px; padding-bottom: 4%; padding-top: 2%; margin-left:2%">
                <h3>Owners</h3>
                <h1>{{count($owners)}}</h1>
            </div>
            {{-- <div class="col-md-2 btn " style="border:solid black 1px; padding-bottom: 4%; padding-top: 2%; margin-left:2%">
                <h3>Violations</h3>
                <h1></h1>
            </div> --}}
        </div>
    </div>
@endsection

