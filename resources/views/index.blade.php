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

    <header class="top-header">
    <div class="social-icons">
        <i class="fab fa-facebook-f"></i>
        <i class="fab fa-pinterest"></i>
        <i class="fab fa-instagram"></i>
        <i class="fab fa-twitter"></i>
        <i class="fab fa-youtube"></i>
    </div>

    <nav class="menu">
        <a href="#">About</a>
        <a href="#">Collaborate</a>
        <a href="#">Recipe Videos</a>
        <a href="#" class="active">Super Bowl</a>
    </nav>

    <div class="search">
        <input type="text" placeholder="Search....">
    </div>
</header>

<div class="main-header">
    <div class="logo">
        <img src="images/Group 136.png" alt="JF Logo"> 
        <h1>JugFeed</h1>
    </div>

    <nav class="main-menu">
        <a href="#">RECIPE INDEX</a>
        <a href="#">COURSE ▾</a>
        <a href="#">METHOD ▾</a>
        <a href="#">LATEST POSTS</a>
    </nav>
</div>
<div class="content-section">

    <!-- ảnh và text bên trái -->
    <div class="left-content">
        <img src="images/de08154ec3ced564eac1cf31aa22a03f172f2f8e (1).jpg" alt="Food Image" class="main-food-img">

        <div class="food-box">
            <h2>ROASTED BROCCOLI & CAULIFLOWER YOU NEED TO TRY THIS METHOD FOR ROASTING FROZEN VEGGIES, LIKE, YESTERDAY</h2>
            <p>If you're wondering how to make frozen veggies actually crispy, this Liz Moody roasted broccoli recipe is for you.</p>
        </div>
    </div>

    <!-- phải có trending now -->
    <div class="trending-box">
        <h3>TRENDING NOW</h3>

        <div class="trend-item">
            <img src="images/e46d7f70706c2d29529e6d7c4d0f9a7d13dd93b9.jpg" alt="">
            <p>23 Recipes That Start with a Bag of Frozen Peas</p>
        </div>

        <div class="trend-item">
            <img src="images/1ac21e6e32cfe44268a2e53b6827d9220a390d65.jpg" alt="">
            <p>23 Recipes That Start with a Bag of Frozen Peas</p>
        </div>

        <div class="trend-item">
            <img src="images/90891da71ba593ab182bf16a31374b2a52168ee8.png" alt="">
            <p>Can You Eat Chocolate If You Have Diabetes?</p>
        </div>

        <div class="trend-item">
            <img src="images/d8859328f1e17cb01b9db2ec59bdfc897a4cd434.png" alt="">
            <p>The 4 Best Dairy Foods to Eat Every Week</p>
        </div>

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
                <p>browse all recipes</p>
            </div>

        </div>

    </div>
</div>
<link rel="stylesheet" href="chicken.css">

<section class="chicken-wrap">

    <h2 class="title">CHICKEN RECIPES</h2>

    <div class="recipe-layout">

        <!-- ảnh trái -->
        <div class="left-big">
            <img src="images/Group 124.png" alt="">
            <div class="info">
                <h3>CAJUN SAUSAGE AND VEGETABLES</h3>
                <p>$6.94 RECIPES/$1.74 SERVING
            </div>
        </div>

        <!-- phải 4 img -->
        <div class="right-grid">
            <div class="card"><img src="images/45902e2f62f4197b991d868f326488f89cbd56d2.jpg"><div class="info"><h3>CAJUN SAUSAGE AND VEGETABLES</h3><p>$6.94 RECIPES/$1.74 SERVING</p></div></div>
            <div class="card"><img src="images/206e63c742e61d466f093d13334f02e7608e3b34.jpg"><div class="info"><h3>ONE POT CREAMY CAJUN CHICKEN PASTA</h3><p>$6.94 RECIPES/$1.74 SERVING4</p></div></div>
            <div class="card"><img src="images/52c6a59c4cc934068800197a859bcd02a41b6ce8.jpg"><div class="info"><h3>CAJUN SAUSAGE AND VEGETABLES</h3><p>$6.94 RECIPES/$1.74 SERVING</p></div></div>
            <div class="card"><img src="images/de08154ec3ced564eac1cf31aa22a03f172f2f8e (1).jpg"><div class="info"><h3>CAJUN SAUSAGE AND VEGETABLES</h3><p>$6.94 RECIPES/$1.74 SERVING</p></div></div>
        </div>

    </div>

    <div class="center-btn">
        <button class="more-btn">MORE CHICKEN RECIPES</button>
    </div>

</section>


<!-- new letter hồng -->
<section class="newsletter">
    <h3>5 QUICK TIPS TO SIMPLIFY DINNER TIME</h3>
    <p>
        Get my favorite tips, strategies and recipes for getting dinner on the table fast 
        and making mealtime more enjoyable!
    </p>

    <form class="newsletter-form">
        <input type="text" placeholder="First Name">
        <input type="email" placeholder="Email Address">
        <button class="subscribe-btn">SUBSCRIBE</button>
    </form>
</section>

<!-- pasta repice -->
<section class="pasta-section">

  <h2 class="title">PASTA RECIPES</h2>

  <div class="pasta-grid">
    <!-- Card 1 -->
    <article class="card">
      <div class="card-image">
        <img src="images/02ee3ec18705b471056824874b035e71506e1434.jpg" alt="dish 1">
      </div>
      <div class="card-body">
        <h3 class="card-title">CAJUN SAUSAGE AND VEGETABLES</h3>
        <p class="card-meta">$6.94 RECIPE / $1.74 SERVING</p>
      </div>
    </article>

    <!-- Card 2 -->
    <article class="card">
      <div class="card-image">
        <img src="images/c269d74d14bf8059bd3c392fc44d73d49de677da.jpg" alt="dish 2">
      </div>
      <div class="card-body">
        <h3 class="card-title">EXTRA CHEESY HOMEMADE MAC AND CHEESE</h3>
        <p class="card-meta">$6.94 RECIPE / $1.74 SERVING</p>
      </div>
    </article>

    <!-- Card 3 -->
    <article class="card">
      <div class="card-image">
        <img src="images/854a01e5dc3aa3e8a5045da6531087096b32f88f.jpg" alt="dish 3">
      </div>
      <div class="card-body">
        <h3 class="card-title">CAJUN SAUSAGE AND VEGETABLES</h3>
        <p class="card-meta">$6.94 RECIPE / $1.74 SERVING</p>
      </div>
    </article>

    <!-- Card 4 -->
    <article class="card">
      <div class="card-image">
        <img src="images/d912da5d6dd1c03fcc94547c7b1290acf1a7f05c.jpg" alt="dish 4">
      </div>
      <div class="card-body">
        <h3 class="card-title">CAJUN SAUSAGE AND VEGETABLES</h3>
        <p class="card-meta">$6.94 RECIPE / $1.74 SERVING</p>
      </div>
    </article>

    <!-- Card 5 -->
    <article class="card">
      <div class="card-image">
        <img src="images/8cc3d06bad859bc97b0b0032f3e056df86733b53.jpg" alt="dish 5">
      </div>
      <div class="card-body">
        <h3 class="card-title">CAJUN SAUSAGE AND VEGETABLES</h3>
        <p class="card-meta">$6.94 RECIPE / $1.74 SERVING</p>
      </div>
    </article>

    <!-- Card 6 -->
    <article class="card">
      <div class="card-image">
        <img src="images/26f17787a0e9c24f8f670458b4d0b4af6bf8c500.jpg" alt="dish 6">
      </div>
      <div class="card-body">
        <h3 class="card-title">EXTRA CHEESY HOMEMADE MAC AND CHEESE</h3>
        <p class="card-meta">$6.94 RECIPE / $1.74 SERVING</p>
      </div>
    </article>

    <!-- Card 7 -->
    <article class="card">
      <div class="card-image">
        <img src="images/705bf1a5d584ecc7be23d09fd1831bce17ff9c9b.jpg" alt="dish 7">
      </div>
      <div class="card-body">
        <h3 class="card-title">CAJUN SAUSAGE AND VEGETABLES</h3>
        <p class="card-meta">$6.94 RECIPE / $1.74 SERVING</p>
      </div>
    </article>

    <!-- Card 8 -->
    <article class="card">
      <div class="card-image">
        <img src="images/89914dc80f294deba8ba30854335f46981cdc892.jpg" alt="dish 8">
      </div>
      <div class="card-body">
        <h3 class="card-title">CAJUN SAUSAGE AND VEGETABLES</h3>
        <p class="card-meta">$6.94 RECIPE / $1.74 SERVING</p>
      </div>
    </article>

  </div>

  <div class="controls">
    <button class="more-btn" type="button">MORE PASTA RECIPES</button>
  </div>

</section>

<!-- pasta repice -->

<!-- reader favoutures-->
<section class="favorites-section-01">

  <!-- Bg -->
  <div class="favorites-bg-01"></div>

  <!-- tiêu đề + line đè lên ảnh -->
  <div class="favorites-overlay-title-01">
    <h2 class="favorites-title-01">READER’S FAVORITES</h2>
    <div class="favorites-line-01"></div>
  </div>

  <!-- CONTENT -->
  <div class="favorites-container-01">

    <div class="cards-wrapper-01">

      <!-- CARD 1 -->
      <div class="card-item-01">
        <img src="images/4b257bf541a8d85c15d41869cad64f58990a958e.jpg" class="card-img-01">
        <div class="card-body-01">
          <div class="rating-01">★★★★★</div>
          <h3>Broccoli and Cheese Stuffed Chicken Breast</h3>
          <p>Broccoli and Cheese Stuffed Chicken Breast is filled with a delicious broccoli...</p>
          <a href="#" class="card-btn-01">GET RECIPE →</a>
        </div>
      </div>

      <!-- CARD 2 -->
      <div class="card-item-02">
        <img src="images/2947edae67700bac732bc1a67e547db5117eab10.jpg" class="card-img-02">
        <div class="card-body-02">
          <div class="rating-02">★★★★★</div>
          <h3>Broccoli and Cheese Stuffed Chicken Breast</h3>
          <p>Broccoli and Cheese Stuffed Chicken Breast is filled with a delicious broccoli...</p>
          <a href="#" class="card-btn-02">GET RECIPE →</a>
        </div>
      </div>

      <!-- CARD 3 -->
      <div class="card-item-03">
        <img src="images/ce8e15a09324a96d0002ff4993aacbbcea42d2e7.jpg" class="card-img-03">
        <div class="card-body-03">
          <div class="rating-03">★★★★★</div>
          <h3>Broccoli and Cheese Stuffed Chicken Breast</h3>
          <p>Broccoli and Cheese Stuffed Chicken Breast is filled with a delicious broccoli...</p>
          <a href="#" class="card-btn-03">GET RECIPE →</a>
        </div>
      </div>

    </div>

    <!-- button căn trái theo card -->
    <div class="btn-wrapper-01">
      <button class="find-btn-01">FIND DINNER TONIGHT</button>
    </div>

  </div>
</section>
<!-- reader favoutures-->

<!-- hello -->
<section class="about-section-02">

  <div class="about-container-02">

    <!-- CARD chung -->
    <div class="about-card-02">

      <!-- chữ trái -->
      <div class="about-text-02">
        <h2 class="about-title-02">hello!</h2>

        <p class="about-intro-02">
          <strong>Hi, I’m Yamaha.</strong> Lorem Ipsum is simply dummy text of the
          printing and typesetting industry.
        </p>

        <p class="about-desc-02">
          It has survived not only five centuries, but also the leap into
          electronic typesetting, remaining essentially unchanged.
        </p>

        <a href="#" class="about-btn-02">LEARN MORE</a>
      </div>

      <!--ảnh phải -->
      <div class="about-image-wrap-02">
        <img
          src="images/4412fcfe0b0728052058b8c096e4ef9adde74545.jpg"
          class="about-image-02"
          alt="woman eating"
        >
      </div>

    </div>

    <!-- as soon as -->
    <div class="about-seen-02">
      <p class="about-seen-text-02">AS SEEN ON</p>

      <!-- 1 ảnh -->
      <img
        src="images/as-seen-on-desktop 1 (1).png"
        class="about-logo-single-02"
        alt="logos"
      >
    </div>

  </div>
</section>
<!-- hello -->

<!-- Learn how to-->
 <section class="favorites-section-X100">

  <!-- Bg -->
  <div class="favorites-bg-X100"></div>

  <!-- tiều đề ,line -->
  <div class="favorites-overlay-title-X100">
    <h2 class="favorites-title-X100">LEARN HOW TO ...</h2>
    <div class="favorites-line-X100"></div>
  </div>

  <!-- CONTENT -->
  <div class="favorites-container-X100">

    <div class="cards-wrapper-X100">

      <!-- 9 CARD -->
      <div class="card-item-X100">
        <div class="card-img-wrap-X100">
          <img src="images/02ee3ec18705b471056824874b035e71506e1434 (2).jpg" class="card-img-X100">
        </div>
        <div class="card-body-X100">
          
          <h3>...cook chicken breast in a pan </h3>
         
        </div>
      </div>

      <div class="card-item-X100">
        <div class="card-img-wrap-X100">
          <img src="images/60cd5a88df5c9390eb59343ca6f490c9adbeebdd (1).png" class="card-img-X100">
        </div>
        <div class="card-body-X100">
        
          <h3>…make a soft boiled egg A freezer bag</h3>
      
        </div>
      </div>

      <div class="card-item-X100">
        <div class="card-img-wrap-X100">
          <img src="images/9f65d89d6848b846501e2152a3d807ece4b1cf0b (1).png" class="card-img-X100">
        </div>
        <div class="card-body-X100">
        
          <h3>...freeze kale Citrus fruit medley</h3>
          
        </div>
      </div>

      <div class="card-item-X100">
        <div class="card-img-wrap-X100">
          <img src="images/6597c8c06c14d4eadc344ce2a31a7bea5f74cc01 (1).png" class="card-img-X100">
        </div>
        <div class="card-body-X100">
     
          <h3>…freeze whole citrus Overhead</h3>
         
        </div>
      </div>

      <div class="card-item-X100">
        <div class="card-img-wrap-X100">
          <img src="images/58b0624e97f20a7740d43f871fb2977c9e3a91cb (1).png" class="card-img-X100">
        </div>
        <div class="card-body-X100">
          
          <h3>…steam fresh green beans Overhead</h3>
      
        </div>
      </div>

      <div class="card-item-X100">
        <div class="card-img-wrap-X100">
          <img src="images/e05b1832aedcf862df5a85ccae09707313de0e4a (1).png" class="card-img-X100">
        </div>
        <div class="card-body-X100">
          
          <h3>…make riced cauliflower</h3>
         
        </div>
      </div>

      <div class="card-item-X100">
        <div class="card-img-wrap-X100">
          <img src="images/7b92add24f602a6eff48b2ce11f9f9099036f487 (1).png" class="card-img-X100">
        </div>
        <div class="card-body-X100">
          
          <h3>…cook bacon in the oven Frozen</h3>
        
        </div>
      </div>

      <div class="card-item-X100">
        <div class="card-img-wrap-X100">
          <img src="images/37300a56bb709ef827ec77347e00347d0fe16b3c (1).png" class="card-img-X100">
        </div>
        <div class="card-body-X100">
         
          <h3>…freeze bananas One hard</h3>
        
        </div>
      </div>

      <div class="card-item-X100">
        <div class="card-img-wrap-X100">
          <img src="images/0a1166670d09d3ad450ba8b899d58cc25d0041bd (1).png" class="card-img-X100">
        </div>
        <div class="card-body-X100">
       
          <h3>…make hard boiled eggs</h3>
  
        </div>
      </div>

    </div>
  </div>
</section>
<!-- learn how to-->

<!-- breakfast recipes-->
<section class="pasta-section">

  <h2 class="title">BREAKFASRT RECIPES</h2>

  <div class="pasta-grid">
    <!-- Card 1 -->
    <article class="card">
      <div class="card-image">
        <img src="images/02ee3ec18705b471056824874b035e71506e1434.jpg" alt="dish 1">
      </div>
      <div class="card-body">
        <h3 class="card-title">CAJUN SAUSAGE AND VEGETABLES</h3>
        <p class="card-meta">$6.94 RECIPE / $1.74 SERVING</p>
      </div>
    </article>

    <!-- Card 2 -->
    <article class="card">
      <div class="card-image">
        <img src="images/Mask group (5).png" alt="dish 2">
      </div>
      <div class="card-body">
        <h3 class="card-title">CHEESE GRITS</h3>
        <p class="card-meta">$6.94 RECIPE / $1.74 SERVING</p>
      </div>
    </article>

    <!-- Card 3 -->
    <article class="card">
      <div class="card-image">
        <img src="images/Mask group (6).png" alt="dish 3">
      </div>
      <div class="card-body">
        <h3 class="card-title">HOMEMADE BLUEBERRY MUFFINS</h3>
        <p class="card-meta">$6.94 RECIPE / $1.74 SERVING</p>
      </div>
    </article>

    <!-- Card 4 -->
    <article class="card">
      <div class="card-image">
        <img src="images/Mask group (7).png" alt="dish 4">
      </div>
      <div class="card-body">
        <h3 class="card-title">SALSA POACHED EGGS</h3>
        <p class="card-meta">$6.94 RECIPE / $1.74 SERVING</p>
      </div>
    </article>

    <!-- Card 5 -->
    <article class="card">
      <div class="card-image">
        <img src="images/Mask group (8).png" alt="dish 5">
      </div>
      <div class="card-body">
        <h3 class="card-title">FLUFFY HOMEMADE PANCAKES</h3>
        <p class="card-meta">$6.94 RECIPE / $1.74 SERVING</p>
      </div>
    </article>

    <!-- Card 6 -->
    <article class="card">
      <div class="card-image">
        <img src="images/Mask group (9).png" alt="dish 6">
      </div>
      <div class="card-body">
        <h3 class="card-title">SAUSAGE BREAKFAST CASSEROLE</h3>
        <p class="card-meta">$6.94 RECIPE / $1.74 SERVING</p>
      </div>
    </article>

    <!-- Card 7 -->
    <article class="card">
      <div class="card-image">
        <img src="images/Mask group (10).png" alt="dish 7">
      </div>
      <div class="card-body">
        <h3 class="card-title">AUTUMN FRUIT AND NUT OATMEAL</h3>
        <p class="card-meta">$6.94 RECIPE / $1.74 SERVING</p>
      </div>
    </article>

    <!-- Card 8 -->
    <article class="card">
      <div class="card-image">
        <img src="images/Mask group (11).png" alt="dish 8">
      </div>
      <div class="card-body">
        <h3 class="card-title">PEANUT BUTTER BANANA SMOOTHIE</h3>
        <p class="card-meta">$6.94 RECIPE / $1.74 SERVING</p>
      </div>
    </article>

  </div>

  <div class="controls">
    <button class="more-btn" type="button">MORE BREAKFASRT RECIPES</button>
  </div>

</section>
<!-- breakfast recipes-->


<!-- Under 10$-->
<section class="pasta-section">

  <h2 class="title">UNDER 10$</h2>

  <div class="pasta-grid">
    <!-- Card 1 -->
    <article class="card">
      <div class="card-image">
        <img src="images/Mask group.png" alt="dish 1">
      </div>
      <div class="card-body">
        <h3 class="card-title">HOW TO MAKE A FRITTATA</h3>
        <p class="card-meta">$6.94 RECIPE / $1.74 SERVING</p>
      </div>
    </article>

    <!-- Card 2 -->
    <article class="card">
      <div class="card-image">
        <img src="images/Mask group (1).png" alt="dish 2">
      </div>
      <div class="card-body">
        <h3 class="card-title">CREAMY WHITE BEAN AND SPINACH QUESADILLAS</h3>
        <p class="card-meta">$6.94 RECIPE / $1.74 SERVING</p>
      </div>
    </article>

    <!-- Card 3 -->
    <article class="card">
      <div class="card-image">
        <img src="images/Mask group (2).png" alt="dish 3">
      </div>
      <div class="card-body">
        <h3 class="card-title">VEGAN CREAMY MUSHROOM RAMEN</h3>
        <p class="card-meta">$6.94 RECIPE / $1.74 SERVING</p>
      </div>
    </article>

    <!-- Card 4 -->
    <article class="card">
      <div class="card-image">
        <img src="images/Mask group (3).png" alt="dish 4">
      </div>
      <div class="card-body">
        <h3 class="card-title">15-MINUTE VEGETABLE CURRY</h3>
        <p class="card-meta">$6.94 RECIPE / $1.74 SERVING</p>
      </div>
    </article>
  </div>
    <div class="controls">
    <button class="more-btn" type="button">MORE RECIPES UNDER 10$</button>
  </div>

</section>
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
<script>
/* icon active */
document.querySelectorAll(".icon-item").forEach((item) => {
    item.addEventListener("click", () => {
        document.querySelectorAll(".icon-item").forEach(i => i.classList.remove("active"));
        
        item.classList.add("active");

        // click hiệu ứng
        item.style.transform = "scale(1.12)";
        setTimeout(() => {
            item.style.transform = "scale(1.05)";
        }, 150);
    });
});

//mobile căn lại menu 
function updateLayout() {
    const menu = document.querySelector(".icon-menu");

    if (window.innerWidth <= 900) {
        menu.style.flexDirection = "column";
        menu.style.alignItems = "flex-start";
    } else {
        menu.style.flexDirection = "row";
        menu.style.alignItems = "center";
    }
}
window.addEventListener("resize", updateLayout);
updateLayout();
</script>
</body>
</html>

