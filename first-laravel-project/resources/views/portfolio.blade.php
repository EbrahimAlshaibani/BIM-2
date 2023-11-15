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
                    <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h3>{{ $product->name }}</h3>
                        <div>
                        <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" title="Portfolio Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
         

        </div>

      </div>
    </section>

  </main>
@endsection