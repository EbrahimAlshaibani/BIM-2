@extends('layouts.master')
@section('title')
    Home
@endsection
@section('content')

<section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">


    
        @foreach ($heros as $key => $item)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <div class="carousel-container">
                <h2 class="animate__animated animate__fadeInDown">{{$item->title}}</h2>
                <p class="animate__animated animate__fadeInUp">{{$item->desc}}</p>
                @if ($item->link)
                    <a href="{{$item->link}}" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
                @endif
                </div>
            </div>
        @endforeach
    

    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
    </a>

    <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
    </a>

    </div>
</section>

<main id="main">
        <section class="services">
        <div class="container">

            <div class="row">
         

                @foreach ($services as $key => $item)
                {{-- <style>
                    .icon-{{$key}}-box:hover{
                        border-color: {{$item->border_color}}
                    }
                </style> --}}
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon-box icon-{{$key}}-box" onmouseover="this.style='border-color:{{$item->border_color}};';"  onmouseout="this.style='background-color:none';">
                        {{-- <div class="icon-box icon-{{$key}}-box"
                        style="{color: blue; background: white} 
                            :hover {background: yellow}
                            > --}}
                    <div class="icon" style="background: {{$item->bg_color}};" ><i class="{{$item->icon}}" style="color: {{$item->icon_color}};"></i></div>
                    <h4 class="title"><a href="">{{$item->title}}</a></h4>
                    <p class="description">{{$item->desc}}</p>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
        </section>

        <section class="why-us section-bg" data-aos="fade-up" date-aos-delay="200">
        <div class="container">

            <div class="row">
            <div class="col-lg-6 video-box">
                <img src="assets/img/why-us.jpg" class="img-fluid" alt="">
                <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
            </div>

            <div class="col-lg-6 d-flex flex-column justify-content-center p-5">

                <div class="icon-box">
                <div class="icon"><i class="bx bx-fingerprint"></i></div>
                <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                </div>

                <div class="icon-box">
                <div class="icon"><i class="bx bx-gift"></i></div>
                <h4 class="title"><a href="">Nemo Enim</a></h4>
                <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
                </div>

            </div>
            </div>

        </div>
        </section>
        <section class="features">
        <div class="container">

            <div class="section-title">
            <h2>Features</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row" data-aos="fade-up">
            <div class="col-md-5">
                <img src="assets/img/features-1.svg" class="img-fluid" alt="">
            </div>
            <div class="col-md-7 pt-4">
                <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
                <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
                </p>
                <ul>
                <li><i class="bi bi-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="bi bi-check"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                </ul>
            </div>
            </div>

            <div class="row" data-aos="fade-up">
            <div class="col-md-5 order-1 order-md-2">
                <img src="assets/img/features-2.svg" class="img-fluid" alt="">
            </div>
            <div class="col-md-7 pt-5 order-2 order-md-1">
                <h3>Corporis temporibus maiores provident</h3>
                <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
                </p>
                <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                culpa qui officia deserunt mollit anim id est laborum
                </p>
            </div>
            </div>

            <div class="row" data-aos="fade-up">
            <div class="col-md-5">
                <img src="assets/img/features-3.svg" class="img-fluid" alt="">
            </div>
            <div class="col-md-7 pt-5">
                <h3>Sunt consequatur ad ut est nulla consectetur reiciendis animi voluptas</h3>
                <p>Cupiditate placeat cupiditate placeat est ipsam culpa. Delectus quia minima quod. Sunt saepe odit aut quia voluptatem hic voluptas dolor doloremque.</p>
                <ul>
                <li><i class="bi bi-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="bi bi-check"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                <li><i class="bi bi-check"></i> Facilis ut et voluptatem aperiam. Autem soluta ad fugiat.</li>
                </ul>
            </div>
            </div>

            <div class="row" data-aos="fade-up">
            <div class="col-md-5 order-1 order-md-2">
                <img src="assets/img/features-4.svg" class="img-fluid" alt="">
            </div>
            <div class="col-md-7 pt-5 order-2 order-md-1">
                <h3>Quas et necessitatibus eaque impedit ipsum animi consequatur incidunt in</h3>
                <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
                </p>
                <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                culpa qui officia deserunt mollit anim id est laborum
                </p>
            </div>
            </div>

        </div>
        </section>

    </main>
@endsection