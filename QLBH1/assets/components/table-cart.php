<?php 
function table_cart(){
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
                <a href='../product-cart/cart.php?action=remove&id=" . $value['id'] . "'>
                <button class = 'btn btn-primary '><i class='fa-solid fa-trash-can'></i> </button>
                </a>  
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
}