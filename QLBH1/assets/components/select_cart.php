<?php 

function select_cart(){
    $conn = mysqli_connect("localhost", "root", "", "qlbh");
    $sql = "SELECT * FROM tbl_product";
    $result = $conn->query($sql);
    while ($row = mysqli_fetch_array($result)) {  ?>
      <div class="col-md-3">
        <div id="product-cart"
        class="product-cart p-5 shadow p-3 mb-5 bg-body rounded-3 overflow-hidden ">
          <form action="../product-cart/cart.php?id=<?= $row['id'] ?>" method="POST">
            <div class="cart-img mb-3">
              <img src="../img/<?= $row['image'] ?>" style="width: 100%">
            </div>
            <div class="cart-desc mb-3 ">
              <h5 class="text-center"><?= $row['name'] ?></h5>
              <h5 class="text-center">$<?= number_format($row['price']) ?></h5>
              <input type="hidden" name="name" value="<?= $row['name'] ?>">
              <input type="hidden" name="price" value="<?= $row['price'] ?>">
              <input type="number" name="quantity" value="1" class="form-control">
            </div>
            <div class="text-center ">
              <input type="submit" name="add" class="btn btn-primary p-2 " id="handle_cart" value="Add To Cart">
            </div>
          </form>
        </div>

      </div>
    <?php }
}