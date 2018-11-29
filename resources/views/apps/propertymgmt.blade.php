@extends('layouts.appsidebar')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="row text-center">
                    <div class="btn" style="border:solid black 1px; padding-bottom: 2%; padding-top: 2%; margin-left:14%">
                        <h3>Rooms</h3>
                    <h1>{{count($rooms)}}</h1>
                    </div>
            </div>
        </div>
    </div>
@endsection