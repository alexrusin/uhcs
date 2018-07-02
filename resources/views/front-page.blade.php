<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="images/favicon.png">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Unlimited HCS</title>
  
  <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="css/mead-io-blog.css">
    @stack('styles')
    <!-- Scripts -->
    <script>
        window.App = {!! json_encode([
            'signedIn' => Auth::check(),
            'user' => Auth::user()
            ])
        !!};
    </script>
   <script src='https://www.google.com/recaptcha/api.js'></script>
  
</head>

<body id="body">
<div id="app">
  <div class="page-wrap">
    <div class='page-wrap__container'>
      <div>
    <div class="mobile-header loading">
      <a class="mobile-header__nav-item" data-scroll href="#aboutus">About Us</a>
      <a class="mobile-header__nav-item" data-scroll href="#courses">Types of Facilities</a>
      <a class="mobile-header__nav-item" data-scroll href="#testimonials">Our Services</a>
      <a class="mobile-header__nav-item" data-scroll href="#contactus">Contact Us</a>
    </div>

    <header class="header">
      <div class="header__content">
          <div class="header-brand">
            <a class="header-brand__link" data-scroll href="#body">
              <h1 class="header-brand__title">Unlimited Health Care Services</h1>
              <h4 class="header-brand__subtitle">Adult &amp; Senior Referral Agency</h4>
            </a>
          </div>

          <div class="header__nav">
            <div class="header__nav-item header__nav-item--mobile js-mobile-trigger">
              <span class=" burger">
                <image src="images/icons/bars-dark.svg" class="burger__open">
                <image src="images/icons/x-dark.svg" class="burger__close">
              </span>
            </div>
            
            <div class="header__nav-item">
              <a class="btn btn--ghost" data-scroll href="#aboutus">About Us</a>
            </div>
            <div class="header__nav-item">
              <a class="btn btn--ghost" data-scroll href="#courses">Types of Facilities</a>
            </div>
            <div class="header__nav-item">
              <a class="btn btn--ghost" data-scroll href="#testimonials">Our Services</a>
            </div>
            <div class="header__nav-item">
              <a class="btn btn--ghost" data-scroll href="#contactus">Contact us</a>
            </div>
            
          </div>
      </div>
    </header>
  </div>

      <div class="fullscreen-background"></div>

  <div class="atf">
      <div class="atf__content">
          <h1 class="atf__title">
             Our Goal
          </h1>

          <p class="atf__body">
          is to achieve the highest level of integrity towards our clients, health care providers, and employees through the guidance of our Lord God Almighty.
          </p>

          <p>
              <a class="btn btn--white" data-scroll href="#contactus">Fill Out Client Form</a>
          </p>
      </div>

      
  </div>

  <div class="section section--dark-pattern">
      <div class="content">
   	<!-- insert video iframe-->
     	</div>
  </div>

  <div class="section section--light-grey" id="aboutus">
    <div class="content">
      <h1 class="section__title">About Us</h1>
      <div class="about-us">
        
         <p>Unlimited Health Care Services is a referral service company, focused in helping individuals and families locate the best appropriate health care facility.  UHCS assures that these facilities were carefully screened to insure safety, health and caring environments.</p>
         <p>Low income families and individuals - private paying or SSI beneficiaries are served equally.  We at UHCS welcome all inquiries from clients whether financially capable or not.  Our goal is to help the needy and locate a peaceful, pleasant facility where satisfaction is met for the resident.</p>
         <p>UHCS will provide all these services through a team comprising of well-trained competent placement consultants and placement coordinators.</p>      
      </div>
    </div>
  </div>

  <div class="section section--basic" id="courses">
    <div class="content">
      <h1 class="section__title">Type of Facilities</h1>
      
      <div class="courses">
          <div class="course">
           <!--  <a class="course__overlay" href="#" data-toggle="modal" data-target="#myModal"></a>
            <img src="images/project1.jpg"> -->
            <div class="course__content">
              <h4>Retirement Homes</h4>
              
             <!--  <div class="btn">More...</div> -->
            </div>
          </div>
        
          <div class="course">
           <!--  <a class="course__overlay" href="#" data-toggle="modal" data-target="#myModal"></a>
            <img src="images/project1.jpg"> -->
            <div class="course__content">
              <h4>Assisted living Facilities</h4>
              
             <!--  <div class="btn">More...</div> -->
            </div>
          </div>
        
           <div class="course">
           <!--  <a class="course__overlay" href="#" data-toggle="modal" data-target="#myModal"></a>
            <img src="images/project1.jpg"> -->
            <div class="course__content">
              <h4>Board and Care Facilities</h4>
              
             <!--  <div class="btn">More...</div> -->
            </div>
          </div>
      </div>

      <div class="courses">
          <div class="course">
           <!--  <a class="course__overlay" href="#" data-toggle="modal" data-target="#myModal"></a>
            <img src="images/project1.jpg"> -->
            <div class="course__content">
              <h4>Skilled Nursing Homes</h4>
              
             <!--  <div class="btn">More...</div> -->
            </div>
          </div>
        
          <div class="course">
           <!--  <a class="course__overlay" href="#" data-toggle="modal" data-target="#myModal"></a>
            <img src="images/project1.jpg"> -->
            <div class="course__content">
              <h4>Congregate Living</h4>
              
             <!--  <div class="btn">More...</div> -->
            </div>
          </div>
        
           <div class="course">
           <!--  <a class="course__overlay" href="#" data-toggle="modal" data-target="#myModal"></a>
            <img src="images/project1.jpg"> -->
            <div class="course__content">
              <h4>1 to 24-hour Care Giving Services</h4>
              
             <!--  <div class="btn">More...</div> -->
            </div>
          </div>
      </div>

      <div class="courses">
          <div class="course">
           <!--  <a class="course__overlay" href="#" data-toggle="modal" data-target="#myModal"></a>
            <img src="images/project1.jpg"> -->
            <div class="course__content">
              <h4>Skilled Professional services to visit you in your facility</h4>
              
             <!--  <div class="btn">More...</div> -->
            </div>
          </div>
        
          <div class="course">
           <!--  <a class="course__overlay" href="#" data-toggle="modal" data-target="#myModal"></a>
            <img src="images/project1.jpg"> -->
            <div class="course__content">
              <h4>Pharmacy Needs</h4>
              
             <!--  <div class="btn">More...</div> -->
            </div>
          </div>
        
           <div class="course">
           <!--  <a class="course__overlay" href="#" data-toggle="modal" data-target="#myModal"></a>
            <img src="images/project1.jpg"> -->
            <div class="course__content">
              <h4>Medical supplies, DME supplies</h4>
              
             <!--  <div class="btn">More...</div> -->
            </div>
          </div>
      </div>

    </div>
  </div>



  <div class="section section--light-grey section-portfolio" id="testimonials">
    <div class="content">
      <h1 class="section__title">Our Services</h1>
      <div class="about-us">
     	<p>We assess and evaluate clients which will help guide them to the best facility that match their needs.  It is a one stop shop that provides all health care resources you can ever imagine</p>
      <p>Searching for the appropriate housing can be stressful and time consuming.  Facilities differ in programs they offer, levels of car, licensure, free structures, etc. and can make the decision process extremely overwhelming</p>
      <p>Save time and stress! Unlimited Health Care Services can help you find a home away from home</p>
      </div>
    </div>
  </div>

  <div class="section section--basic section--contact" id="contactus">
    <div class="section-filter"></div>

    <div class="content">
      <h1>Client Information Form</h1>
      <client-form></client-form>
    </div>
  </div>

    </div>
    @include('shared.alert')
    <footer class="l-footer">
    <div>
      <p>Unlimited Health Care Services <br> 2018 &copy; All rights reserved</p>

      <ul class="l-footer-profiles">
        <li>
          <a href="https://facebook.com" target="_blank">
            <image src="images/icons/facebook.jpg" alt="Facebook">
          </a>
        </li>
        <li>
          <a href="https://youtube.com" target="_blank">
            <image src="images/icons/youtube.jpg" alt="YouTube">
          </a>
        </li>
        <li>
          <a href="https://twitter.com" target="_blank">
            <image src="images/icons/twitter.jpg" alt="Twitter">
          </a>
        </li>
      </ul>

      
     </div>
  </footer>
  </div>

  
</div> <!--end of app div-->

  <script src="{{ mix('/js/app.js') }}"></script>
    
  <script src="js/wookmark.min.js"></script>
  <script src="https://cdn.ravenjs.com/3.9.1/raven.min.js"></script>
  <script>
    Raven.config('https://29c737073c7c4661b26ffb1697fe52d7@sentry.io/132221').install();
  </script>
  <script src="/js/above-the-fold.js"></script>
  <script src="/js/burger.js"></script>
  <script src="/js/smooth-scroll.js"></script>

  <!-- Drip -->
  <script type="text/javascript">
      smoothScroll.init({
      selector: '[data-scroll]', // Selector for links (must be a class, ID, data attribute, or element tag)
      selectorHeader: null, // Selector for fixed headers (must be a valid CSS selector) [optional]
      speed: 700, // Integer. How fast to complete the scroll in milliseconds
      easing: 'easeInOutCubic', // Easing pattern to use
      offset: 50, // Integer. How far to offset the scrolling anchor location in pixels
      callback: function ( anchor, toggle ) {} // Function to run after scrolling
  });
  </script>
  @stack('scripts')
  </body>
</html>
