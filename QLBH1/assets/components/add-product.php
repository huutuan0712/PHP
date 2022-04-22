<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Juta Shopping</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
</head>

<body>
  <?php include '../authController.php'; ?>
<div class="wrapper">
    <header class="bg-light p-3">
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
    <!-- END HEADER -->
    <div class="sidebar overflow-hidden">
      <div class="container-fluid">
        <div class="row">
          <div class="col-3">
            <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width:280px">
              <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                  <use xlink:href="#bootstrap"></use>
                </svg>
                <span class="fs-4">Quản lý </span>
              </a>
              <hr>
              <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                  <a href="../pages/admin.php" class="nav-link active" aria-current="page">
                    <svg class="bi me-2" width="16" height="16">
                      <use xlink:href=""></use>
                    </svg>
                    Quản lý Sản phẩm
                  </a>
                </li>
                <li>
                  <a href="#" class="nav-link link-dark">
                    <svg class="bi me-2" width="16" height="16">
                      <use xlink:href="#speedometer2"></use>
                    </svg>
                    Quản lý Danh mục
                  </a>
                </li>
                <li>
                  <a href="#" class="nav-link link-dark">
                    <svg class="bi me-2" width="16" height="16">
                      <use xlink:href="#table"></use>
                    </svg>
                    Quản lý Thống
                  </a>
                </li>
                <li>
                  <a href="#" class="nav-link link-dark">
                    <svg class="bi me-2" width="16" height="16">
                      <use xlink:href="#grid"></use>
                    </svg>
                    Quản lý Tài khoản
                  </a>
                </li>
                <li>
                  <a href="#" class="nav-link link-dark">
                    <svg class="bi me-2" width="16" height="16">
                      <use xlink:href="#people-circle"></use>
                    </svg>
                    Quản lý khuyến mãi
                  </a>
                </li>
              </ul>
              <hr>
            </div>
          </div>
          <div class="col-9">
            <form method="POST">
              <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="product_name">
              </div>
              <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" class="form-control" name="product_image">
              </div>
              <div class=" mb-3 ">
                <label class=" form-label">Price</label>
                <input type="text" class="form-control" name="product_price">
              </div>
              <button type="submit" class="btn btn-primary" name="product_add">Add</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  
  <!--  -->
  <footer class="p-3" style="background: white">
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
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>