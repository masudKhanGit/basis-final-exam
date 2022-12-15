@extends('backend.backend-master')
@section('title', 'Create Product page')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Add Product</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="product_title" class="form-label">Product Title</label>
                                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Your Porduct Title">
                                @error('product_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="product_price" class="form-label">Product Price</label>
                                <input type="number" name="product_price" id="product_price" class="form-control" placeholder="Enter Your Price">
                                @error('product_price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="product_description" class="form-label">Product Description</label>
                                <textarea name="product_description" id="product_description" cols="30" rows="10" class="form-control" placeholder="Enter Your Product Description"></textarea>
                                @error('product_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="product_image" class="form-label">Product Price</label>
                                <input type="file" name="product_image" id="product_image" class="form-control">
                                @error('product_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <input type="submit" value="Add Product" class="btn btn-success">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection