@extends ('layouts/main')
@section('content')
    <h2>{{$post->title}}</h2>
    <p>{{$post->body}}</p>
    <img src="/images/{{$post->image}}"/>
    <br>





    <div class="comments">
        <h1>Commentarszu</h1>
        <ul class="list-group usercomment">
            @foreach($post->comments as $comment)
                    <p class="commentPersonName">Anonimas</p>
                <li><strong>{{$comment->created_at}}</strong> No.{{$comment->id}}</li>
                <li class="list-group-item">{{$comment->body}}@auth
                        <a class="btn btn-danger commentDeleteButton" href="/viewfullpost/{{$comment->id}}/delete-post">DELETE</a>
                    @endauth</li>

                @endforeach
        </ul>
    </div>

    <hr>
    <h2>Reply to thread:</h2>
        <form action="/viewfullpost/{{$post->id}}/comment" method="POST" class="form-horizontal card-block" >
            {{csrf_field()}}
            <div class="form-group">
                <label for="textarea">Tekstas:</label>
                <textarea class="form-control input-lg" name="body" id="body"></textarea>
            </div>
            <div class="form-group">
                <button id="postbtn" type="submit" name="submit" value="post" class="btn btn-default">Post</button>
            </div>
        </form>

    @if(Auth::id()==$post->user_id)
        <a class="btn btn-warning" href="/post/{{$post->id}}/edit-post">Reconfigure</a>
        <a class="btn btn-danger" href="/post/{{$post->id}}/delete-post">DELETE</a>
    @endif
@endsection
@if(Auth::check())
    {{Auth::user()->name}}
    @else
@endif