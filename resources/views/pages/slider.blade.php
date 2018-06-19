@extends ('layouts/main')
@section('content')
    <div class="slider">
    @foreach($images as $image)
        {{$image}}
        @endforeach
    </div>
@endsection