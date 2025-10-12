@extends('users.layouts.app')
@section('title', 'Blog Details|Roy\'s Invest')
@section('content')

  <!-- Page Title -->
  <div class="page-title dark-background" data-aos="fade" style="background-image: url('{{ asset('assets/img/page-title-bg.webp') }}');">
    <div class="container position-relative">
      <h1>Blog</h1>
      <p>Explore expert insights and the latest financial trends to stay ahead in your wealth journey.</p>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="{{ route('index') }}">Home</a></li>
          <li class="current"><a style="color: white" href="{{ route('user.blogs') }}">Blog</a></li>
        </ol>
      </nav>
    </div>
  </div>

  <!-- Blog Posts Section -->
  <section id="blog-posts" class="blog-posts section">
    <div class="container">
      <div class="row gy-4">
      @forelse ($blogs as $blog)
        <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <article>
            <div class="post-img">
              <img src="{{ asset('storage/' . $blog->image1) }}" alt="" class="img-fluid">
            </div>
            <p class="post-category">{{ $blog->category }}</p>
            <h2 class="title">
              <a href="{{ route('user.blogs.details',$blog->slug) }}">{{ $blog->title}}</a>
            </h2>
            <div class="d-flex align-items-center">
              <img src="assets/img/logo background.png" alt="" class="img-fluid post-author-img flex-shrink-0">
              <div class="post-meta">
                <p class="post-author">Roy's Invest</p>
                <p class="post-date">
                  <time datetime="{{ $blog->created_at->format('Y-m-d') }}"> {{ $blog->created_at->format('M d, Y') }} </time>
                </p>
              </div>
            </div>
          </article>
        </div>
      @empty
        <p>No blogs available.</p>
      @endforelse
      </div>
    </div>
  </section>
@endsection
