@extends ('layouts/main')
@section('content')
    <p><a class="btn btn-default" href="/eshop" role="button" >Return &raquo;</a></p>
    <div class="display-items text-center">
        @foreach($shopitems as $postkey)
            <div class="col-md-3 col-sm-6 col-xs-12 shopitem">
                <a  href="#"><i id="itemicon" class="fas fa-cart-plus fa-2x itemicon"></i></a>
                <img src="/images/{{$postkey->image}}"/>
                <p class="itemTitle"><strong>{{str_limit($postkey->title,40)}}</strong></p>
                <p>{{str_limit($postkey->description),40}}</p>
                <p class="pitemprice"><span class="itemprice">{{$postkey->price}} € </span>/ vnt</p>
                <p><a class="btn btn-default" href="/viewfullitem/{{$postkey->id}}" role="button" >View details &raquo;</a></p>
            </div>
    @endforeach
@endsection
