@extends('layout')
@section('content')
    <a href="{{ route('wishlists.create') }}" class="btn btn-success mb-2 px-5">Add</a>
    <br>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered" id="laravel_crud">
                <thead>
                <tr>
                    <th>Thumbnail</th>
{{--                    <th>ID</th>--}}
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Created at</th>
                    <th colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $wishlist as $wish )
                    <tr>
                        <td><img src="{{ $wish->thumbnail_name }}" height="200px" width="260px"></td>
{{--                        <td>{{ $wish->id }}</td>--}}
                        <td>{{ $wish->name }}</td>
                        <td>{{ $wish->description }}</td>
                        <td><a href="{{ $wish->product_link }}">{{ $wish->price }}</a></td>
                        <td>{{ $wish->created_at }}</td>

                        <td>
                            <a href="{{ route('wishlists.edit', $wish->id)}}" class="btn btn-primary p-3 w-100">Edit</a>
                        <form action="{{ route('wishlists.destroy', $wish->id)}}" method="post">
                                {{ csrf_field() }}
                                @method('DELETE')
                                <button class="btn btn-danger p-3 w-100 mt-3" type="submit">Delete</button>
                            </form>
                        </td>


                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
