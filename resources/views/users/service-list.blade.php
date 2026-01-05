@extends('users.layouts.app')
@section('title', $service->slug.' | Roy\'s Invest')
@section('meta_description', Str::limit(strip_tags($service->description), 150))
@section('content')

<!-- Page Title -->
<div class="page-title dark-background" data-aos="fade" style="background-image: url('{{ asset('public_storage/' . $service->image) }}');">
    <div class="container position-relative">
        <h1>{{ $service->name }}</h1>
        <p>{{ $service->description }}</p>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{ route('index') }}#services">Home</a></li>
                <li class="current">{{ $service->name }}</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Blog Posts Section -->
<section id="blog-posts" class="blog-posts section">
    <div class="container">
        <div class="row gy-4">
            @forelse ($subservices as $subservice)
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <article>
                        <div class="post-img">
                            <img src="{{ asset('public_storage/' . $subservice->image) }}" alt="" class="img-fluid">
                        </div>
                        <h2 class="title">
                            <a href="{{ route('user.service.details',['category'=>$service->slug,'slug'=>$subservice->slug]) }}">
                                {{ $subservice->name }}
                            </a>
                        </h2>
                        <p class="post-category">
                            {{ Str::limit(strip_tags($subservice->description), 150, '...') }}
                        </p>
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('assets/img/logo background.png') }}" alt="" class="img-fluid post-author-img flex-shrink-0">
                            <div class="post-meta">
                                <p class="post-author">Roy's Invest</p>
                            </div>
                        </div>
                    </article>
                </div>
            @empty
                <p>No Services available.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
