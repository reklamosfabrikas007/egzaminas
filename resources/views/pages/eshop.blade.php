@extends ('layouts/shopmain')
@section('content')
    <div class="CategoryDisplay col-sm-1 col-md-3">
        <h5>Kategorijos:</h5>
                @foreach($categoryshow as $catlist)
                    <a href="category/{{$catlist->id}}">{{$catlist->title}}</a><br>
                @endforeach

    </div>
    <div class="display-items text-center">
        @foreach($item as $postkey)
            <div class="col-md-4 col-sm-3 col-xs-12 col-lg-1 shopitem">
                <a  href="/add-to-cart/{{$postkey->id  }}"><i id="itemicon" class="fas fa-cart-plus fa-2x itemicon"></i></a>
                <img src="/images/{{$postkey->image}}"/>
                <p class="itemTitle"><strong>{{str_limit($postkey->title,40)}}</strong></p>
                <p>{{str_limit($postkey->description),100}}</p>
                <p class="pitemprice"><span class="itemprice">{{$postkey->price}} € </span>/ vnt</p>
                <p><a class="btn btn-default" href="/viewfullitem/{{$postkey->id}}" role="button" >View details &raquo;</a></p>
            </div>

        @endforeach
    </div>

@endsection