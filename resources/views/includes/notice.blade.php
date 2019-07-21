@if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul list-group>
        @foreach($errors->all() as $error)
            <li list-group-item>{{$error}}</li>
        @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class ="alert alert-success">
         {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class ="alert alert-danger">
         {{session('error')}}
    </div>
@endif