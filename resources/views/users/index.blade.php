@extends('users.layouts.app')
@section('content')

<!-- Hero Section -->
<section id="hero" class="hero section dark-background">

  <img src="{{ asset('assets/img/hero-bg.jpg')}}" alt="" data-aos="fade-in">

  <div class="container d-flex flex-column align-items-center text-center">
    <h2 data-aos="fade-up" data-aos-delay="100">Roy's Invest: Where Investment Meets Trust</h2>
    <p data-aos="fade-up" data-aos-delay="200">Your Trusted Financial Partner Since 1986</p>
    <div data-aos="fade-up" data-aos-delay="300">
      <a href="{{ asset('https://www.youtube.com/watch?v=Y7f98aduVJ8')}}" class="glightbox pulsating-play-btn"></a>
    </div>
  </div>

</section><!-- /Hero Section -->

<!-- About Section -->
<section id="about" class="about section">
  <div class="container section-title" data-aos="fade-up">
    <h2>About</h2>
    <p>At Roy's Invest, we specialize in helping you make confident financial decisions through personalized insurance and investment solutions. With a legacy of over 35 years, we stand for trust, experience, and commitment.</p>
  </div>
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
        <p>
          Roy's Invest empowers individuals and families to make confident financial decisions with expert guidance, tailored plans, and decades of trusted experience.
        </p>
        <ul>
          <li><i class="bi bi-check2-circle"></i> <span>35+ years of financial expertise</span></li>
          <li><i class="bi bi-check2-circle"></i> <span>Personalized investment solutions</span></li>
          <li><i class="bi bi-check2-circle"></i> <span>Trusted by 3 generations of clients</span></li>
        </ul>
      </div>
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
        <p> Our approach is simple: understand your goals and provide clear, practical strategies to help you reach them. We focus on building long-term relationships that span generations — because your future deserves nothing less.</p>
        <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
      </div>
    </div>
  </div>
</section>

<!-- Services Section -->
<section id="services" class="services section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Our Services</h2>
    <p>We offer personalized insurance and investment solutions to help you and your family stay financially secure and protected.</p>
  </div>
  <div class="container">
    <div class="row gy-4">

    @forelse ($services as $service)
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="service-item position-relative">
          <div class="icon">
            <i class="{{ $service->icon }}"></i>
          </div>
          <h3><a href="{{ route('user.services', ['category' => $service->slug ]) }}">{{ $service->name }}</a></h3>
          <p>{{ $service->description }}</p>
        </div>
      </div>
    @empty
        <p>No services available.</p>
    @endforelse

    </div>
  </div>
</section><!-- End Services Section -->

<!-- Call To Action Section -->
<section id="call-to-action" class="call-to-action section dark-background">

  <img src="assets/img/cta-bg.jpg" alt="">

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

</section><!-- /Call To Action Section -->

<!-- Recent Blog Posts Section -->
<section id="blogs" class="recent-posts section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Recent Blog Posts</h2>
    <p>Explore expert insights and the latest financial trends to stay ahead in your wealth journey.</p>
    <a href="/blogs" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
  </div>
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

<!-- Testimonials Section -->
<section id="testimonials" class="testimonials section light-background">

  <div class="container section-title" data-aos="fade-up">
    <h2>What Our Clients Say</h2>
    <p>Real reviews from Google — trusted by our clients.</p>
  </div>

  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://unpkg.com/swiper@9/swiper-bundle.min.css" />

  <div class="container-fluid px-0">
    <div class="swiper testimonials-swiper" aria-label="Client testimonials">
      <div class="swiper-wrapper" id="google-reviews">
        <!-- Skeleton slides (shown before data loads) -->
        <template id="skeleton-template">
          <div class="swiper-slide">
            <div class="testimonial-item p-3" style="min-height:140px;">
              <div class="skeleton-avatar rounded-circle"></div>
              <div class="skeleton-line mt-2"></div>
              <div class="skeleton-line short mt-1"></div>
            </div>
          </div>
        </template>
      </div>
    </div>

    <div class="text-center mt-3">
      <a href="#" id="more-reviews-link" class="read-more">
        <span>See more reviews on Google</span><i class="bi bi-arrow-right"></i>
      </a>
    </div>

    <div class="testimonial-pagination-wrapper text-center mt-3">
      <div class="swiper-pagination"></div>
    </div>
  </div>

  <style>
    .testimonial-item {
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 6px 18px rgba(15,23,42,0.06);
      padding: 18px;
      width: min(520px, calc(100% - 24px));
    }
    .testimonials-swiper .swiper-slide {
      display: flex;
      justify-content: center;
    }
    .testimonial-author { display: flex; align-items: center; gap: 0.75rem; }
    .testimonial-text {
      display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;
    }
    .skeleton-avatar, .skeleton-line {
      background: linear-gradient(90deg, #f2f2f2, #e6e6e6);
      border-radius: 4px;
    }
    .skeleton-avatar { width: 48px; height: 48px; border-radius: 50%; }
    .skeleton-line { height: 12px; width: 80%; margin-top: 6px; }
    .skeleton-line.short { width: 50%; }
    .testimonials-swiper .swiper-button-prev,
    .testimonials-swiper .swiper-button-next { display: none !important; }
    .testimonial-pagination-wrapper .swiper-pagination { position: static; margin-top: 12px; }
  </style>

  <script src="https://unpkg.com/swiper@9/swiper-bundle.min.js"></script>

  <script>
    (function() {
      const wrapper = document.getElementById('google-reviews');
      const moreLink = document.getElementById('more-reviews-link');
      const skeletonTemplate = document.getElementById('skeleton-template').innerHTML;
      let swiperInstance = null;

      // show skeletons
      wrapper.innerHTML = new Array(6).fill(skeletonTemplate).join('');

      const starsHtml = (rating = 5) =>
        Array.from({ length: 5 }, (_, i) =>
          `<svg width="14" height="14" viewBox="0 0 24 24"
            ${i < rating ? 'fill="currentColor"' : 'fill="none" stroke="currentColor"'}
          ><path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.787 1.402 8.168L12 18.896l-7.336 3.87
          1.402-8.168L.132 9.21l8.2-1.192z"/></svg>`
        ).join('');

      const makeSlide = (r) => `
        <div class="swiper-slide">
          <div class="testimonial-item">
            <div class="testimonial-author mb-2">
              <img src="${r.profile_photo_url || '/assets/img/logo background.png'}" alt="${r.author_name || 'Customer'}" class="rounded-circle" style="width:48px;height:48px;object-fit:cover;">
              <div>
                <strong>${r.author_name || 'Anonymous'}</strong>
                <div class="small text-muted">
                  ${starsHtml(Math.round(r.rating))}
                  <span class="ms-2">${r.relative_time_description || ''}</span>
                </div>
              </div>
            </div>
            <p class="testimonial-text mb-0">${r.text || ''}</p>
          </div>
        </div>`;

      function initSwiper(slideCount = 0) {
        if (swiperInstance) swiperInstance.destroy(true, true);
        swiperInstance = new Swiper('.testimonials-swiper', {
          slidesPerView: 1,
          spaceBetween: 5,
          loop: slideCount > 3,
          speed: 600,
          autoplay: { delay: 4000, disableOnInteraction: false, pauseOnMouseEnter: true },
          pagination: { el: '.swiper-pagination', clickable: true },
          breakpoints: {
            768: { slidesPerView: 2 },
            992: { slidesPerView: 3 },
            1200: { slidesPerView: 4 },
            1400: { slidesPerView: 5 }
          }
        });
      }

      async function loadReviews() {
        let data = { reviews: [], provider_url: null };

        try {
          const res = await fetch("{{ url('/api/google-reviews') }}");
          if (!res.ok) throw new Error('Network Error');
          data = await res.json();
          console.log('✅ Loaded reviews:', data);
        } catch (err) {
          console.warn('⚠️ Failed to load live reviews:', err);
          data.reviews = [
            { author_name: 'S. Nair', rating: 5, text: 'Excellent service and trustworthy advice.', relative_time_description: '2 months ago' },
            { author_name: 'A. Singh', rating: 4, text: 'Professional team and great results.', relative_time_description: '1 year ago' },
            { author_name: 'Priya', rating: 5, text: 'Helped me plan my investments with clarity.', relative_time_description: '3 weeks ago' }
          ];
        }

        wrapper.innerHTML = '';

        if (Array.isArray(data.reviews) && data.reviews.length) {
          data.reviews.forEach(r => wrapper.insertAdjacentHTML('beforeend', makeSlide(r)));
          if (data.provider_url) moreLink.href = data.provider_url;
          initSwiper(data.reviews.length);
        } else {
          wrapper.innerHTML = '<div class="swiper-slide"><div class="text-center p-4">No testimonials available.</div></div>';
          initSwiper(0);
        }
      }

      document.readyState === 'loading'
        ? document.addEventListener('DOMContentLoaded', loadReviews)
        : loadReviews();
    })();
  </script>
</section>


<!-- Stats Section --> 
<section id="stats" class="stats section dark-background">

  <img src="assets/img/stats-bg.jpg" alt="" data-aos="fade-in">

  <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

    <div class="subheading">
      <h3>Trusted by Businesses and Individuals Alike</h3>
      <p>Our numbers speak for themselves—demonstrating the confidence our clients place in our services.</p>
    </div>

    <div class="row gy-4">

      <div class="col-lg-3 col-md-6">
        <div class="stats-item text-center w-100 h-100">
          <span class="purecounter" data-purecounter-start="0" data-purecounter-end="500" data-purecounter-duration="1"></span>
          <p>Satisfied Clients</p>
        </div>
      </div><!-- End Stats Item -->

      <div class="col-lg-3 col-md-6">
        <div class="stats-item text-center w-100 h-100">
          <span class="purecounter" data-purecounter-start="0" data-purecounter-end="120" data-purecounter-duration="1"></span>
          <p>Financial Plans Delivered</p>
        </div>
      </div><!-- End Stats Item -->

      <div class="col-lg-3 col-md-6">
        <div class="stats-item text-center w-100 h-100">
          <span class="purecounter" data-purecounter-start="0" data-purecounter-end="1500" data-purecounter-duration="1"></span>
          <p>Hours of Consulting</p>
        </div>
      </div><!-- End Stats Item -->

      <div class="col-lg-3 col-md-6">
        <div class="stats-item text-center w-100 h-100">
          <span class="purecounter" data-purecounter-start="0" data-purecounter-end="400" data-purecounter-duration="1"></span>
          <p>Team Members</p>
        </div>
      </div><!-- End Stats Item -->

    </div>


  </div>

</section><!-- /Stats Section -->

  <!-- Faq Section -->
<section id="faq" class="faq section">

  <div class="container-fluid">

    <div class="row gy-4">

      <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">

        <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
          <h3><span>Frequently Asked </span><strong>Questions</strong></h3>
          <p>
            Have questions about managing your finances? Here are answers to some common queries to help you get started.
          </p>
        </div>

        <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">

          <div class="faq-item faq-active">
            <i class="faq-icon bi bi-question-circle"></i>
            <h3>Why should I work with a financial advisor?</h3>
            <div class="faq-content">
              <p>A financial advisor helps you create a customized plan to manage your finances, invest wisely, plan for retirement, and reach your financial goals more efficiently.</p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div><!-- End Faq item-->

          <div class="faq-item">
            <i class="faq-icon bi bi-question-circle"></i>
            <h3>What is the minimum investment needed to get started?</h3>
            <div class="faq-content">
              <p>We cater to a wide range of clients, and there is no fixed minimum. Our plans are tailored to your needs, whether you're just starting out or looking to grow a substantial portfolio.</p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div><!-- End Faq item-->

          <div class="faq-item">
            <i class="faq-icon bi bi-question-circle"></i>
            <h3>Is my financial information kept confidential?</h3>
            <div class="faq-content">
              <p>Absolutely. We follow strict privacy protocols and industry standards to ensure your personal and financial data is always secure and confidential.</p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div><!-- End Faq item-->

        </div>

      </div>

      <div class="col-lg-5 order-1 order-lg-2">
        <img src="assets/img/faq.jpg" class="img-fluid" alt="FAQ" data-aos="zoom-in" data-aos-delay="100">
      </div>
    </div>

  </div>

</section><!-- /Faq Section -->

<!-- Portfolio Section -->
<section id="portfolio" class="portfolio section">
      <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Gallery</h2>
      <p>UPDATES</p>
    </div>
    <div class="container">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <img src="assets/img/masonry-portfolio/masonry-portfolio-1.jpg" class="img-fluid" alt="">
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="assets/img/masonry-portfolio/masonry-portfolio-2.jpg" class="img-fluid" alt="">
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <img src="assets/img/masonry-portfolio/masonry-portfolio-3.jpg" class="img-fluid" alt="">
   
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <img src="assets/img/masonry-portfolio/masonry-portfolio-4.jpg" class="img-fluid" alt="">
              
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="assets/img/masonry-portfolio/masonry-portfolio-5.jpg" class="img-fluid" alt="">
              
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <img src="assets/img/masonry-portfolio/masonry-portfolio-6.jpg" class="img-fluid" alt="">
              
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <img src="assets/img/masonry-portfolio/masonry-portfolio-7.jpg" class="img-fluid" alt="">
             
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="assets/img/masonry-portfolio/masonry-portfolio-8.jpg" class="img-fluid" alt="">
             
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <img src="assets/img/masonry-portfolio/masonry-portfolio-9.jpg" class="img-fluid" alt="">
             
            </div><!-- End Portfolio Item -->

          </div><!-- End Portfolio Container -->
        </div>

    </div><!-- End Gallery Row -->
  </div><!-- End Container -->

</section><!-- End Gallery Section -->

<!-- Contact Section --> 
<section id="contact" class="contact section light-background">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Contact</h2>
    <p>Get in touch with Roys Invest — trusted by 3000+ clients with ₹250 Crores in assets under management.</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade" data-aos-delay="100">

    <div class="row gy-4">

      <div class="col-lg-4">
        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
          <i class="bi bi-geo-alt flex-shrink-0"></i>
          <div>
            <h3>Address</h3>
            <p>Building, Oppo. Johnson Lifts Pvt. Ltd, Twin Tower, Seaport - Airport Rd, Irumpanam, Kochi, Kerala 682309</p>
          </div>
        </div><!-- End Info Item -->

        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
          <i class="bi bi-telephone flex-shrink-0"></i>
          <div>
            <h3>Call Us</h3>
            <p>098461 44168</p>
          </div>
        </div><!-- End Info Item -->

        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
          <i class="bi bi-envelope flex-shrink-0"></i>
          <div>
            <h3>Email Us</h3>
            <p>info@example.com</p> <!-- Replace with your real email if available -->
          </div>
        </div><!-- End Info Item -->

      </div>

      <div class="col-lg-8">
        <form action="{{ route('user.contact') }}" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
          @csrf
          <div class="row gy-4">

            <div class="col-md-6">
              <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
            </div>

            <div class="col-md-6">
              <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
            </div>

            <div class="col-md-12">
              <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
            </div>

            <div class="col-md-12">
              <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
            </div>

            <div class="col-md-12 text-center">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>

              <button type="submit">Send Message</button>
            </div>

          </div>
        </form>
      </div><!-- End Contact Form -->

    </div>

  </div>

</section><!-- /Contact Section -->


 @endsection
