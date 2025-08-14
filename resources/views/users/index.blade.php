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

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>About</h2>
        <p>At Roy's Invest, we specialize in helping you make confident financial decisions through personalized insurance and investment solutions. With a legacy of over 35 years, we stand for trust, experience, and commitment.</p>
      </div><!-- End Section Title -->

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
            <p> Our approach is simple: understand your goals and provide clear, practical strategies to help you reach them. We focus on building long-term relationships that span generations — because your future deserves nothing less.
      </p></p>
            <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
          </div>

        </div>

      </div>

    </section><!-- /About Section -->


<!-- Services Section -->
<section id="services" class="services section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Our Services</h2>
    <p>We offer personalized insurance and investment solutions to help you and your family stay financially secure and protected.</p>
  </div><!-- End Section Title -->

  <div class="container">
    <div class="row gy-4">

      <!-- Life Insurance -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="service-item position-relative">
          <div class="icon">
            <i class="bi bi-heart-pulse"></i>
          </div>
          <h3>Life Insurance</h3>
          <p>We guide clients in choosing life insurance plans that ensure financial support for their families in case of unforeseen events.</p>
        </div>
      </div>

      <!-- Mutual Funds -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="service-item position-relative">
          <div class="icon">
            <i class="bi bi-piggy-bank"></i>
          </div>
          <h3>Mutual Funds</h3>
          <p>We help clients invest in the right mutual funds to grow their wealth based on goals and risk tolerance.</p>
        </div>
      </div>

      <!-- Health Insurance -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="service-item position-relative">
          <div class="icon">
            <i class="bi bi-hospital"></i>
          </div>
          <h3>Health Insurance</h3>
          <p>We assist clients in selecting health plans that offer medical coverage and protection from high healthcare costs.</p>
        </div>
      </div>

      <!-- Vehicle Insurance -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
        <div class="service-item position-relative">
          <div class="icon">
            <i class="bi bi-truck-front"></i>
          </div>
          <h3>Vehicle Insurance</h3>
          <p>We help clients find suitable car insurance to protect their vehicles from accidents, theft, and legal issues.</p>
        </div>
      </div>

      <!-- Building & Freight Insurance -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
        <div class="service-item position-relative">
          <div class="icon">
            <i class="bi bi-house-door"></i>
          </div>
          <h3>Building & Freight Insurance</h3>
          <p>We provide coverage solutions that protect properties and shipments from damage, theft, or natural disasters.</p>
        </div>
      </div>

      <!-- Agency Recruitment -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
        <div class="service-item position-relative">
          <div class="icon">
            <i class="bi bi-person-plus"></i>
          </div>
          <h3>Agency Recruitment</h3>
          <p>Join us as an insurance agent and build a rewarding career while helping others secure their future.</p>
        </div>
      </div>

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


    <!-- Features Section -->
    {{-- <section id="features" class="features section">

      <div class="container">

        <div class="row gy-4">

          <div class="features-image col-lg-6 order-lg-2" data-aos="fade-up" data-aos-delay="100"><img src="assets/img/features-bg.jpg" alt=""></div>

          <div class="col-lg-6 order-lg-1">

            <div class="features-item d-flex ps-0 ps-lg-3 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-archive flex-shrink-0"></i>
              <div>
                <h4>Est labore ad</h4>
                <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
              </div>
            </div><!-- End Features Item-->

            <div class="features-item d-flex mt-5 ps-0 ps-lg-3" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-basket flex-shrink-0"></i>
              <div>
                <h4>Harum esse qui</h4>
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
              </div>
            </div><!-- End Features Item-->

            <div class="features-item d-flex mt-5 ps-0 ps-lg-3" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-broadcast flex-shrink-0"></i>
              <div>
                <h4>Aut occaecati</h4>
                <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
              </div>
            </div><!-- End Features Item-->

            <div class="features-item d-flex mt-5 ps-0 ps-lg-3" data-aos="fade-up" data-aos-delay="500">
              <i class="bi bi-camera-reels flex-shrink-0"></i>
              <div>
                <h4>Beatae veritatis</h4>
                <p>Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta</p>
              </div>
            </div><!-- End Features Item-->

          </div>

        </div>

      </div>

    </section><!-- /Features Section --> --}}

    <!-- Clients Section -->
    {{-- <section id="clients" class="clients section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0 clients-wrap">

          <div class="col-xl-3 col-md-4 client-logo">
            <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-3 col-md-4 client-logo">
            <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-3 col-md-4 client-logo">
            <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-3 col-md-4 client-logo">
            <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-3 col-md-4 client-logo">
            <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-3 col-md-4 client-logo">
            <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-3 col-md-4 client-logo">
            <img src="assets/img/clients/client-7.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-3 col-md-4 client-logo">
            <img src="assets/img/clients/client-8.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

        </div>

      </div>

    </section><!-- /Clients Section --> --}}


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




    <!-- Pricing Section -->
    {{-- <section id="pricing" class="pricing section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Pricing</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="pricing-item">
              <h3>Free</h3>
              <h4><sup>$</sup>0<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li class="na">Pharetra massa</li>
                <li class="na">Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div><!-- End Pricing Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="pricing-item recommended">
              <span class="recommended-badge">Recommended</span>
              <h3>Business</h3>
              <h4><sup>$</sup>19<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li class="na">Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div><!-- End Pricing Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="pricing-item">
              <h3>Developer</h3>
              <h4><sup>$</sup>29<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li>Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div><!-- End Pricing Item -->

        </div>

      </div>

    </section><!-- /Pricing Section --> --}}

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


   <!-- Recent Posts Section -->
<section id="recent-posts" class="recent-posts section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Recent Blog Posts</h2>
    <p>Explore expert insights and the latest financial trends to stay ahead in your wealth journey.</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row gy-4">

      <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <article>

          <div class="post-img">
            <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
          </div>

          <p class="post-category">Financial Planning</p>

          <h2 class="title">
            <a href="blog-details.html">Top 5 Tips to Secure Your Financial Future</a>
          </h2>

          <div class="d-flex align-items-center">
            <img src="assets/img/blog/blog-author.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
            <div class="post-meta">
              <p class="post-author">Riya Kapoor</p>
              <p class="post-date">
                <time datetime="2025-07-15">Jul 15, 2025</time>
              </p>
            </div>
          </div>

        </article>
      </div><!-- End post list item -->

      <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <article>

          <div class="post-img">
            <img src="assets/img/blog/blog-2.jpg" alt="" class="img-fluid">
          </div>

          <p class="post-category">Investment</p>

          <h2 class="title">
            <a href="blog-details.html">Beginner's Guide to Smart Investing in 2025</a>
          </h2>

          <div class="d-flex align-items-center">
            <img src="assets/img/blog/blog-author-2.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
            <div class="post-meta">
              <p class="post-author">Amit Verma</p>
              <p class="post-date">
                <time datetime="2025-07-10">Jul 10, 2025</time>
              </p>
            </div>
          </div>

        </article>
      </div><!-- End post list item -->

      <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <article>

          <div class="post-img">
            <img src="assets/img/blog/blog-3.jpg" alt="" class="img-fluid">
          </div>

          <p class="post-category">Tax Planning</p>

          <h2 class="title">
            <a href="blog-details.html">How to Maximize Tax Savings Before the Financial Year Ends</a>
          </h2>

          <div class="d-flex align-items-center">
            <img src="assets/img/blog/blog-author-3.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
            <div class="post-meta">
              <p class="post-author">Neha Sharma</p>
              <p class="post-date">
                <time datetime="2025-06-28">Jun 28, 2025</time>
              </p>
            </div>
          </div>

        </article>
      </div><!-- End post list item -->

    </div><!-- End recent posts list -->

  </div>

</section><!-- /Recent Posts Section -->

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
        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
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
