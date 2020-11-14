@extends('layout.admin.master')
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Products</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Products</h4>
                        <div class="card-header-action">
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addProduct">Add New Product</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->category->name}}</td>
                                        <td>
                                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="editProduct">Edit</a>
                                            <a href="#" class="btn btn-danger">Delete</a>
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
    </div>
</section>
@include('pages.admin.product.form')
@endsection