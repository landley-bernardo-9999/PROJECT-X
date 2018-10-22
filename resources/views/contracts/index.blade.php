@extends('layouts.app')
@section('content')
<br>   
<br>
<div class="container">
            <div class="jumbotron" style="padding:5%">
                    <a href="/contracts" class="btn btn-secondary"><i class="fas fa-archive"></i>&nbspContracts</a>
                    <br><br>
                    <p class="lead">This is the page contract. 
                        Please explain to the resident/s very well the HOUSE RULES AND REGULATIONS of the North Cambridge Condominium before signing up.</p>
                    <hr class="my-4">
                    <p>Please select your option</p>
                    <p class="lead">
                        <a class="btn btn-secondary btn-md" role="button" href="/propertymgmt"><i class="fas fa-arrow-circle-left"></i>&nbspGo Back to Home</a>
                        <a class="btn btn-secondary btn-md" role="button" href="/contracts/create"><i class="fas fa-plus-circle fa-1x"></i>&nbspAdd a Resident Contract</a>    
                    </p>
                  </div>
           
        

</div>
@endsection


