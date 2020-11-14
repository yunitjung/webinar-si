@extends('layout.user.master')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Products</h1>
    </div>

    <div class="section-body">
      <h2 class="section-title">Products</h2>
      <div class="row">
          @foreach ($products as $product)
          <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <article class="article article-style-b">
              <div class="article-header">
                <div class="article-image" data-background="../assets/img/news/img13.jpg">
                </div>
                @if ($product->category->name != 'Product')
                <div class="article-badge">
                  <div class="article-badge-item bg-danger">{{$product->category->name}}</div>
                </div>
                @endif
              </div>
              <div class="article-details">
                <div class="article-title">
                  <h2><a href="#">{{$product->name}}</a></h2>
                </div>
                <div class="article-cta">
                  {{-- <a href="#">Read More <i class="fas fa-chevron-right"></i></a> --}}
                </div>
              </div>
            </article>
          </div>
          @endforeach
      </div>
    </div>
</section>
@endsection