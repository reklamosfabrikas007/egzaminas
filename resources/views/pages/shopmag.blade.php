@extends ('layouts/main')
@section('content')
    @include('includes/errors')

    <div class="container">
        <div class="row">
            <div class="col-sm-5">
        <h3 class="form-group"><a href="#warehouse" data-toggle="collapse">New Warehouse:</a></h3>
        <div id="warehouse" class="collapse">
            <form action="/savewarehouse" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Name:</label>
                    <input class="form-control input-sm" type="text" name="title" id="title">
                </div>
                <div class="form-group">
                    <label for="location">Location:</label>
                    <input class="form-control input-sm" type="text" name="location" id="location">
                </div>
                <div class="form-group">
                    <button id="postbtn" type="submit" name="submit" value="post" class="btn btn-default">Post</button>
                </div>
            </form>
    </div>
        <div class="warehousesView">
            <h2>Warehouses:</h2>
            @foreach($warehouse as $warekey)
                <a href="#AWC{{$warekey->id}}" data-toggle="collapse"><strong>{{$warekey->title}}</strong>-{{$warekey->location}}</a><br>
                <div id="AWC{{$warekey->id}}" class="collapse WarehouseForm">
                    <form action="/saveitem" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="text">Name:</label>
                            <input class="form-control input-sm" type="text" name="title" id="title">
                        </div>
                        <div class="form-group">
                            <label for="item_id">Product id:</label>
                            <input class="form-control input-sm" type="text" name="item_id" id="item_id">
                        </div>
                        <div class="form-group">
                            <label for="textarea">Description:</label>
                            <textarea class="form-control input-lg" name="description" id="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category:</label>
                            <select name="category_id">
                                @foreach($category as $oCat)
                                <option value="{{$oCat->id}}">{{$oCat->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input class="form-control input-sm" type="number" step="0.01" name="price" id="price">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <input class="form-control input-sm" type="number" name="quantity" id="quantity">
                        </div>
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input class="form-control-file input-sm" type="file" name="image" id="image">
                        </div>

                        <input class ="collapse" type="radio" name="warehouse_id" checked="checked"  value="{{$warekey->id}}">
                        <div class="form-group">
                            <button id="postbtn" type="submit" name="submit" value="post" class="btn btn-default">Post</button>
                        </div>

                    </form>
                </div>

            @endforeach
        </div>
        </div>
            <div class="col-sm-5">
                <h3>New category</h3>
                <form action="/savecategory" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="title">Name:</label>
                        <input class="form-control input-sm" type="text" name="title" id="title">
                    </div>
                    <div class="form-group">
                        <button id="postbtn" type="submit" name="submit" value="post" class="btn btn-default">Post</button>
                    </div>
                </form>
                <h3>Available Categories:</h3>
                    @foreach($category as $scat)
                        <p>{{$scat->title}}</p>
                    @endforeach
            </div>

        </div>
        </div>























    <div class="container">
        <h3 class="form-group"><a href="#hidden" data-toggle="collapse">New Item:(OLD)</a></h3>
        <div id="hidden" class="collapse">
        <form action="/saveitem" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="text">Name:</label>
                <input class="form-control input-sm" type="text" name="title" id="title">
            </div>
            <div class="form-group">
                <label for="item_id">Product id:</label>
                <input class="form-control input-sm" type="text" name="item_id" id="item_id">
            </div>
            <div class="form-group">
                <label for="textarea">Description:</label>
                <textarea class="form-control input-lg" name="description" id="description"></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input class="form-control input-sm" type="text" name="price" id="price">
            </div>
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