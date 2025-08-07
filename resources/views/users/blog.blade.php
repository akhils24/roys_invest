@extends('users.layouts.app')

@section('title', 'Blog')

@section('content')
<main class="main">

  <!-- Page Title -->
  <div class="page-title dark-background" data-aos="fade" style="background-image: url({{ asset('assets/img/page-title-bg.webp') }});">
    <div class="container position-relative">
      <h1>Blog</h1>
      <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam molestias.</p>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li class="current">Blog</li>
        </ol>
      </nav>
    </div>
  </div>
  <!-- End Page Title -->

  <!-- Blog Posts Section -->
  <section id="blog-posts" class="blog-posts section">
    <div class="container">
      <div class="row gy-4">

        @php
          $posts = [
            ['img' => 'blog-1.jpg', 'category' => 'Politics', 'title' => 'Dolorum optio tempore voluptas dignissimos', 'author_img' => 'blog-author.jpg', 'author' => 'Maria Doe', 'date' => '2022-01-01'],
            ['img' => 'blog-2.jpg', 'category' => 'Sports', 'title' => 'Nisi magni odit consequatur autem nulla dolorem', 'author_img' => 'blog-author-2.jpg', 'author' => 'Allisa Mayer', 'date' => '2022-06-05'],
            ['img' => 'blog-3.jpg', 'category' => 'Entertainment', 'title' => 'Possimus soluta ut id suscipit ea ut in quo quia et soluta', 'author_img' => 'blog-author-3.jpg', 'author' => 'Mark Dower', 'date' => '2022-06-22'],
            ['img' => 'blog-4.jpg', 'category' => 'Sports', 'title' => 'Non rem rerum nam cum quo minus olor distincti', 'author_img' => 'blog-author-4.jpg', 'author' => 'Lisa Neymar', 'date' => '2022-06-30'],
            ['img' => 'blog-5.jpg', 'category' => 'Politics', 'title' => 'Accusamus quaerat aliquam qui debitis facilis consequatur', 'author_img' => 'blog-author-5.jpg', 'author' => 'Denis Peterson', 'date' => '2022-01-30'],
            ['img' => 'blog-6.jpg', 'category' => 'Entertainment', 'title' => 'Distinctio provident quibusdam numquam aperiam aut', 'author_img' => 'blog-author-6.jpg', 'author' => 'Mika Lendon', 'date' => '2022-02-14'],
          ];
        @endphp

        @foreach ($posts as $post)
        <div class="col-lg-4">
          <article>
            <div class="post-img">
              <img src="{{ asset('assets/img/blog/' . $post['img']) }}" alt="" class="img-fluid">
            </div>
            <p class="post-category">{{ $post['category'] }}</p>
            <h2 class="title">
              <a href="#">{{ $post['title'] }}</a>
            </h2>
            <div class="d-flex align-items-center">
              <img src="{{ asset('assets/img/blog/' . $post['author_img']) }}" alt="" class="img-fluid post-author-img flex-shrink-0">
              <div class="post-meta">
                <p class="post-author">{{ $post['author'] }}</p>
                <p class="post-date">
                  <time datetime="{{ $post['date'] }}">{{ \Carbon\Carbon::parse($post['date'])->format('M d, Y') }}</time>
                </p>
              </div>
            </div>
          </article>
        </div>
        @endforeach

      </div>
    </div>
  </section>
  <!-- /Blog Posts Section -->

  <!-- Blog Pagination Section -->
  <section id="blog-pagination" class="blog-pagination section">
    <div class="container">
      <div class="d-flex justify-content-center">
        <ul>
          <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
          <li><a href="#">1</a></li>
          <li><a href="#" class="active">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li>...</li>
          <li><a href="#">10</a></li>
          <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
        </ul>
      </div>
    </div>
  </section>
  <!-- /Blog Pagination Section -->

</main>
@endsection
