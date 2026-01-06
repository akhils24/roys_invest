<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title','Roy\'s Invest | Investment Solutions & Financial Planning | Where Investment Meets Trust')</title>
  <meta name="description" content="@yield('meta_description','Roy\'s Invest: Your trusted partner for comprehensive investment solutions in Kochi, Kerala. Where investment meets trust, we offer expert guidance on LIC policies, mutual funds, and personalized financial planning. Secure your future with us.')">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/logo background.webp') }}" rel="icon">

  <!-- Fonts -->
  <link href="{{ asset('https://fonts.googleapis.com') }}" rel="preconnect">
  <link href="{{ asset('https://fonts.gstatic.com') }}" rel="preconnect" crossorigin>
  <link href="{{ asset('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap') }}" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

  <style>
    /* Common styles for both buttons */
    .scroll-top,
    .whatsapp-btn {
      position: fixed;
      right: 20px;
      width: 50px;
      height: 50px;
      background: #007bff; /* Blue for scroll-top */
      color: white;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      text-decoration: none;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
      transition: all 0.3s;
      z-index: 999;
    }
    /* Scroll to Top Button (Positioned at Bottom-Right) */
    .scroll-top {
      bottom: 90px; /* Places it above WhatsApp button */
      background: #007bff;
    }
    /* WhatsApp Button (Positioned at Bottom-Right) */
    .whatsapp-btn {
      bottom: 70px;
      background: #25D366; /* WhatsApp Green */
    }
    /* Hover Effects */
    .scroll-top:hover,
    .whatsapp-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }
  </style>
</head>

<body class="index-page">

  @include('users.partials.navbar')

  <main class="main">
    @yield('content')
  </main>

  <!-- footer -->
  @include('users.partials.footer ')

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top"><i class="bi bi-arrow-up-short"></i></a>
  <!-- WhatsApp Button -->
  <a href="#" id="whatsapp-btn" class="whatsapp-btn"><i class="bi bi-whatsapp"></i></a>
  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

  <script>
    // Smooth scroll to top
    document.getElementById('scroll-top').addEventListener('click', (e) => {
      e.preventDefault();
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });

    // WhatsApp link (optional: replace # with your WhatsApp URL)
    document.getElementById('whatsapp-btn').addEventListener('click', (e) => {
      e.preventDefault();
      window.open('https://wa.me/yournumber', '_blank');
    });
  </script>

</body>

</html>