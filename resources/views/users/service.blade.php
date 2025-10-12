@extends('users.layouts.app')
@section('title', $service->slug.' |Roy\'s Invest')
@section('meta_description', Str::limit(strip_tags($service->description), 150))
@section('content')

    <div class="page-title dark-background" data-aos="fade" style=" background-image: url('{{ asset('storage/' . $service->image) }}');">
        <div class="container position-relative">
        <h1>{{ $subservice->name }}</h1>
        {{-- <p>{{ $service->description }}</p> --}}
        <nav class="breadcrumbs">
            <ol>
            <li><a href="{{ route('index') }}#services">Home</a></li>
            <li class="current">{{ $subservice->name }}</li>
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
                                <img src="{{ asset('storage/' . $subservice->image) }}" alt="" class="img-fluid">
                            </div>
                            <h2 class="title">{{ $subservice->name }}</h2>
                            <div class="meta-top">
                                <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#">Roy's Invest</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-tags"></i> <a href="#">{{ $service->name }}</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="{{ $subservice->created_at->format('Y-m-d') }}"> {{ $subservice->created_at->format('M d, Y') }} </time></a></li>
                                </ul>
                            </div>
                            <div class="content">
                                <p>{!! $subservice->content !!}</p>
                            </div>
                            <div class="meta-bottom">
                                </ul>
                                <i class="bi bi-tags"></i>
                                <ul class="tags">
                                    @foreach ($relatedservices as $relatedservice)
                                        <li><a href="{{ route('user.services', ['category' => $relatedservice->slug ]) }}">{{ $relatedservice->name }}</a></li>
                                    @endforeach
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
                                <img src="{{ asset('assets/img/logo-bg.png') }}" class="rounded-circle flex-shrink-0" alt="Logo">
                                <div>
                                <h4>Roy's Invest</h4>
                                <div class="social-links">
                                    <a href="https://x.com/#"><i class="bi bi-twitter-x"></i></a>
                                    <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                                    <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                                    <a href="https://instagram.com/#"><i class="biu bi-linkedin"></i></a>
                                </div>
                                </div>
                            </div>
                            <p>At Roy's Invest, we specialize in helping you make confident financial decisions through personalized insurance and investment solutions. With a legacy of over 35 years, we stand for trust, experience, and commitment.</p>
                        </div>
                        <div class="meta-bottom">
                                </ul>
                                <p class="widget-title"> <i class="bi bi-tags"></i>  Services </p>
                                <ul class="tags">
                                    @forelse ($relatedservices as $relatedservice)
                                        <li><a href="{{ route('user.services', ['category' => $relatedservice->slug ]) }}">{{ $relatedservice->name }}</a></li>
                                    @empty
                                        <p>No services available.</p>
                                    @endforelse
                                 </ul>
                            </div>
                    </div>
                    <!-- Recent Blogs -->
                    <div class="recent-posts-widget widget-item">
                        <h3 class="widget-title">Recent Blogs</h3>
                        @forelse($recentblogs as $recentblog)
                            <div class="post-item">
                            <img src="{{ asset('storage/'.$recentblog->image1) }}" alt="{{ $recentblog->category }}" class="flex-shrink-0">
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
                <!-- contact us -->
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
    <!-- Call To Action Section -->
<section id="call-to-action" class="call-to-action section dark-background">
  <img src="{{ asset('assets/img/cta-bg.jpg') }}" alt="">
  <div class="container">
    <div class="row" data-aos="zoom-in" data-aos-delay="100">
      <div class="col-xl-9 text-center text-xl-start">
        <h3>Take Control of Your Financial Future</h3>
        <p>Let us help you build wealth, protect what matters, and plan with confidence. Get expert guidance today.</p>
      </div>
      <div class="col-xl-3 cta-btn-container text-center">
        <a class="cta-btn align-middle" href="tel:+911234567890">Call Now</a>
      </div>
    </div>
  </div>
</section>
<section></section>

@endsection
