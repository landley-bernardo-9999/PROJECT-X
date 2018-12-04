<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!---Font awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    

</head>
<body>
    <div id="app">
        
        @include('includes.navbar')
        <hr class="my-0">
        <br>
        <div class="container-fluid" >
           <div class="row">
            <div class="col-md-2">
                @include('includes.sidebar')
            </div>
            
            <div class="col-md-2" >
                @yield('filter')
            </div>

            <div class="col-md-6" >
                @yield('content')
            </div>

            <div class="col-md-2" >
                @yield('action')
            </div>
           </div>
        </div>
        
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    {{-- ajax-form --}}
 
    <script type="text/javascript">

    // pop up form for resident's contract's form

        $(document).on('click','.add-resident', function(){
            $('#create-resident').modal('show');
            $('.resident-form').show();
            $('.resident-title').text('Add Resident');
        });

        // pop up for repair's form

         $(document).on('click','.add-repair', function(){
            $('#create-repair').modal('show');
            $('.repair-form-').show();
            $('.repair-title').text('Add Repair');
        });

        
         // pop up form for editing repair

        $(document).on('click','.edit', function(){
            $('#edit-repair').modal('show');
            $('.edit-repair-form').show();
            $('.edit-repair-title').text('Edit Repair');
        });


        // pop up form for owner's transaction's form

        $(document).on('click','.add-owner', function(){
            $('#create-owner').modal('show');
            $('.owner-form').show();
            $('.owner-title').text('Add Owner');
        });

        // pop up form for adding new room

        $(document).on('click','.add-room', function(){
            $('#create-room').modal('show');
            $('.room-form').show();
            $('.room-title').text('Add Room');
        });

         // pop up form for editing room

        $(document).on('click','.edit-room', function(){
            $('#edit-room').modal('show');
            $('.edit-room-form').show();
            $('.edit-room-title').text('Edit Room');
        });

        // pop up form for addding violation

        $(document).on('click','.add-violation', function(){
            $('#create-violation').modal('show');
            $('.add-violation-form').show();
            $('.add-violation-title').text('Add Violation');
        });


        // pop up form for editing violation

        $(document).on('click','.edit-violation', function(){
            $('#edit-violation').modal('show');
            $('.edit-violation-form').show();
            $('.edit-violation-title').text('Edit Violation');
        });


        // pop up form for editing supplies

        $(document).on('click','.edit-item', function(){
            $('#edit-item').modal('show');
            $('.edit-item-form').show();
            $('.edit-item-title').text('Edit Item');
        });

         // pop up form for adding resident info

        $(document).on('click','.add-resident-info', function(){
            $('#add-resident-info').modal('show');
            $('.add-resident-info-form').show();
            $('.add-resident-info-title').text('Add Resident');
        });

          // pop up form for editing resident info

        $(document).on('click','.edit-resident-info', function(){
            $('#edit-resident-info').modal('show');
            $('.edit-resident-info-form').show();
            $('.edit-resident-info-title').text('Edit Resident');
        });

         // pop up form for adding resident violation

        $(document).on('click','.add-violation', function(){
            $('#add-violation').modal('show');
            $('.add-violation-form').show();
            $('.add-violation-title').text('Add Violation');
        });

        // pop up form for adding owner

         $(document).on('click','.add-owner', function(){
            $('#add-owner').modal('show');
            $('.add-owner-form').show();
            $('.add-owner-title').text('Add Owner');
        });

        // pop up form for editing owner information

        $(document).on('click','.edit-owner', function(){
            $('#edit-owner').modal('show');
            $('.edit-owner-form').show();
            $('.edit-owner-title').text('Edit Owner');
        });

        // pop up form for editing transaction

        $(document).on('click','.edit-transaction', function(){
            $('#edit-transaction').modal('show');
            $('.edit-transaction-form').show();
            $('.edit-transaction-title').text('Edit Transaction');
        });

         // pop up form for adding maintennance personnel

         $(document).on('click','.add-personnel', function(){
            $('#add-personnel').modal('show');
            $('.add-personnel-form').show();
            $('.add-personnel-title').text('Add Personnel');
        });

     

        // Delete confirmation dialog
        $("#FormDeleteTime").submit(function (event) {
                 var x = confirm("Are you sure you want to delete?");
                    if (x) {
                        return true;
                    }
                    else {

                        event.preventDefault();
                        return false;
                    }

                });
    </script>

   
</body>
</html>
