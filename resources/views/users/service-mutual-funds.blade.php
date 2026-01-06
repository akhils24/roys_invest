@extends('users.layouts.app')
@section('title', $service->slug.' | Roy\'s Invest')
@section('meta_description', Str::limit(strip_tags($service->description), 150))
@section('content')

<!-- Page Title -->
<div class="page-title dark-background" data-aos="fade" style="background-image: url('{{ asset('storage/' . $service->image) }}');">
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
                            <img src="{{ asset('storage/' . $subservice->image) }}" alt="" class="img-fluid">
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
                            <img src="{{ asset('assets/img/logo background.webp') }}" alt="" class="img-fluid post-author-img flex-shrink-0">
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

<!-- Partner Logos Section -->
<section id="clients" class="clients section">
    <div class="clients-carousel">
        @foreach ($partners as $partner)
              <div class="client-item"><img src="{{ asset('storage/' . $partner->logo) }}" class="img-fluid" alt="{{ $partner->name }}"></div>   
        @endforeach
    </div>
</section><br>

<style>

/* Clients section */
#clients {
    width: 100%;
    padding: 30px 0;
    background: #f8f9fa;
    overflow: hidden;
}

.clients-carousel {
    display: flex;
    flex-wrap: nowrap;
    gap: 40px;
    align-items: center;
    animation: scrollClients 30s linear infinite;
}

.client-item {
    flex: 0 0 auto;
}

.client-item img {
    height: 80px;
    object-fit: contain;
    transition: transform 0.3s ease, opacity 0.3s ease;
}

.client-item img:hover {
    transform: scale(1.1);
    opacity: 1;
}

@keyframes scrollClients {
    0% { transform: translateX(0); }
    100% { transform: translateX(-120%); }
}

#clients:hover .clients-carousel {
    animation-play-state: paused;
}

/* Responsive */
@media (max-width: 992px) {
    .client-item img { height: 60px; }
    .clients-carousel { gap: 25px; animation-duration: 30s; }
}

@media (max-width: 576px) {
    .client-item img { height: 50px; }
    .clients-carousel { gap: 15px; animation-duration: 40s; }
}
</style>

{{-- ===== JS for seamless infinite scroll ===== --}}
<script>
document.addEventListener("DOMContentLoaded", function () {
    const carousel = document.querySelector(".clients-carousel");
    if (!carousel) return;

    // duplicate logos for seamless scroll
    const clone = carousel.innerHTML;
    carousel.innerHTML += clone;

    let scrollAmount = 0;

    function animateScroll() {
        scrollAmount += 1; // speed of scroll
        if (scrollAmount >= carousel.scrollWidth / 2) {
            scrollAmount = 0; // reset after half the width (duplicated)
        }
        carousel.scrollLeft = scrollAmount;
        requestAnimationFrame(animateScroll);
    }

    animateScroll();

    // Optional: pause on hover
    carousel.addEventListener("mouseenter", () => cancelAnimationFrame(animateScroll));
    carousel.addEventListener("mouseleave", () => animateScroll());
});

</script>

@endsection
