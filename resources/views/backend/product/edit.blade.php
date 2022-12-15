@extends('backend.backend-master')
@section('title', 'Edit Product page')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Edit Product</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="product_title" class="form-label">Product Title</label>
                                <input type="text" name="product_title" id="product_title" class="form-control" value="{{ $product->product_title }}">
                                @error('product_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="product_price" class="form-label">Product Price</label>
                                <input type="number" name="product_price" id="product_price" class="form-control" value="{{ $product->product_price }}">
                                @error('product_price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="product_description" class="form-label">Product Description</label>
                                <textarea name="product_description" id="product_description" cols="30" rows="10" class="form-control">{{ $product->product_description }}</textarea>
                                @error('product_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="product_image" class="form-label">Product Price</label>
                                <img src="{{ asset('/') }}{{ $product->product_image }}" width="80px" height="80px" alt="" class="my-2">
                                <input type="file" name="product_image" id="product_image" class="form-control">
                                @error('product_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <input type="submit" value="Update Product" class="btn btn-success">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection