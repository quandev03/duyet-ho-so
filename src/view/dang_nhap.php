<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../CSS/dang_nhap.css">
  <link rel="stylesheet" href="../CSS/messenge.css">
</head>

<body>
<?php
  require "../php/messenge.php";
  require "../php/validation.php";
  require "../Database/Repository.php";
  require "../../config.php";
?>

  <div class="login-form">
    <h2 class="text-center">Đăng Nhập</h2>
    <form id="loginForm" method="post">
      <div class="form-group">
        <label for="username">Tên người dùng: </label>
        <input type="text" name="username" class="form-control" id="username" placeholder="Nhập tên người dùng" 
       <?php if(isset($_POST['username'])) { echo "value='" . $_POST['username'] . "'"; } ?> />

      </div>
      
      <div class="form-group">
        <label for="password">Mật khẩu: </label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Nhập mật khẩu" required>
      </div>
      <button type="submit" name="btn_dang_nhap" class="btn btn-primary btn-block">Đăng Nhập</button>
      <a href="dang_ky.php">Đăng kí</a>
    </form>
  </div>
  <?php include "../php/dang_nhap.php" ?>
</body>

</html>
