@extends ('layouts/main')
@section('content')
    <h2>DELETE/UPDATE</h2>
    <table>
    @foreach($post as $postkey)
            <tr>
                <th>{{$postkey->id}}</th>
        <th>{{$postkey->title}}</th>
        <th>{{$postkey->body}}</th>
        <th><a class="btn btn-warning" href="/post/{{$postkey->id}}/edit-post">Reconfigure</a></th>
        <th><a class="btn btn-danger" href="/post/{{$postkey->id}}/delete-post">DELETE</a></th>
            </tr>
    @endforeach
    <table>
        <h2>Create new shit</h2>
        <form action="/savepost" method="POST" class="form-horizontal" enctype="multipart/form-data">
            {{csrf_field()}}
            <h3 class="form-group">Post Upload:</h3>
            <div class="form-group">
                <label for="text">Pavadinimas:</label>
                <input class="form-control input-sm" type="text" name="title" id="title">
            </div>
            <div class="form-group">
                <label for="textarea">Tekstas:</label>
                <textarea class="form-control input-lg" name="body" id="body"></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input class="form-control-file input-sm" type="file" name="image" id="image">
            </div>
            <div class="form-group">
                <button id="postbtn" type="submit" name="submit" value="post" class="btn btn-default">Post</button>
            </div>
        </form>
@endsection
@if(Auth::check())
    {{Auth::user()->name}}
@else
@endif