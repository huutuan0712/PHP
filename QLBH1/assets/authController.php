<?php
include 'sendEmail.php';

session_start();

$username = "";
$email = "";
$errors = [];
$conn = mysqli_connect("localhost", "root", "", "qlbh");
//// SignUp
if (isset($_POST['signup-btn'])) {
  if (empty($_POST['username'])) {
    $errors['username'] = "Username Required";
  }
  if (empty($_POST['email'])) {
    $errors['email'] = "Email Required";
  }
  if (empty($_POST['password'])) {
    $errors['password'] = "Password Required";
  }
  if (isset($_POST['username']) && $_POST['password'] !== $_POST['passwordConf']) {
    $errors['passwordConf'] = "The two do no match";
  }
  $username = $_POST['username'];
  $email = $_POST['email'];
  $token = bin2hex(random_bytes(50));
  sendEmail($email, $token);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $sql = "select * from users where email = '$email' LIMIT 1";
  $result = $conn->query($sql);
  if (mysqli_num_rows($result) > 0) {
    $errors['email'] = "Email adready exits";
  }
  if (count($errors) == 0) {
    $sql = "insert into users set username ='$username',email = '$email',token='$token',password='$password'";
    $result = $conn->query($sql);
    if ($result) {
      $_SESSION['id'] = $user_id;
      $_SESSION['username'] = $username;
      $_SESSION['email'] = $email;
      $_SESSION['veryfied'] = $user['veryfied'];
      $_SESSION['message'] = 'You are logged in!';
      $_SESSION['type'] = 'alert-success';
      header("location:../login/login.php");
    } else {
      $_SESSION['error_msg'] = "Database error: Could not register user";
    }
  }
}
///Login
if (isset($_POST['login-btn'])) {
  if (empty($_POST['username'])) {
    $errors['username'] = 'Username or email required';
  }
  if (empty($_POST['password'])) {
    $errors['password'] = 'Password required';
  }
  $username = $_POST['username'];
  $password = $_POST['password'];

  if (count($errors) === 0) {
    $query = "SELECT * FROM users WHERE username=? OR email=? LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $username, $password);

    if ($stmt->execute()) {
      $result = $stmt->get_result();
      $user = $result->fetch_assoc();
      if ($user['role'] === 1) {
        if (password_verify($password, $user['password'])) { // if password matches
          $stmt->close();

          $_SESSION['id'] = $user['id'];
          $_SESSION['username'] = $user['username'];
          $_SESSION['email'] = $user['email'];
          $_SESSION['verified'] = $user['veryfied'];
          $_SESSION['message'] = 'You are logged in!';
          $_SESSION['type'] = 'alert-success';
          $_SESSION['admin'] = $user['role'];
          header("location:../pages/admin.php");
          exit(0);
        } else { // if password does not match
          $errors['login_fail'] = "Wrong username / password";
        }
      } else {
        if (password_verify($password, $user['password'])) { // if password matches
          $stmt->close();

          $_SESSION['id'] = $user['id'];
          $_SESSION['username'] = $user['username'];
          $_SESSION['email'] = $user['email'];
          $_SESSION['verified'] = $user['veryfied'];
          $_SESSION['message'] = 'You are logged in!';
          $_SESSION['type'] = 'alert-success';
          header("location:../pages/index.php");
          exit(0);
        } else { // if password does not match
          $errors['login_fail'] = "Wrong username / password";
        }
      }
    } else {
      $_SESSION['message'] = "Database error. Login failed!";
      $_SESSION['type'] = "alert-danger";
    }
  }
}



//CART
if (isset($_POST['add'])) {
  if (isset($_SESSION['cart'])) {
    $session_arry_id = array_column($_SESSION['cart'], "id");
    if (!in_array($_GET['id'], $session_arry_id)) {
      $session_arry = array(
        "id" => $_GET['id'],
        "name" => $_POST['name'],
        "price" => $_POST['price'],
        "quantity" => $_POST['quantity']
      );
      $_SESSION['cart'][] = $session_arry;
    }
  } else {
    $session_arry = array(
      "id" => $_GET['id'],
      "name" => $_POST['name'],
      "price" => $_POST['price'],
      "quantity" => $_POST['quantity']
    );
    $_SESSION['cart'][] = $session_arry;
  }
}

function clear()
{
  foreach ($_SESSION['cart'] as $key => $value) {
    if ($_GET['id'] == $value['id']) {
      unset($_SESSION['cart'][$key]);
    }
  }
}
if (isset($_GET['action'])) {
  if ($_GET['action'] == "remove") {
    clear();
  }
}
if (isset($_POST['clearall'])) {
  unset($_SESSION['cart']);
}
// if (isset($_POST['remove'])) {
//   clear();
// }
//  ADMIN
if (isset($_POST['product_add'])) {
  $product_name = $_POST['product_name'];
  $product_image = $_POST['product_image'];
  $product_price = $_POST['product_price'];
  $sql = "INSERT INTO tbl_product SET name = '$product_name',image='$product_image',price='$product_price' ";
  $result = $conn->query($sql);
  if ($result) {
    header("location:../pages/admin.php");
  }
}
if (isset($_GET['action'])) {
  if ($_GET['action'] == "update") {
    $id = $_GET['id'];
    if (isset($_POST['product_update'])) {
      $product_name = $_POST['product_name'];
      $product_image = $_POST['product_image'];
      $product_price = $_POST['product_price'];
      $sql = "UPDATE tbl_product SET name='$product_name',image='$product_image',price='$product_price' where id=$id";
      $result = $conn->query($sql);
      if ($result) {
        header("location:../pages/admin.php");
      } else {
        echo "<scrit>alert('Update Fainal')</scrit>";
      }
    }
  }
  if ($_GET['action'] == "delete") {
    $id = $_GET['id'];
    $sql = "DELETE  FROM tbl_product where $id=id";
    $result = $conn->query($sql);
    if ($result) {
      header("location:../pages/admin.php");
    }
  }
}