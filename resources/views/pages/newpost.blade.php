@extends ('layouts/main')
@section('content')
    @include('includes/errors')
    <div class="container">
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

        <form action="/uploadimage" method="POST" class="form-horizontal" enctype="multipart/form-data">
            <h3 class="form-group">Image Upload: VEIKIA!</h3>
            {{csrf_field()}}
            <div class="form-group">
                <label for="image">Image:</label>
                <input class="form-control-file input-sm" type="file" name="image" id="image">
            </div>
                <div class="form-group">
                <button id="postbtn" type="submit" name="submit" value="post" class="btn btn-default">Post</button>
            </div>
        </form>
    </div>
@endsection