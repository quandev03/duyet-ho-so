<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập</title>
</head>
<body>
  <h1>Đăng Nhập</h1>
  <form action="" method="POST">
    <input type="text" name="username" placeholder="Tên đăng nhập">
    <input type="password" name="password" placeholder="Mật khẩu">
    <button type="submit" name = "login">Đăng nhập</button>
  </form>
  <?php 
    session_start();
    if(isset($_POST["login"])){
      $_SESSION["username"] = "login";
      $_SESSION["roles"] = -1;
      header("Location: ../index.php");
    }
  ?>
</body>
</html>