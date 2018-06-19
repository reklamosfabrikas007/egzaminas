<img src="{{storage_path('assets/images/')}}{{$postkey->image}}">
<img src="{{public_path('/assets/images/')}}{{$postkey->image}}">
<img src="{{public_path('/images/')}}{{$postkey->image}}">
<img src="{{storage_path('images/')}}{{$postkey->image}}">
<img src="{{Storage::disk('public')->url( $postkey->image) }}">