<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="./file_upload/logo.ico">
  <link rel="stylesheet" href="../CSS/dang_nhap.css">

</head>

<body>
  <h1>Đăng Nhập</h1>
  <form action="" method="POST">
    <input type="text" name="username" placeholder="Tên đăng nhập">
    <input type="password" name="password" placeholder="Mật khẩu">
    <button type="submit" name = "admin">Admin</button>
    <button type="submit" name = "tearch">Tearch</button>
    <button type="submit" name = "login">Student</button>

  </form>
  <?php 
    session_start();
    if(isset($_POST["admin"])){
      $_SESSION["username"] = "login";
      $_SESSION["id"] = 1;
      $_SESSION["roles"] = 1;
      header("Location: ../index.php");
    }
    if(isset($_POST["tearch"])){
      $_SESSION["username"] = "tearch";
      $_SESSION["id"] = 2;
      $_SESSION["roles"] = 0;
      header("Location: ../index.php");
    }
    if(isset($_POST["login"])){
      $_SESSION["username"] = "studen";
      $_SESSION["id"] = 3;
      $_SESSION["roles"] = -1;
      header("Location: ../index.php");
    }
  ?>
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
  
</body>

</html>