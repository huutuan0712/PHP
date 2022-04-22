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
  <link rel="stylesheet" href="main.css">

</head>

<body>
  <?php include '../authController.php'; 
  include '../components/table-cart.php';
  include '../components/select_cart.php';
   if (isset($_POST['send'])) {
    $total = 0;
    foreach ($_SESSION['cart'] as $key => $value) {
     $total = $total + $value['quantity'] * $value['price'];
    }
    sendEmail_cart($total);
    echo "<script>alert('Mail sent success...')</script>";
    // unset($_SESSION['cart']);
  }
  ?>
 

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
  
  <div class="product-cart ">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <h3 class="text-center">Top Sản Phẩm Bán Chạy</h3>
          <div class="row">
            <?php
            select_cart();
            ?>
          </div>
        </div>
        <div class="col-md-4">
          <h2 class="text-center">Danh Sách Sản Phẩm </h2>
          <form method="POST"> <button class="btn btn-primary" name="send">Send Email</button></form>

          <?php
            table_cart();
          ?>

        </div>
      </div>
    </div>
    </div>
  <!-- FOOTER -->


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>