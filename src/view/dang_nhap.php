<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link rel="icon" type="image/x-icon" href="./file_upload/logo.ico"> -->
  <link rel="stylesheet" href="../CSS/dang_nhap.css">

</head>

<body>
  <div class="login-form">
    <h2 class="text-center">Đăng Nhập</h2>
    <form id="loginForm" method="post">
      <div class="form-group">
        <label for="username">Tên người dùng: </label>
        <input type="text" name="username" class="form-control" id="username" placeholder="Nhập tên người dùng"
          required>
      </div>
      
      <div class="form-group">
        <label for="password">Mật khẩu: </label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Nhập mật khẩu" required>
      </div>
      <button type="submit" name="btn_dang_nhap" class="btn btn-primary btn-block">Đăng Nhập</button>
    </form>
  </div>
  <?php include "../php/dang_nhap.php" ?>
</body>

</html>