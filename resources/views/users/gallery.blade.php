@extends('users.layouts.app')
@section('title', 'Gallery|Roy\'s Invest')
@section('content')

    <div class="page-title dark-background" data-aos="fade" style="background-image: url('{{ asset('assets/img/page-title-bg.webp') }}');">
        <div class="container position-relative">
        <h1>Gallery</h1>
        <p>Explore our collection of images showcasing our services and client experiences.</p>
        <nav class="breadcrumbs">
            <ol>
            <li><a href="{{ route('index') }}">Home</a></li>
            <li class="current"><a style="color: white" href="#">Gallery</a></li>
            </ol>
        </nav>
        </div>
    </div>
    @foreach ($categories as $category)
        <section id="portfolio" class="portfolio section">
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ $category->name }}</h2>
                <p>{{ $category->description }}</p>
            </div>
            <div class="container">
                <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($category->gallery as $gallery)
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                            <img src="{{ asset('storage/' . $gallery->image) }}" class="img-fluid" alt="{{ $gallery->title }}">
                        </div>
                    @endforeach
                </div>
                </div>
            </div>
        </section>
    @endforeach

@endsection