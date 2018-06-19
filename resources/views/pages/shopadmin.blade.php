@extends ('layouts/main')
@section('content')
    <h2>DELETE/UPDATE</h2>
    <table>
        @foreach($item as $itemkey)
            <tr>
                <th>{{$itemkey->id}}</th>
                <th>{{$itemkey->title}}</th>
                <th>{{$itemkey->description}}</th>
               <th> <a class="btn btn-warning" href="/shopitem/{{$itemkey->id}}/edit-item">Reconfigure</a></th>
               <th> <a class="btn btn-danger" href="/shopitem/{{$itemkey->id}}/delete-item">DELETE</a></th>

            </tr>
        @endforeach
    </table>
@endsection