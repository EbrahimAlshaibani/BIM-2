@extends('layouts.master')
@section('title')
    Portfolio
@endsection
@section('content')
<div style="height: 80px; background-color: black">

</div>
<main id="main">
    <section class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Our Portfolio</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Our Portfolio</li>
          </ol>
        </div>

      </div>
    </section><!-- End Our Portfolio Section -->

    <!-- ======= Portfolio Section ======= -->
    <section class="portfolio">
      <div class="container">

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
                @foreach ($categories as $category)
                    <li data-filter=".filter-{{$category->name}}">{{ $category->name }}</li>
                @endforeach
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
            @foreach ($products as $product)
            <div class="col-lg-4 col-md-6 portfolio-wrap filter-{{$product->category->name}}">
                <div class="portfolio-item">
                    <img src="{{ $product->images->count()!=0 ? asset( 'uploads/images/'. $product->images[0]->url) : "https://montevista.greatheartsamerica.org/wp-content/uploads/sites/2/2016/11/default-placeholder.png" }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h3>{{ $product->name }}</h3>
                        <div>
                        <a href="{{ $product->images->count()!=0 ? asset( 'uploads/images/'. $product->images[0]->url) : "https://montevista.greatheartsamerica.org/wp-content/uploads/sites/2/2016/11/default-placeholder.png" }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{ $product->name }}"><i class="bx bx-plus"></i></a>
                        <a href="{{ route('products.show', $product->id) }}" title="Portfolio Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
          {{ $products->links() }}
        </div>

      </div>
    </section>

  </main>
@endsection