@if(count($errors) > 0 )
    <div class="container alert alert-danger">
        @foreach ($errors->all() as $error)
        <ul>
            <li>{{$error}}</li>
        </ul>
        @endforeach
    </div>
    
@endif

@if(session('success'))
    <div class="container alert alert-success">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="container alert alert-danger">
        {{session('error')}}
    </div>
@endif