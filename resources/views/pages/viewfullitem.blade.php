@extends ('layouts/main')
@section('content')
    <h2>{{$item->title}}</h2>
    <p>{{$item->body}}</p>
    <img src="/images/{{$item->image}}"/>
    <p>{{$item->quantity}} Vienetų</p>
    <p>${{$item->price}}</p>
    <br>


    <hr>
    <div class="comments">
        <h1>Komentarai</h1>
        <ul class="list-group usercomment">
            @foreach($item->itemcomments as $comment)
                <p class="commentPersonName">Anonimas</p>
                <li><strong>{{$comment->created_at}}</strong> No.{{$comment->id}}</li>
                <li class="list-group-item">{{$comment->body}}@auth
                        <a class="btn btn-danger commentDeleteButton" href="/viewfullpost/{{$comment->id}}/delete-post">DELETE</a>
                    @endauth</li>

            @endforeach
        </ul>
    </div>
    <h2>Make a Comment:</h2>
    <form action="/comment/{{$item->id}}" method="POST" class="form-horizontal card-block" >
        {{csrf_field()}}
        <div class="form-group">
            <label for="textarea">Tekstas:</label>
            <textarea class="form-control input-lg" name="body" id="body"></textarea>
        </div>
        <div class="form-group">
            <button id="postbtn" type="submit" name="submit" value="post" class="btn btn-default">Post</button>
        </div>
    </form>
    @if(Auth::id()==$item->user_id)
        <a class="btn btn-warning" href="/shopitem/{{$item->id}}/edit-item">Reconfigure</a>
        <a class="btn btn-danger" href="/shopitem/{{$item->id}}/delete-item">DELETE</a>
    @endif
@endsection