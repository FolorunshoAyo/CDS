<?php
  require(__DIR__ . '/auth-library/resources.php');

    // NUMBER FORMATTER
  // $human_readable = new \NumberFormatter(
  //   'en_US', 
  //   \NumberFormatter::PADDING_POSITION
  // );

  if(isset($_GET['pid']) && !empty($_GET['pid'])){
    $pid = $_GET['pid'];

    $sql_product = $db->query("SELECT * FROM products WHERE product_id={$pid}");
    $sql_product_meta = $db->query("SELECT * FROM product_meta WHERE product_id={$pid}");

    $product_details = $sql_product->fetch_assoc();
    $product_meta_details = $sql_product_meta->fetch_assoc();
  }else{
    header("Location: ./");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Custom Fonts (Inter) -->
    <link rel="stylesheet" href="assets/fonts/fonts.css" />
    <!-- BASE CSS -->
    <link rel="stylesheet" href="assets/css/base.css" />
    <!-- Slick plugin stylesheet -->
    <link rel="stylesheet" href="assets/css/slick/slick.css" />
    <!-- CUSTOM SLIDER STYLING -->
    <link rel="stylesheet" href="assets/css/slider-theme.css" type="text/css" />
    <!-- CUSTOM CSS (HOME) -->
    <link rel="stylesheet" href="assets/css/index.css" type="text/css" />
    <!-- PRODUCT PAGE CSS -->
    <link rel="stylesheet" href="assets/css/product.css" type="text/css" />
    <!-- MEDIA QUERIES -->
    <link rel="stylesheet" href="assets/css/media-queries/main-media-queries.css" />
    <title>Home - Confidence Daily Savings (CDS)</title>
  </head>

  <body>
    <header>
      <div class="top-header">
        <div class="logo-container">
          <div class="logo-image-container">
            <img src="assets/images/logo-small.png" alt="Header Logo" />
          </div>
          <div class="logo-text">
            <span class="title">CDS</span>
            <span>Confidence daily savings</span>
          </div>
        </div>

        <nav class="navigation-menu">
          <ul class="nav-links">
            <li class="nav-link-item">
              <a href="#">Purchases</a>
            </li>
            <li class="nav-link-item">
              <a href="#">Package deals</a>
            </li>
            <li class="nav-link-item">
              <a href="#">Help</a>
            </li>
            <li class="nav-link-item">
              <div class="dark-mode-container">
                <span>Dark Mode</span>
                <img src="assets/images/toggle-off.png" alt="toggle-off" />
              </div>
            </li>
          </ul>
        </nav>
      </div>
      <div class="bottom-header">
        <div class="categories-btn-container">
          <button>Categories</button>
        </div>
        <div class="search-container">
          <form class="search-box" action="search/">
            <input type="text" name="q" placeholder="Search for an item" />
            <button type="submit" class="search-icon-btn">
              <i class="fa fa-search"></i>
            </button>
          </form>
        </div>
        <div class="other-links-container">
          <button class="installment-btn">Installments</button>
          <a href="#">Account</a>
        </div>
      </div>
    </header>
    <main>
      <section class="product-section">
        <div class="product-section-container">
          <div class="product-slider-container">
            <div class="product-slider">
              <?php 
                $productPictures = explode(",", $product_details['pictures']);
                $count = 1;
                foreach($productPictures as $productPicture){
              ?>
              <div class="product-slide-item">
                <img src="a/admin/images/<?php echo($productPicture) ?>" alt="product <?php echo($count) ?>" />
              </div>
              <?php
               $count++;
                }
              ?>
            </div>
          </div>
          <div class="product-info">
            <h1 class="product-name">
              <?php 
                echo($product_details['name']) 
              ?>
            </h1>
            <div class="product-info-group">
              <span class="product-label"> Price: </span>
              <span class="product-value"> 
                N<?php 
                  // echo($human_readable->format(intval($rowProduct['price']))) 
                  echo($product_details['price']) 
                ?> 
                X
                <?php echo($product_meta_details['duration_in_months']) ?> Months 
              </span>
            </div>
            <div class="product-info-group">
              <span class="product-label"> Save: </span>
              <span class="product-value"> 
                N<?php 
                  // echo($human_readable->format(intval($rowProduct['daily_payment']))) 
                  echo($product_meta_details['daily_payment']) 
                ?> 
                Daily 
              </span>
            </div>
            <div class="product-info-group">
              <span class="product-label"> Status: </span>
              <span class="product-value"> <?php echo($product_details['active']? "Available" : "Unavailable") ?> </span>
            </div>
            <div class="product-info-group">
              <span class="product-label"> Details: </span><br /><br />
              <span class="product-value">
                <?php echo($product_details['details']) ?>
              </span>
            </div>
            <div class="start-saving-button-container">
              <button class="buy-now-btn">Buy Now</button>
              <button class="start-saving-btn">Start Saving</button>
            </div>
          </div>
        </div>
      </section>
    </main>
    <footer>
      <div class="footer-container">
        <div class="footer-row">
          <div class="footer-group-container">
            <div class="footer-logo-container">
              <img src="assets/images/logo-small.png" alt="Footer logo" />
              <div class="footer-logo-text">
                <span class="logo-title">CDS</span>
                <span>Confidence daily savings</span>
              </div>
            </div>
            <p class="footer-message">
              Confywills Nigeria Limited was founded in 2012, since then we have
              continue to produce a reliable services in all sectors of
              production and consumption.
            </p>
          </div>

          <div class="footer-group call-container">
            <div class="call-center-container">
              <div class="call-center-textbox">
                <span class="call-center-text">Call Center</span>
                <a href="tel:09045840662" class="call-center-no">09045840662</a>
              </div>
              <div class="tel-icon-container">
                <i class="fa fa-phone"></i>
              </div>
            </div>
            <ul class="social-media-links">
              <li>
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-instagram"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="copyright-message">
          <div>C</div>
          <span>Copyright CDS 2022</span>
        </div>
      </div>
    </footer>
    <!-- FONT AWESOME JIT SCRIPT-->
    <script
      src="https://kit.fontawesome.com/3ae896f9ec.js"
      crossorigin="anonymous"
    ></script>
    <!-- JQUERY SCRIPT -->
    <script src="assets/js/jquery/jquery-3.6.min.js"></script>
    <!-- JQUERY MIGRATE SCRIPT (FOR OLDER JQUERY PACKAGES SUPPORT)-->
    <script src="assets/js/jquery/jquery-migrate-1.4.1.min.js"></script>
    <script src="assets/js/slick/slick.js"></script>
    <script>
      $(function () {
        // const burgerMenu = $(".burger-menu");
        // const mobileNav = $(".mobile-menu");

        $(".product-slider").slick({
          arrows: false,
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: true,
          infinite: true,
          speed: 500,
          fade: true,
          cssEase: "linear",
          autoplay: true,
          autoplaySpeed: 2000,
        });

        // //CHANGING THE ARROW BUTTONS TO ARROWS
        // $(".slick-next").html("<i class='fas fa-arrow-right'></i>");
        // $(".slick-prev").html("<i class='fas fa-arrow-left'></i>");

        //HEADER STICKY FUNCTIONALITY
        // Jquery handler for displaying sticky header upon scroll.
        // $(window).on("scroll", () => {
        //     let header = $("header");

        //     header[0].classList.toggle("sticky", $(window)[0].scrollY > 180);
        // });

        // Event Handler for Burger Menu Toggle
        // burgerMenu.on("click", () => {
        //     burgerMenu.toggleClass("active");
        //     mobileNav.toggleClass("active");
        // });

        // SMOOTH SCROLL FUNCTIONALITY
        // Smooth scroll function declaration for handling smooth document fragmenting.
        // const smoothScroll = (buttonID, location, duration) => {
        //     $(buttonID).on("click", (e) => {
        //         $([document.documentElement, document.body]).animate({
        //             scrollTop: $(location).offset().top
        //         }, duration);
        //     })
        // };

        // smoothScroll(".collaborate-btn-container button", "#services", 3000)
      });
    </script>
  </body>
</html>
