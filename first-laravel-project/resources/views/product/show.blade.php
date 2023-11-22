@extends('layouts.master')
@section('content')
<main id="main">
        <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Portfolio Details</h2>
          <ol>
            <li><a href="{{route('index')}}">Home</a></li>
            <li><a href="{{route('portfolio')}}">Portfolio</a></li>
            <li><a href="{{route('products.show',$product->id)}}">{{$product->name}}</a></li>
          </ol>
        </div>

      </div>
    </section><!-- End Our Portfolio Section -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">


                @foreach ($product->images as $item)
                <div class="swiper-slide">
                    <img src="{{asset("uploads/images/$item->url")}}" alt="">
                  </div>
                @endforeach
              

            
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>Project information</h3>
              <ul>
                <li><strong>Category</strong>  {{$product->category->name}}</li>
                <li><strong>Seller</strong>: {{$product->seller}}</li>
                <li><strong>Project date</strong>: {{$product->created_at}}</li>
                <li><strong>Project URL</strong>: <a href="#">{{$product->url}}</a></li>
                {!! QrCode::encoding('UTF-8')
                ->color(0, 95, 112)
                ->backgroundColor(255, 255, 255)
                ->eyeColor(0, 0, 95, 112, 0, 95, 112)
                ->style('round')->eye('circle')
                ->size(200)
                // ->merge('https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885_1280.jpg')
                ->generate(Request::url()) !!}
              </ul>
            </div>
            <div class="portfolio-description">
              <h2>{{$product->title}}</h2>
              <p>
                {{$product->desc}}
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->
</main>

@endsection