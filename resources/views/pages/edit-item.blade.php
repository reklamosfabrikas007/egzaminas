@extends ('layouts/main')
@section('content')
    <div class="container">
        <h3>Item Reconfigure</h3>
        <form action="/shopitem/{{$item->id}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            {{csrf_field()}}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label for="text">Name:</label>
                <input class="form-control input-sm" type="text" name="title" id="title" value="{{$item->title}}">
            </div>
            <div class="form-group">
                <label for="item_id">Product id:</label>
                <input class="form-control input-sm" type="text" name="item_id" id="item_id" value="{{$item->item_id}}">
            </div>
            <div class="form-group">
                <label for="textarea">Description:</label>
                <textarea class="form-control input-lg" name="description" id="description">{{$item->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input class="form-control input-sm" type="number" step="0.01" name="price" id="price" value="{{$item->price}}">
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input class="form-control input-sm" type="number" name="quantity" id="quantity" value="{{$item->quantity}}">
            </div>
            <div class="form-group">
                <button id="postbtn" type="submit" name="submit" value="post" class="btn btn-default">Post</button>
            </div>
        </form>
    </div>
@endsection