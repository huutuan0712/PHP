
<?php
include '../authController.php';
include '../components/select_cart.php';
// redirect user to login page if they're not logged in
if (!isset($_SESSION['id'])) {
  header('location: login.php');
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="main.css">
  <title>Juta Shopping</title>
</head>

<body>
  <header class="bg-light p-3 sticky-top">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <div class="header-logo">
            <img src="../img/logo.webp" alt="">
          </div>
        </div>
        <div class="col-md-8 d-flex justify-content-end align-items-center">
          <ul class="nav justify-content-end">
            <li class="nav-item">
              <a class="nav-link fw-bold" href="../pages/index.php" style="color:black">Trang chủ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="../product-cart/cart.php" style="color:black">Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="../pages/index.php" style="color:black">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="../pages/index.php" style="color:black">Shop</a>
            </li>
            <li class="nav-item fw-bold">
              <a class="nav-link" href="../pages/index.php" style="color:black">Contact</a>
            </li>
          </ul>
          <div class="dropdown bg-dark text-white rounded-pill">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle p-2" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
              <?php echo $_SESSION['username']; ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-light text-small shadow" aria-labelledby="dropdownUser1">
              <li><a class="dropdown-item" href="#">New project...</a></li>
              <li><a class="dropdown-item" href="#">Settings</a></li>

              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="../login/logout.php">Sign out</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- end HEADER -->
  <div class="carousel">
    <div class="container-fluid">
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="banner" style="background-image: url(../img/home-1-01.webp);height: 50vh;
        background-repeat: no-repeat; background-size: cover; background-position: center;padding:6rem 0; ">
              <div class="container">
                <div class="content d-flex justify-content- align-items-center" style="height: 30vh;">
                  <div class="flex">
                    <div class="banner-heading">
                      <span class="fs-8 fw-normal">BIG SALE UP TO 20% OFF</span>
                      <h2 class="fw-normal" style="font-size: 60px;"><strong>NIKE</strong> BLACK</h3>
                        <span class="fw-normal" style="font-size: 20px;">History Month Collection 2018</span>
                    </div>
                    <div class=" btn btn-outline-dark my-4">Shopping Now</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="banner" style="background-image: url(../img/home-1-02.webp);height: 50vh;
          background-repeat: no-repeat; background-size: cover; background-position: center;padding:6rem 0; ">
              <div class="container">
                <div class="content d-flex justify-content- align-items-center" style="height: 30vh;">
                  <div class="flex">
                    <div class="banner-heading">
                      <span class="fs-8 fw-normal">TRENDING PRODUCTS 2018</span>
                      <h2 class="fw-normal" style="font-size: 60px;"><strong>NEW</strong> LOOKBOOK</h3>
                        <span class="fw-normal" style="font-size: 20px;">Juta Store | Clothing & Sport Equipment</span>
                    </div>
                    <div class=" btn btn-outline-dark my-4">Shopping Now</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="banner" style="background-image: url(../img/home-1-03.webp);height: 50vh;
            background-repeat: no-repeat; background-size: cover; background-position: center;padding:6rem 0; ">
              <div class="container">
                <div class="content d-flex justify-content- align-items-center" style="height: 30vh;">
                  <div class="flex">
                    <div class="banner-heading">
                      <span class="fs-8 fw-normal">TOP JACKET OF JUTA</span>
                      <h2 class="fw-normal" style="font-size: 60px;"><strong>NEW</strong>JACKET</h3>
                        <span class="fw-normal" style="font-size: 20px;">Aurora Shell Jacket Is Ready For Any Adventure</span>
                    </div>
                    <div class=" btn btn-outline-dark my-4">Shopping Now</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
   </div>
  </div>
  <!-- end BANNER -->
  <div class="service p-5">
    <div class="container-fluid">
      <div class="service-content border border-secondary p-3 rounded-3">
        <div class="service-inner d-flex justify-content-between align-items-center">
          <div class="our-service d-flex">
            <img src="../img/1.webp" alt="">
            <div class="info ms-2">
              <h4 class="fs-6 ">FREE DELIVERY</h4>
              <span>Free shipping on all order </span>
            </div>
          </div>
          <div class="our-service d-flex">
            <img src="../img/2.webp" alt="">
            <div class="info ms-2">
              <h4 class="fs-6 ">ONLINE SUPPORT 24/7</h4>
              <span>Support online 24 hours </span>
            </div>
          </div>
          <div class="our-service d-flex">
            <img src="../img/3.webp" alt="">
            <div class="info ms-2">
              <h4 class="fs-6 ">MONEY RETURN</h4>
              <span>Back guarantee 7 days </span>
            </div>
          </div>
          <div class="our-service d-flex">
            <img src="../img/4.webp" alt="">
            <div class="info ms-2">
              <h4 class="fs-6 ">MEMBER DISCOUNT</h4>
              <span>Onevery order over $130 </span>
            </div>
          </div>
          <div class="our-service d-flex">
            <img src="../img/5.webp" alt="">
            <div class="info ms-2">
              <h4 class="fs-6 ">SECURE PAYMENT</h4>
              <span>All cards accepted</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END SERVICE -->
  <div class="area">
    <div class="container-fluid">
      <div class="area-content ">
        <div class="row">
          <div class="col-md-4">
            <div class="overflow-hidden mb-4">
              <img src="../img/area-1.webp" class="rounded mx-auto d-block" alt="">
            </div>
            <div class="overflow-hidden">
              <img src="../img/area-2.webp" class="rounded mx-auto d-block" alt="">
            </div>
          </div>
          <div class="col-md-4">
            <div class="overflow-hidden">
              <img src="../img/area-3.webp" class="rounded mx-auto d-block" alt="">
            </div>
          </div>
          <div class="col-md-4">
            <div class="overflow-hidden mb-4">
              <img src="../img/area-4.webp" class="rounded mx-auto d-block" alt="">
            </div>
            <div class="overflow-hidden">
              <img src="../img/area-5.webp" class="rounded mx-auto d-block" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END AREA -->
  <div class="product py-5">
    <div class="container-fluid">
      <div class="row">
        <h2 class="text-center fs-2 mb-5">Shopping Cart Date</h2>
        <?php
          select_cart();
        ?>
      </div>
    </div>
  </div>
  <!-- END PRODUCT -->
  <div class="description">
    <div class="banner-home2 wow fadeInUp" data-wow-delay="100ms" style="background-image: url(../img/block1.webp); height: 40vh;
    background-repeat: no-repeat; background-size: cover; background-position: center;">
   
    </div>
  </div>
  <!-- END DESCRIPT -->
  <div class="p-5"  data-style="parallax">  
  <div class="container">
     <div class=" row">
        <div class="col-md-6  text-center">
         <div class="border border-dark p-4"> 
         <div class="bg-black p-3 mb-3 w-25 m-auto rounded-pill " >
            <i class="fa fa-truck fs-3 " style="color: #fff;"></i>
          </div>
          <div class="dt-sc-support-content">
            <h5 class="dt-sc-support-heading">Free Shipping</h5>
            <p class="dt-sc-support-description"> Amet consectetur adipiscing elit pellentesque. Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi.</p>
            <a href="#" class="btn btn-outline-dark ">View More</a>
          </div>
         </div>
        </div>
        <div class="col-md-6 text-center ">
         <div class="border border-dark p-4">
         <div class="bg-black p-3 mb-3 w-25 m-auto rounded-pill">
            <i class="fa fa-headphones fs-3" style="color: #fff;"></i>
          </div>
          <div class="dt-sc-support-content">
            <h5 class="dt-sc-support-heading">Free Returns</h5>
            <p class="dt-sc-support-description"> At varius vel pharetra vel turpis nunc eget lorem. Volutpat sed cras ornare arcu dui vivamus arcu felis.</p>
            <a href="#" class="btn btn-outline-dark">View More</a>
          </div>
         </div>
        </div>
      </div> 
  </div>
</div>
  <!-- FOOTER -->
  <footer class="p-5" style="background: white">
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-4">
          <div class="about-us-footer">
            <div class="footer-logo mb-4">
              <a href="#"><img src="../img/logo.webp" alt=""></a>
            </div>
            <div class="footer-info">
              <p class="phone"><img src="../img/phone.webp" alt="">+ (012) 800 456 789</p>
              <p class="desc_footer">We are a team of designers and developers that create high quality Magento, Prestashop, Opencart.</p>
              <div class="social_follow">
                <ul class="social-follow-list d-flex algin-items-center" style="list-style: none;">
                  <li class="mx-2 fs-3"><a href="#"><i class="fa-brands fa-facebook" style="color:#0d6efd;"></i></a></li>
                  <li class="mx-2 fs-3"><a href="#"><i class="fa-brands fa-twitter-square" style="color:#1aaed9;"></i></a></li>
                  <li class="mx-2 fs-3"><a href="#"><i class="fa-brands fa-youtube" style="color:#d82114;"></i></a></li>
                  <li class="mx-2 fs-3"><a href="#"><i class="fa-brands fa-google-plus" style="color:#eb3e32;"></i></a></li>
                  <li class="mx-2 fs-3"><a href="#"><i class="fa-brands fa-instagram" style="color:#8a7763;"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="row">
            <div class="col-2">
              <h5 style="color:black">PRODUCTS</h5>
              <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Prices Drop</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">New Products</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Best Sales</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Stores</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Login</a></li>
              </ul>
            </div>

            <div class="col-2">
              <h5 style="color:black">OUR COMPANY</h5>
              <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Delivery</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Legal Notice</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About Us</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Contact Us</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Sitemap</a></li>
              </ul>
            </div>

            <div class="col-2">
              <h5 style="color:black">YOUR ACCOUNT</h5>
              <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Addresses</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Credit Slips</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Orders</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Personal Info</a></li>
              </ul>
            </div>
            <div class="col-4 offset-xl-1">
              <div class="footer-title">
                <h4>Get in touch</h4>
              </div>
              <div class="block-contact-text">
                <p> Juta - Responsive Prestashop Theme<br>123 Main Street, Anytown, CA 12345 - USA.<br>United States</p>
                <p>Call us: <span>(012) 800 456 789-987 </span></p>
                <p>Email us: <span>demo@posthemes.com</span></p>
              </div>
              <div class="time">
                <h4 class="time-title">Opening time</h4>
                <div class="time-text">
                  <p>
                    Open: <span>8:00 AM</span> - Close: <span>18:00 PM</span>
                    Saturday - Sunday: Close
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-between py-4 my-4 border-top">
          <p>© 2021 Company,Juta. All rights reserved.</p>
          <ul class="list-unstyled d-flex">
            <li class="ms-3"><a class="link-dark" style="color:white" href="#"><svg class="bi" width="24" height="24">
                  <use xlink:href="#twitter"></use>
                </svg></a></li>
            <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                  <use xlink:href="#instagram"></use>
                </svg></a></li>
            <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                  <use xlink:href="#facebook"></use>
                </svg></a></li>
          </ul>
        </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>