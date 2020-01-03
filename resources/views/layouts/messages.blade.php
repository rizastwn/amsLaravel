@if(count($errors) > 0)
    @foreach($errors->all() as $error)
    <center>
        <div class="alert alert-danger">
            {{$error}}
        </div>
    </center>
    @endforeach
@endif

@if(session('success'))
    <center>
    <div class="alert alert-success">
        {{session('success')}}
    </div>    
    </center>
    
@endif

@if(session('error'))
    <center>
    <div class="alert alert-danger">
    {{session('error')}}
    </div>
    </center>
    
@endif