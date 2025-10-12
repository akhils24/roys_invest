@extends('users.layouts.app')
@section('title', 'Gallery | Roy\'s Invest')
@section('meta_description', 'Explore our latest office updates, inaugurations, and company events through our gallery.')

@section('content')

    <!-- Page Header -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url('{{ asset('assets/img/page-title-bg.webp') }}');">
        <div class="container position-relative">
            <h1>Gallery</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="current">Gallery</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="row">

            <!-- Gallery Images -->
            <div class="col-lg-8">
                <section id="portfolio" class="portfolio section">
                    <div class="container">

                        @forelse($categories as $category)
                            @if($category->images->count())
                                <div class="category-section mb-5" id="category-{{ $category->id }}">
                                    <h2 class="category-title">{{ $category->name }}</h2>
                                    
                                    <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                                        <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                                            @foreach($category->images as $image)
                                                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ $image->category->slug ?? 'uncategorized' }}">
                                                    <img src="{{ asset('storage/' . $image->image_path) }}" 
                                                         class="img-fluid" 
                                                         alt="{{ $image->title }}">
                                                    <div class="portfolio-info">
                                                        <h4>{{ $image->title }}</h4>
                                                        <p>{{ $image->description ?? '' }}</p>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <div class="col-12">
                                <p class="text-center">No images available in the gallery</p>
                            </div>
                        @endforelse

                    </div>
                </section>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4 sidebar">
                <div class="widgets-container">

                    <!-- Categories Widget -->
                    <div class="widget-item">
                        <h3 class="widget-title">Categories</h3>
                        <ul class="list-group">
                            @forelse($categories as $category)
                                @if($category->images->count())
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <a href="#category-{{ $category->id }}">{{ $category->name }}</a>
                                        <span class="badge bg-primary rounded-pill">{{ $category->images->count() }}</span>
                                    </li>
                                @endif
                            @empty
                                <li>No categories available.</li>
                            @endforelse
                        </ul>
                    </div>

                    <!-- Recent Uploads Widget -->
                    <div class="widget-item mt-4">
                        <h3 class="widget-title">Recent Uploads</h3>
                        @php
                            // Get all images from all categories and take 5 most recent
                            $recentImages = $categories->pluck('images')->flatten()->sortByDesc('created_at')->take(5);
                        @endphp
                        @forelse($recentImages as $recent)
                            <div class="post-item d-flex mb-3">
                                <img src="{{ asset('storage/' . $recent->image_path) }}" alt="{{ $recent->title }}" class="flex-shrink-0 me-3" style="width: 80px; height: 80px; object-fit: cover;">
                                <div>
                                    <h5>{{ Str::limit($recent->title, 30) }}</h5>
                                    <time datetime="{{ $recent->created_at->format('Y-m-d') }}">{{ $recent->created_at->format('M d, Y') }}</time>
                                </div>
                            </div>
                        @empty
                            <p>No recent uploads.</p>
                        @endforelse
                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection

@push('styles')
    <!-- Fancybox for lightbox effect -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        Fancybox.bind("[data-fancybox]", {});
    </script>
@endpush