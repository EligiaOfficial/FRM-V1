@extends('layout')
@section('content')
    <h2 style="margin-top: 12px;" class="text-center">Edit Product</a></h2>
    <br>
    <form action="{{ route('wishlists.update', $wishlist->id) }}" method="POST" name="update_product">
        {{ csrf_field() }}
        @method('PATCH')
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Name</strong>
                    <input type="text" name="name" class="form-control" placeholder="Enter Title">
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Image URL</strong>
                    <input type="text" name="thumbnail_name" class="form-control" placeholder="Enter Image URL">
                    <span class="text-danger">{{ $errors->first('thumbnail_name') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Description</strong>
                    <input type="text" name="description" class="form-control" placeholder="Enter Description">
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Price</strong>
                    <input type="text" name="price" class="form-control" placeholder="Enter Price">
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Product Link</strong>
                    <input type="text" name="product_link" class="form-control" placeholder="Enter Product Link">
                    <span class="text-danger">{{ $errors->first('product_link') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
