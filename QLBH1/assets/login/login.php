<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../main.css">
  <title>Juta Shopping</title>
</head>

<body>
  <?php include '../authController.php' ?>
  <div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4 form-wrapper auth login">
        <h3 class="text-center form-title">Login</h3>
        <form action="login.php" method="post">
          <div class="form-group">
            <label>Username </label>
            <input type="text" name="username" class="form-control form-control-lg">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control form-control-lg">
          </div>
          <div class="form-group">
            <button type="submit" name="login-btn" class="btn btn-lg btn-block">login</button>
          </div>
        </form>
        <p>Don't yet have an account? <a href="../register/signup.php">Sign up</a></p>
      </div>
    </div>
  </div>
  <?php if (count($errors) > 0) : ?>
    <div class="alert alert-danger">
      <?php foreach ($errors as $error) : ?>
        <li>
          <?php echo $error; ?>
        </li>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

</body>

</html>