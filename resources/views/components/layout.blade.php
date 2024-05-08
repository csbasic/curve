<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Curve</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  
  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <script src="{{ asset('https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js') }}"></script>
  <link href=" {{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet">
  <link href=" {{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css ') }}" rel="stylesheet">
  <link href=" {{ asset('assets/vendor/glightbox/css/glightbox.min.css ') }}" rel="stylesheet">
  <link href=" {{ asset('assets/vendor/swiper/swiper-bundle.min.css ') }}" rel="stylesheet">
  <link href=" {{ asset('assets/vendor/aos/aos.css ') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Append
  * Template URL: https://bootstrapmade.com/append-bootstrap-website-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
  
      @media (min-width: 1200px) {
      .navmenu .dropdown ul {
        left: -7em !important;
        width: 10em !important;
        
      } 

       button[type=submit] {
        background: #E84545;
        color: #E84545;
        border: 0;
        padding: 10px 30px;
        transition: 0.4s;
        border-radius: 4px;
      }

      .about-section-pt {
        padding-top: 6em !important;
      }

      .navmenu .dropdown-adjust ul {
        left: -3em !important;
      }

      .header {
        --heading-color: #444444 !important;
        --nav-color: #444444 !important;
        --nav-hover-color: #d83535 !important; 
      }
      
      .part-vertical {
        padding-top: 4em !important;
        padding-bottom: 4em !important;
      }

      a .active:focus {
        color: #e84545;
      }
    }  
  </style>
</head>

<body @if (request()->is('curve') || request()->is('about'))
  class="index-page header-change"
  @else
   class="index-page" 
@endif data-bs-spy="scroll" data-bs-target="#navmenu">
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
  
    <div class="container-fluid d-flex align-items-center justify-content-between ">
      
      <a href="/" class="logo d-flex align-items-center me-auto me-xl-0">
          <img src="{{ asset('assets/img/curve-logo.png') }}" alt="Logo">
      </a>

      <!-- Nav Menu -->
      <nav id="navmenu" class="navmenu flex">
        <ul>
            <li><a href="/" class="{{request()->is('/') ? 'active' : ''}}">Home</a></li>
            <li class="dropdown has-dropdown dropdown-adjust">
              <a href="#">
                <span @if (request()->is('curve') || request()->is('team')) class="active"@endif>About</span>
              </a>
              <ul class="dd-box-shadow">
                <li><a href="/curve" class="{{request()->is('curve') ? 'active' : ''}}">Curve</a></li>
                <li><a href="/team"  class="{{request()->is('team') ? 'active' : ''}}">Team</a></li>
              </ul>
            </li>
            <li><a href="/posts" class="{{request()->is('posts') ? 'active' : ''}}">Blog</a></li>
            <li><a href="/contact" class="{{request()->is('contact') ? 'active' : ''}}">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav><!-- End Nav Menu -->
    
      @auth
  
        <div class="align-items-center ">
          <div class="d-flex">
            
              <nav  id="navmenu" class="navmenu" >
                <ul>
                  <li class="dropdown has-dropdown">
                      @php
                        $profilePic = request()->user()::find(auth()->id())->profile_pic;
                        // dd($profilePic);
                      @endphp
                      <div style="width: 3em; margin-right: 11px!important">
                        <a href="/" class="logo d-flex align-items-center me-auto me-xl-0">
                          @isset($profilePic)
                          
                          <img style="width: %100; margin-right: 10px" src="{{ asset('storage/'.$profilePic) }}" alt="Prifile Pic" />
                            @else
                            <img style="width: %00;" src="{{ asset('storage/users/profile-pic.jpg') }}" alt="Prifile Pic" />
                          @endisset  
                        </a>
                      </div>
                    <ul class="dd-box-shadow" >
                    <li><a href="/users/{{ auth()->id() }}/detail">Profile</a></li>
                      <li><a href="/posts/manage" >Manage Post</a></li>
                      <li><a href="/contacts" >Manage Contacts</a></li>
                      <li>
                        <a href="#" >
                          <form class="inline" method="POST" action="/sign-out">
                            @csrf
                            <button class="text-white" type="submit">
                                <i class="fa-solid fa-sign-out"></i> Sign Out
                            </button>
                          </form>
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </nav>
          </div>
        </div>
    
      @else
      <a class="btn-getstarted" href="/sign-in">Sign In</a>
      @endauth
    </div>
  </header><!-- End Header -->

  <main id="main">
   {{ $slot }}
  </main>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span>Append</span>
          </a>
          <p>It is not a difficult thing to change the perception and narative. All that is needed is intention. We have what it takes to change our world. Lets do this!</p>
          <div class="">
            <div class="social-links d-flex mt-3">
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web & Mobile Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Branding and Consulting</a></li>
            <li><a href="#">Infographic Design</a></li>
          </ul>
        </div>
        

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <p>University Street</p>
          <p>Molyko Buea</p>
          <p>South West Region. <CMd></CMd></p>
          <p class="mt-2"><strong>Phone:</strong> <span>(+237) 6703 07126</span></p>
          <p><strong>Email:</strong> <span>info@loople.dev</span></p>
          <p><strong>Website:</strong> <span>https://loople.dev</span></p>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>&copy; <span>Copyright</span> <strong class="px-1">Curve</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        Designed by <a href="https://loople.dev/">Loople Dev</a>
      </div>
    </div>

  </footer><!-- End Footer -->
  <!-- Scroll Top Button -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }} "></script>

</body>

</html>