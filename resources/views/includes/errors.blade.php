@if (count($errors))
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
               <strong><li>{{$error}}</li></strong>
                @endforeach
        </ul>
    </div>
    @endif