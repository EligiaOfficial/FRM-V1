@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered" id="laravel_crud">
                <thead>
                <tr>
                    <th>Thumbnail</th>
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
                        <td><img src="{{ url('/images/'.$wish->thumbnail_name) }}" height="200px" width="260px"></td>
                        <td>{{ $wish->name }}</td>
                        <td>{{ $wish->description }}</td>
                        <td><a href="{{ $wish->product_link }}">{{ $wish->price }}</a></td>
                        <td>{{ $wish->created_at }}</td>

                            @if ( auth()->check() )
                        <td>
                            <a href="{{ route('wishlists.edit', $wish->id)}}" class="btn btn-primary p-3 w-100">Edit</a>
                            <form action="{{ route('wishlists.destroy', $wish->id)}}" method="post">
                                {{ csrf_field() }}
                                @method('DELETE')
                                <button class="btn btn-danger p-3 w-100 mt-3" type="submit">Delete</button>
                            </form>
                        </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
