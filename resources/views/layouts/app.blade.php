<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <title>For Jugo Feed</title>

  <link rel="stylesheet" href="{{ asset('css/css.css') }}">


  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

  <div class="top-header">
    <div class="social-icons">
      <i class="fa-brands fa-facebook"></i>
      <i class="fa-brands fa-instagram"></i>
      <i class="fa-brands fa-twitter"></i>
      <i class="fa-brands fa-youtube"></i>
    </div>

    <div class="menu">
      <a href="#">About</a>
      <a href="#">Collaborate</a>
      <a href="#">Collaborate</a>
      <a href="#">Recipe Videos</a>
      <a href="#">Super bowl</a>  
    </div>

    <!-- Gạch dọc -->
    <div class="divider"></div>

    <!-- Search box -->
    <div class="search-box">
      <input type="text" placeholder="Search...">
      <button class="search-btn">
        <i class="fa-solid fa-magnifying-glass"></i>
      </button>
    </div>
  </div>


  <div class="main-header">
    <div class="logo">
      <img src="images/Group 136.png" alt="JF Logo">
      <h1>JugFeed</h1>
    </div>

    <!-- Hamburger button -->
    <button class="hamburger">☰</button>

    <nav class="main-menu">

      <a href="#">RECIPE INDEX</a>

      <!-- COURSE DROPDOWN -->
      <div class="dropdown">
        <button class="dropbtn">COURSE ▾</button>
        <div class="dropdown-content">
          <a href="#">Appetizers</a>
          <a href="#">Breakfast</a>
          <a href="#">Dinner</a>
          <a href="#">Soups</a>
          <a href="#">Side Dishes</a>
          <a href="#">Desserts</a>
          <a href="#">Drinks</a>
          <a href="#">Holiday</a>
          <a href="#">Pet Treats</a>
          <a href="#">Most Popular Recipes</a>
        </div>
      </div>

      <!-- METHOD DROPDOWN -->
      <div class="dropdown">
        <button class="dropbtn">METHOD ▾</button>
        <div class="dropdown-content">
          <a href="#">Oven</a>
          <a href="#">Baking</a>
          <a href="#">Air Fryer</a>
          <a href="#">Instant Pot</a>
          <a href="#">Grilled</a>
          <a href="#">One Pot/One Pan</a>
          <a href="#">Skillet</a>
          <a href="#">Sheet Pan</a>
          <a href="#">Casseroles</a>
          <a href="#">Crock Pot & Slow Cooker</a>
          <a href="#">Fried</a>
          <a href="#">Easy Recipes</a>
          <a href="#">Guides</a>
        </div>
      </div>

      <a href="#">LATEST POSTS</a>
    </nav>
  </div>



  <div class="content-section"> 
  <div class="left-content"> 

    {{-- BANNER --}}  
    @yield('banner')

  </div>

       {{-- POST (bao gồm TRENDING) --}}
    <div class="trending-box">
        @yield('post')
    </div>


  </div>
  <div class="content-width">
    <div class="icon-menu">

      <div class="handwritten">
        <img src="images/Frame (7).png" alt="handwritten">
      </div>

      <div class="icon-list">

        <div class="icon-item active">
          <img src="images/Frame.png">
          <p>Soups</p>
        </div>

        <div class="icon-item">
          <img src="images/Frame (1).png">
          <p>Sandwiches</p>
        </div>

        <div class="icon-item">
          <img src="images/Frame (2).png">
          <p>Salads</p>
        </div>

        <div class="icon-item">
          <img src="images/Frame (3).png">
          <p>Baked</p>
        </div>

        <div class="icon-item">
          <img src="images/Frame (4).png">
          <p>Pizza</p>
        </div>

        <div class="icon-item">
          <img src="images/Frame (5).png">
          <p>Tacos</p>
        </div>

        <div class="icon-item">
          <img src="images/Frame (6).png">
          <p>Pasta</p>
        </div>

        <div class="browse-btn">
          <p>Browse all recipes</p>
        </div>

      </div>

    </div>
  </div>
  <link rel="stylesheet" href="chicken.css">

  {{-- ================= CHICKEN RECIPES ================= --}}
<div class="chicken-wrap">
    @yield('chicken_recipes')
</div>


  <!-- new letter hồng -->
  <section class="newsletter">
    <h3>5 QUICK TIPS TO SIMPLIFY DINNER TIME</h3>
    <p>
      Get my favorite tips, strategies and recipes for getting dinner on the table fast
      and making mealtime more enjoyable!
    </p>

    <form class="newsletter-form" action="{{ route('contact.store') }}" method="Post" enctype="multipart/form-data">
    @csrf
      <input type="text" name="name" placeholder="First Name">
      <input type="email" name="email" placeholder="Email Address">
      <button class="subscribe-btn">SUBSCRIBE</button>
    </form>
  </section>

  <!-- pasta repice -->
  <div class="pasta-section">
    @yield('pasta_recipes')
</div>
<!-- pasta repice -->

  <!-- reader favorites-->
<div class="favorites-section-01"> 
  @yield('reader_favorites') 
</div>
  <!-- reader favorites-->

  <!-- author -->
  <div class="about-section-02">
    @yield('author_sections')
  </div>
  <!-- author -->

  <!-- Learn how to-->
   <div class="favorites-section-X100">
    @yield('how_tos')
   </div>
  <!-- learn how to-->

  <!-- breakfast recipes-->
   <div class="pasta-section">
    @yield('breakfast_recipes')
   </div>
  <!-- breakfast recipes-->


  <!-- Under 10$-->
   <div class="pasta-section">
    @yield('under_recipes')
   </div>
  <!-- Under 10$-->

  <footer class="site-footer">
    <div class="footer-nav">
      <a href="#">PRESS</a>
      <a href="#">PRIVACY POLICY & DISCLOSURE</a>
      <a href="#">TERMS OF SERVICE</a>
      <a href="#">DISCLAIMERS</a>
      <a href="#">CONTACT</a>
    </div>

    <div class="social-row">
      <div class="social-icons">

        <!-- ins -->
        <a href="#" class="sicon insta">
          <svg viewBox="0 0 24 24">
            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
            <circle cx="12" cy="12" r="4"></circle>
            <circle cx="17" cy="7" r="1.3"></circle>
          </svg>
        </a>

        <!-- fb -->
        <a href="#" class="sicon fb">
          <svg viewBox="0 0 24 24">
            <path d="M22 12.07C22 6.48 17.52 2 11.93 2S2 6.48 2 12.07C2 17.11 
          5.66 21.19 10.44 21.95v-6.98H7.9v-2.9h2.54V9.83c0-2.5 
          1.49-3.88 3.76-3.88 1.09 0 2.23.2 2.23.2v2.45h-1.25c-1.23 
          0-1.61.77-1.61 1.56v1.87h2.74l-.44 2.9h-2.3V22 
          C18.34 21.19 22 17.11 22 12.07z"></path>
          </svg>
        </a>

        <!-- ytb -->
        <a href="#" class="sicon yt">
          <svg viewBox="0 0 24 24">
            <path d="M23.5 6.2s-.2-1.6-.8-2.3c-.8-.9-1.7-.9-2.1-1C16.8 2.4 
          12 2.4 12 2.4s-4.8 0-8.6.5c-.5.1-1.3.2-2.1 1-.6.7-.8 
          2.3-.8 2.3S0 8 0 9.8v2.4C0 14 0 15.7 0 15.7s.2 
          1.6.8 2.3c.8.9 1.8.9 2.3 1 1.7.1 7.6.5 7.6.5s4.8 
          0 8.6-.5c.5-.1 1.3-.2 2.1-1 .6-.7.8-2.3.8-2.3s.2-1.7.2-3.5V9.8c0-1.8-.2-3.6-.2-3.6zM9.8 
          14.1v-4l4.5 2-4.5 2z"></path>
          </svg>
        </a>
      </div>
    </div>

    <p class="copy">
      © 2022-2023 Lorem Ipsum is simply dummy text of the printing and typesetting industry.
      Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.when an unknown printer took a galley of type anh scrambled
    </p>
    <button class="share-btn">
      <span class="share-count">1.1K</span>
      <span class="share-icon"></span>
    </button>
  </footer>
  <script src="{{ asset('js/js.js') }}">
  </script>
  @yield('script')

</body>

</html>