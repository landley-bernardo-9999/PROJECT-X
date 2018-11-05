@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <a class="btn btn-secondary btn-md" role="button" href="/propertymgmt"><i class="fas fa-arrow-circle-left"></i></a>
    <a class="btn btn-secondary btn-md" role="button" href="/residents/create"><i class="fas fa-user-plus"></i></a>
    <a href="/residents" class="btn btn-secondary"><i class="fas fa-users"></i>&nbspResidents</a>  
</div>
<br>
<div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-2 btn" style="border:solid black 1px; padding-bottom: 2%; padding-top: 2%; margin-left:4%">
                <h3>Active</h3>
                    <h1>{{count($active)}}</h1>
            </div>
            <div class="col-md-2 btn" style="border:solid black 1px; padding-bottom: 4%; padding-top: 2%; margin-left:2%">
                <h3>Harvard</h3>
                 <h1>{{count($harvard)}}</h1> 
            </div>
            <div class="col-md-2 btn" style="border:solid black 1px; padding-bottom: 4%; padding-top: 2%; margin-left:2%">
                <h3>Princeton</h3>
                 <h1>{{count($princeton)}}</h1>
            </div>
            <div class="col-md-2 btn" style="border:solid black 1px; padding-bottom: 4%; padding-top: 2%; margin-left:2%">
                <h3>Wharton</h3>
                 <h1>{{count($wharton)}}</h1>
            </div>
            <div class="col-md-2 btn" style="border:solid black 1px; padding-bottom: 4%; padding-top: 2%; margin-left:2%">
                <h3>Courtyard</h3>
                 <h1>{{count($courtyard)}}</h1> 
            </div>
        </div>
        <br>
        
    </div>
<br>
        <div class="container-fluid">

                <input type="text" name="search" id="search" class="form-control" placeholder="Search residents"/ role="submit">
<br>
                <h3 class="text-center">Residents found: <span id="total_records"></span></h3>
<br>    
            <table class="table table-hover table-striped table-borderless">
                <thead class="thead-light"> 
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Profile</th>
                    <th scope="col">Resident</th>
                    <th scope="col">Room</th>
                    <th scope="col">Status</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Email</th>
                    <th scope="col">Move-Out</th>
                    {{-- <th></th> --}}
                  </tr>
                </thead>
                <tbody>
                   
                </tbody>
              </table>
        </div>
        <script>
                $(document).ready(function(){
    
                    fetch_customer_data();
    
                    function fetch_customer_data(query = ''){
                        $.ajax({
                            url:"{{ route('search.action') }}",
                            method: 'GET',
                            data: {query:query},
                            dataType: 'json'
                            success:function(data)
                            {
                                $('tbody').html(data.table_data);
                                $('#total_records').text(data.total_data);
                            }
    
                        })
                    }
    
                    $(document).on('keyup', '#search', function(){
                        var query = $(this).val();
                        fetch_customer_data(query);
                    });
                });
                
            </script>
@endsection

        


