<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAYPAL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
</head>
<body>
<?php include '../authController.php'; ?>
<header class="bg-light p-3 sticky-top">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <div class="header-logo">
            <img src="../img/logo.webp" alt="">
          </div>
        </div>
        <div class="col-md-8 d-flex justify-content-between align-items-center">
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
    </div>
        <div class="container-fluid">
           <div class="col-md-12">
               <div class="row">
                   <div class="col-md-6">

                   </div>
                   <div class="col-md-6">
                        <h5 class="text-center">Oder Details</h5>
                
                        <div id="paypal-button-container">
                        <?php
                          $output = "";
                          $output .= "
                                  <table class='table table-bordered table-striped'>
                                    <tr>
                                      <th>ID</th>
                                      <th> Name</th>
                                      <th> Price</th>
                                      <th>Quantity</th>
                                      <th>Total Price</th>
                                      <th>Action</th>
                                    </tr>
                                ";
                          if (!empty($_SESSION['cart'])) {
                            $total = 0;
                            foreach ($_SESSION['cart'] as $key => $value) {
                              $output .= "
                                <tr>
                                <td>" . $value['id'] . "</td>
                                <td>" . $value['name'] . "</td>
                                <td>$" . $value['price'] . "</td>
                                <td>" . $value['quantity'] . "</td>
                                <td>" . number_format($value['price'] * $value['quantity'], 2) . "</td>
                                <td>
                                <form method='post'> <button class = 'btn btn-primary 'name ='remove'>Remove </button></form>
                                </td>
                              </tr>
                              ";

                              $total = $total + $value['quantity'] * $value['price'];
                            }
                            $output .= "
                                <tr>
                                  <td colspan='3'></td>
                                  <td><b>Total Price</b></td>
                                  <td>" . number_format($total, 2) . "</td>
                                  <td>

                                    <form method='post'> <button class = 'btn btn-warning 'name ='clearall'>Clear </button></form>
                                  </td>
                                </tr>

                              ";
                          }
                          echo $output;
                        ?>
                        </div>          
                   </div>
               </div>
           </div>
        </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   <script src="https://www.paypal.com/sdk/js?client-id=AX5FBa_sfflqv8xfHzuuM4l83I1ae1m6p8reLpD3kv0ElzTAszh_NnDPRLwNS1g9KtRdQKOPFaWHCpSu&currency=USD"></script>
   <script>
       var total = <?= $total ?>;
       paypal.Buttons({
    // Sets up the transaction when a payment button is clicked
    createOrder: (data, actions) => {
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: total // Can also reference a variable or function
          }
        }]
      });
    },
    // Finalize the transaction after payer approval
    onApprove: (data, actions) => {
      return actions.order.capture().then(function(orderData) {
        // Successful capture! For dev/demo purposes:
        console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
        const transaction = orderData.purchase_units[0].payments.captures[0];
        alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
        // When ready to go live, remove the alert and show a success message within this page. For example:
        // const element = document.getElementById('paypal-button-container');
        // element.innerHTML = '<h3>Thank you for your payment!</h3>';
        // Or go to another URL:  actions.redirect('thank_you.html');
      });
    }
  }).render('#paypal-button-container');
   </script>
   
</body>
</html>