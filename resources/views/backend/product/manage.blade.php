@extends('backend.backend-master')
@section('title', 'Manage Product page')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-header">
                        <span class="text-success">{{ Session::get('message') }}</span>
                        <h1 class="text-center">Manage Products</h1>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Serial Number</th>
                                    <th>Product Title</th>
                                    <th>Product Price</th>
                                    <th>Product Description</th>
                                    <th>Product Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Serial Number</th>
                                    <th>Product Title</th>
                                    <th>Product Price</th>
                                    <th>Product Description</th>
                                    <th>Product Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                               @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->product_title }}</td>
                                    <td>{{ $product->product_price }}</td>
                                    <td>{{ Str::limit($product->product_description, 200, '...') }}</td>
                                    <td><img src="{{ asset('/') }}{{ $product->product_image }}" alt="" width="100px" height="100px"></td>
                                    <td><a href="{{ route('product.status', ['id' => $product->id]) }}" class="nav-link text-white {{ $product->status == 1 ? 'btn btn-success' : 'btn btn-danger' }}">{{ $product->status == 1 ? 'Active' : 'Inactive' }}</a></td>
                                    <td class="d-flex gap-2">
                                        <a href="{{ route('product.edit', ['id' => $product->id]) }}" class="btn btn-warning">Edit</a>
                                        <a href="{{ route('product.delete', ['id' => $product->id]) }}" class="btn btn-danger" onclick="return confirm('Are you sure delete this product!!');">Delete</a>
                                    </td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection