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
</body>
</html>