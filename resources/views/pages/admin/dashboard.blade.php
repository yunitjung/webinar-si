@extends('layout.admin.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h4>Products</h4>
                            <div class="card-header-action">
                            <a href="#" class="btn btn-primary">View All</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Category</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->category->name}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h4>Categories</h4>
                            <div class="card-header-action">
                            <a href="#" class="btn btn-primary">View All</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{$category->name}}</td>
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
@endsection