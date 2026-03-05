@extends('users.layouts.app')
@section('title', 'About Roy\'s Invest | 37 Years of Financial Expertise & Wealth Management')
@section('content')

<link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">
<script src="{{ asset('assets/js/about.js') }}" defer></script>
<div class="about-page">
<!-- HERO -->
<section class="about-hero">
    <span class="shape s1" aria-hidden="true"></span>
    <span class="shape s2" aria-hidden="true"></span>
    <div class="container">
        <div class="content">
            <h1 class="fw-bold display-5">A Legacy of Excellence</h1>
            <p class="lead">37 years of financial expertise and personalized client success</p>
            <div class="highlight-banner mt-4">
                <div class="col">
                    <strong>Founded</strong>
                    <div class="h-fs-16">1986</div>
                </div>
                <div class="col text-end">
                    <strong>Assets Under Management</strong>
                    <div class="h-fs-16">250+ Crores</div>
                </div>
            </div>
        </div>

        <div class="hero-visual" aria-hidden="true">
            <img src="{{ asset('assets/img/comp.webp') }}" alt="Roy's Invest Team">
        </div>
    </div>
</section>

<!-- ABOUT / COMPANY HISTORY -->
<section class="section">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold">About Roy's Invest</h2>

        <div style="max-width:900px; margin:0 auto; line-height:1.8; color:#333">
            <p style="font-size:1.05rem; margin-bottom:18px">
                At Roy's Invest, we bring 37 years of financial expertise and client success to the table. Since our humble beginnings and founding in 1986, we have successfully navigated the early years' challenges and triumphs by building a strong reputation through personalized service.
            </p>
            <p style="margin-bottom:18px">
                Our dedication to our clients' financial well-being has earned us industry recognition, including multiple Crorepathi tags in the insurance sector and being named the "best of the month" mutual fund distributor multiple times in Cochin. Following years of steady growth, we proudly opened our main office in 2002.
            </p>
            <p style="font-weight:600; color:#16a34a; margin-top:24px">
                Our mission: Adapting to market changes by carefully diversifying the investment portfolio of every client.
            </p>
        </div>
    </div>
</section>


<!-- SERVICES -->
<section class="section bg-light">
    <div class="container">
        <h2 class="text-center fw-bold mb-4">Comprehensive Financial Services</h2>
        <p class="text-center" style="color:#666; margin-bottom:36px; max-width:700px; margin-left:auto; margin-right:auto">We believe in adapting to market changes by carefully diversifying the investment portfolio of every client.</p>

        <div class="row">
            <div class="col-md-4">
                <div class="card hover-card">
                    <div class="card-body">
                        <h5 class="text-primary fw-bold">Life Insurance</h5>
                        <p>We consider this the first priority for every investor to ensure long-term security and family protection.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card hover-card">
                    <div class="card-body">
                        <h5 class="text-primary fw-bold">Health Insurance</h5>
                        <p>You are the most valuable asset to your family. We help protect you from life's uncertainties with tailored coverage.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card hover-card">
                    <div class="card-body">
                        <h5 class="text-primary fw-bold">Mutual Funds</h5>
                        <p>Expanded offerings tailored to diverse client needs through strategic equity and debt investments for sustainable growth.</p>
                    </div>
                </div>
            </div>
        </div>

        <div style="background:#fff; border-radius:12px; padding:28px; margin-top:24px; border-left:4px solid #16a34a">
            <h5 class="fw-bold text-primary mb-3">Add-On Services</h5>
            <p style="margin:0; color:#666">Motor Insurance • Agents Recruitment • Passport Seva • ELSS • NPS</p>
        </div>
    </div>
</section>

<!-- PHOTO GALLERY -->
<section class="section">
    <div class="container">
        <h2 class="text-center fw-bold mb-4">Company Photos</h2>
        {{-- <p class="text-center" style="color:var(--muted)">Click to enlarge. Replace placeholders with real images in <strong>public/images</strong>.</p> --}}
        <div class="photo-gallery mt-4">
            <div class="photo-item"><img src="{{ asset('assets/img/company-photo.webp') }}" alt="photo 1"></div>
            <div class="photo-item"><img src="{{ asset('assets/img/team-photo.webp') }}" alt="photo 2"></div>
            <div class="photo-item"><img src="{{ asset('assets/img/company-ad.webp') }}" alt="photo 3"></div>
        </div>
    </div>
</section>

<!-- TEAM -->
<section class="section bg-light">
    <div class="container">
        <h2 class="text-center fw-bold mb-4">Our Leadership Team</h2>
        <div class="team-grid-2">
            <div class="team-card-full">
                <img src="{{ asset('assets/img/roy.webp') }}" alt="CEO">
                <h5 class="fw-bold mt-3">Roy K. Paul – Founder & CEO</h5>
                {{-- <h5 class="fw-bold mt-3">CEO & Founder</h5> --}}
                <p class="text-muted" style="font-size:0.9rem; margin-bottom:12px">Roy K. Paul, Founder and CEO of RoysInvest, began his career in financial services in 1986 with the Life Insurance Corporation of India. Over nearly four decades, he has built a strong reputation for integrity, disciplined financial planning, and long-term client relationships, earning multiple recognitions including CM’s Club Membership and senior advisory roles in the Ernakulam region.</p>
                <p style="color:#333; line-height:1.6">Under his leadership, RoysInvest has grown from insurance services into a comprehensive financial advisory firm offering mutual fund guidance, debt investments, risk management, and structured wealth planning. Today, the company proudly serves second- and third-generation clients — a testament to the trust, transparency, and lasting financial partnerships he has nurtured.</p>
            </div>

            <div class="team-card-full">
                <img src="{{ asset('assets/img/jithin.webp') }}" alt="Co-Founder">
                <h5 class="fw-bold mt-3">Jithin K. Roy – CIO</h5>
                {{-- <h5 class="fw-bold mt-3">Manager</h5> --}}
                <p class="text-muted" style="font-size:0.9rem; margin-bottom:12px">Jitin K. Roy represents the next generation of leadership at RoysInvest, combining modern market insight with the strong legacy built by his father. With experience across equity investments, mutual funds, debt instruments, commodities, and portfolio planning, he focuses on helping clients make structured, goal-based financial decisions supported by research and disciplined risk management.</p>
                <p style="color:#333; line-height:1.6">By blending innovation with RoysInvest’s longstanding culture of trust and personalized service, Jitin plays a key role in strengthening investor confidence and supporting sustainable wealth creation. His approach ensures the firm continues to evolve while preserving the values that have defined RoysInvest for decades.</p>
            </div>
        </div>
    </div>
</section>


<!-- STATS -->
<section class="section text-center">
    <div class="container">
        <h2 class="fw-bold mb-4">Why Choose Roy's Invest?</h2>
        <p style="color:#666; margin-bottom:36px; max-width:700px; margin-left:auto; margin-right:auto">The backbone of Roy's Invest is our reputable team, and fostering deep, lasting client relationships is at the very heart of our approach. We stay ahead of the curve by pioneering new investment strategies and focusing heavily on sustainable and responsible investing.</p>

        <div class="stats-grid">
            <div class="stat">
                <h1 class="counter plus" data-target="250">0</h1><span style="font-size:0.85rem; color:#666"></span>
                <p>Assets Under Management (Crores)</p>
            </div>

            <div class="stat">
                <h1 class="counter plus" data-target="98">0</h1><span style="font-size:0.85rem; color:#666"></span>
                <p>Client Satisfaction Rate (%)</p>
            </div>

            <div class="stat">
                <h1 class="counter plus" data-target="10">0</h1><span style="font-size:0.85rem; color:#666"></span>
                <p>Average Client Tenure (Years)</p>
            </div>

            <div class="stat">
                <h1 style="font-size:2.6rem; font-weight:700; color:var(--primary); display:inline">100%</h1>
                <p>Customized Strategies</p>
            </div>
        </div>
    </div>
</section>


<!-- TECHNOLOGY -->
<section class="section bg-light">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">Embracing Technology for Your Convenience</h2>
        <p style="color:#666; margin-bottom:36px; max-width:700px; margin-left:auto; margin-right:auto">We leverage innovation for client success. Through our dedicated mobile app, you have 24/7 access to portfolio management.</p>

        <div class="tech-grid">
            <div class="tech">
                <h5 class="fw-bold text-primary">Mobile App Access</h5>
                <p>Full access to your portfolio management anytime, anywhere with our intuitive mobile application.</p>
            </div>

            <div class="tech">
                <h5 class="fw-bold text-primary">Data Security</h5>
                <p>State-of-the-art protection utilizing advanced encryption ensuring complete confidentiality of your sensitive information.</p>
            </div>
        </div>
    </div>
</section>


<!-- CTA -->
<section class="cta" style="background:linear-gradient(135deg, rgba(22,163,74,0.95), rgba(16,185,129,0.9)); color:#fff">
    <div class="container">
        <h2 class="fw-bold mb-3">Connect With Us</h2>
        <p class="mb-4" style="opacity:0.95">Your feedback helps us improve and serve you better! Stay updated on the latest financial insights by following our social media handles.</p>
        <div style="display:flex; gap:12px; justify-content:center; flex-wrap:wrap">
            <a href="/contact" class="btn-cta">Schedule Consultation</a>
            <a href="https://share.google/SavHNu487o19TxNdO" target="_blank" class="btn-cta" style="background:rgba(255,255,255,0.2); color:#fff; border:1px solid rgba(255,255,255,0.5)">Google Review</a>
        </div>
    </div>
</section>
</div>

<section id="contact" class="contact section light-background">
  <div class="container section-title" data-aos="fade-up">
    <h2>Contact Us</h2>
    <p>Get in touch with Roys Invest — trusted by 3000+ clients with ₹250 Crores in assets under management.</p>
  </div>
  <div class="container" data-aos="fade" data-aos-delay="100">
    <div class="row gy-4">
      <div class="col-lg-4">
        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
          <i class="bi bi-geo-alt flex-shrink-0"></i>
          <div>
            <h3>Address</h3>
            <p>Building, Oppo. Johnson Lifts Pvt. Ltd, Twin Tower, Seaport - Airport Rd, Irumpanam, Kochi, Kerala 682309</p>
          </div>
        </div>
        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
          <i class="bi bi-telephone flex-shrink-0"></i>
          <div>
            <h3>Call Us</h3>
            <p>098461 44168</p>
          </div>
        </div>
        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
          <i class="bi bi-envelope flex-shrink-0"></i>
          <div>
            <h3>Email Us</h3>
            <p>roysinvest00@gmail.com</p>
          </div>
        </div>
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
      </div>
    </div>
  </div>
</section>

@endsection
