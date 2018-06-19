@extends ('layouts/main')
@section('content')
    <div class="container">
        <form action="/post/{{$post->id}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            {{csrf_field()}}
            {{ method_field('PATCH') }}
            <h3 class="form-group">Post Upload:</h3>
            <div class="form-group">
                <label for="text">Pavadinimas:</label>
                <input class="form-control input-sm" type="text" name="title" id="title" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label for="textarea">Tekstas:</label>
                <textarea class="form-control input-lg" name="body" id="body">{{$post->body}}</textarea>
            </div>

            <div class="form-group">
                <button id="postbtn" type="submit" name="submit" value="post" class="btn btn-default">Post</button>
            </div>
        </form>
    </div>
@endsection
