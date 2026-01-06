@extends('users.layouts.app')
@section('title',  $blog->slug.' | Roy\'s Invest')
@section('meta_description', Str::limit(strip_tags($blog->content), 150))

@section('content')

    <div class="page-title dark-background" data-aos="fade" style=" background-image: url('{{ $blog->image1 ? asset('public_storage/' . $blog->image2) : asset('assets/img/page-title-bg.webp') }}');">
        <div class="container position-relative">
        <h1>{{ $blog->title }}</h1>
        <nav class="breadcrumbs">
            <ol>
            <li><a href="{{ route('index') }}">Home</a></li>
            <li><a href="{{ route('user.blogs') }}">Blogs</a></li>
            <li class="current">{{ $blog->category }}</li>
            </ol>
        </nav>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-lg-8">
                <section id="blog-details" class="blog-details section">
                    <div class="container">
                        <article class="article">
                            <div class="post-img">
                                <img src="{{ asset('public_storage/' . $blog->image1) }}" alt="{{ $blog->title }}" class="img-fluid">
                            </div>
                            <h2 class="title">{{ $blog->title }}</h2>
                            <div class="meta-top">
                                <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#">Roy's Invest</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="{{ $blog->created_at->format('Y-m-d') }}"> {{ $blog->created_at->format('M d, Y') }} </time></a></li>
                                </ul>
                            </div>
                            <div class="content">
                                <p>{!! $blog->content !!}</p>
                            </div>
                            <div class="meta-bottom">
                                </ul>
                                <i class="bi bi-tags"></i>
                                <ul class="tags">
                                    <li><a href="{{ route('user.blogs', ['category' => 'Life Insurance']) }}">Life Insurance</a></li>
                                    <li><a href="{{ route('user.blogs', ['category' => 'Health Insurance']) }}">Health Insurance</a></li>
                                    <li><a href="{{ route('user.blogs', ['category' => 'Mutual Funds']) }}">Mutual Funds</a></li>
                                    <li><a href="{{ route('user.blogs', ['category' => 'Vehicle Insurance']) }}">Vehicle Insurance</a></li>
                                </ul>
                            </div>
                        </article>
                    </div>
                </section>
            </div>

            <div class="col-lg-4 sidebar">
                <div class="widgets-container">
                <!-- Blog Author Widget -->
                    <div class="blog-author-widget widget-item">
                        <div class="d-flex flex-column align-items-center">
                            <div class="d-flex align-items-center w-100">
                                <img src="{{ asset('assets/img/logo-bg.webp') }}" class="rounded-circle flex-shrink-0" alt="Logo">
                                <div>
                                <h4>Roy's Invest</h4>
                                <div class="social-links">
                                    <a href="#"><i class="bi bi-twitter-x"></i></a>
                                    <a href="https://www.facebook.com/share/1F58sma337/?mibextid=wwXIfr" target="_blank"><i class="bi bi-facebook"></i></a>
                                    <a href="https://www.instagram.com/roys.invest?igsh=NWltdHZ4eTNkZWhl&utm_source=qr" target="_blank"><i class="biu bi-instagram"></i></a>
                                    <a href="https://www.linkedin.com/company/roy-s-invest-linkedin-in/" target="_blank"><i class="biu bi-linkedin"></i></a>
                                </div>
                                </div>
                            </div>
                            <p>At Roy's Invest, we specialize in helping you make confident financial decisions through personalized insurance and investment solutions. With a legacy of over 35 years, we stand for trust, experience, and commitment.</p>
                        </div>
                    </div>

                    <!-- Recent Blogs -->
                    <div class="recent-posts-widget widget-item">
                        <h3 class="widget-title">Recent Blogs</h3>
                        @forelse($recentblogs as $recentblog)
                            <div class="post-item">
                            <img src="{{ asset('public_storage/'.$recentblog->image1) }}" alt="{{ $recentblog->category }}" class="flex-shrink-0">
                            <div>
                                <h4><a href="{{ route('user.blogs.details',$recentblog->slug) }}">{{ $recentblog->title }}</a></h4>
                                <time datetime="{{ $recentblog->created_at->format('Y-m-d') }}"> {{ $recentblog->created_at->format('M d, Y') }} </time>
                            </div>
                            </div>
                        @empty
                            <p>No recent blogs available.</p>
                        @endforelse
                    </div>
                </div>
                <div class="widgets-container">
                    <div class="recent-posts-widget widget-item">
                        <div class="contact section">
                            <h3 class="widget-title">Contact Us</h3>
                            <form action="{{ route('user.contact') }}" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                                @csrf
                                <div class="row gy-4">
                                    <div class="col-md-12">
                                        <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                                    </div>
                                    <div class="col-md-12">
                                        <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                                    </div>
                                    <div class="col-md-12">
                                        <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        @if($errors->any())
                                            <div class="error-message">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        @if(session('success'))
                                            <div class="sent-message">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                    </div>
                                    <button type="submit">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
