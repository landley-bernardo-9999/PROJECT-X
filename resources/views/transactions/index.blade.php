@extends('layouts.app')
@section('content')
<br>   
<br>
<div class="container">
            <div class="jumbotron" style="padding:5%">
                    <a href="/transactions" class="btn btn-secondary"><i class="fas fa-hands-helping"></i>&nbspEnrollment</a>
                    <br><br>
                    <p class="lead">This is the page transaction for the unit owner/authorized representative. 
                        Please explain to the owner/authorized representative very well the TERMS AND CONDITIONS of the Contract before enrolling/accepting.</p>
                    <hr class="my-4">
                    <p>Please select your option</p>
                    <p class="lead">
                        <a class="btn btn-secondary btn-md" role="button" href="/propertymgmt"><i class="fas fa-arrow-circle-left"></i>&nbspGo Back to Home</a>
                        <a class="btn btn-secondary btn-md" role="button" href="/transactions/create"><i class="fas fa-plus-circle fa-1x"></i>&nbspEnroll/Accept Owner</a>    
                    </p>
                  </div>
           
        

</div>
@endsection


