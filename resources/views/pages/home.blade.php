@extends ('layouts/main')
@section('content')
    @foreach($post as $postkey)
     <div class="col-md-3 col-sm-6 col-xs-12 postwrap postbox">

         <img src="/img/{{$postkey->image}}"/>
         <img src="{{url('iimages/'.$postkey->image)}}"/>

     <h2>{{str_limit($postkey->title,40)}}</h2>
     <p>{{str_limit($postkey->body, 200)}}</p>
         <p><a class="btn btn-default" href="/viewfullpost/{{$postkey->id}}" role="button" >View details &raquo;</a></p>
     </div>

 @endforeach
    <div class="col-md-4">
    {{$post->links()}}
    </div>
    @endsection

