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
        <br><br>
        <div class="container">
            @include('includes.messages')
            @yield('content')
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
            $('.resident-title').text('Contract Information');
        });

        // pop up for repair's form

         $(document).on('click','.add-repair', function(){
            $('#create-repair').modal('show');
            $('.repair-form-').show();
            $('.repair-title').text('Repair Information');
        });

        
         // pop up form for editing repair

        $(document).on('click','.edit', function(){
            $('#edit-repair').modal('show');
            $('.edit-repair-form').show();
            $('.edit-repair-title').text('Edit');
        });


        // pop up form for owner's transaction's form

        $(document).on('click','.add-owner', function(){
            $('#create-owner').modal('show');
            $('.owner-form').show();
            $('.owner-title').text('Transaction Information');
        });

        // pop up form for adding new room

        $(document).on('click','.add-room', function(){
            $('#create-room').modal('show');
            $('.room-form').show();
            $('.room-title').text('Room Information');
        });

         // pop up form for editing room

        $(document).on('click','.edit-room', function(){
            $('#edit-room').modal('show');
            $('.edit-room-form').show();
            $('.edit-room-title').text('Edit');
        });

        // pop up form for addding violation

        $(document).on('click','.add-violation', function(){
            $('#create-violation').modal('show');
            $('.add-violation-form').show();
            $('.add-violation-title').text('Violation');
        });


        // pop up form for editing violation

        $(document).on('click','.edit-violation', function(){
            $('#edit-violation').modal('show');
            $('.edit-violation-form').show();
            $('.edit-violation-title').text('Edit');
        });


        // pop up form for editing supplies

        $(document).on('click','.edit-item', function(){
            $('#edit-item').modal('show');
            $('.edit-item-form').show();
            $('.edit-item-title').text('Edit');
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
