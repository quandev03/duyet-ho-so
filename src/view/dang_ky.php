<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng Ký Tài Khoản</title>
  <link rel="stylesheet" href="../CSS/messenge.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    form {
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 300px;
    }
    h2 {
      margin-bottom: 20px;
      font-size: 24px;
      text-align: center;
    }
    div {
      margin-bottom: 15px;
    }
    label {
      display: block;
      margin-bottom: 5px;
    }
    input[type="text"],
    input[type="password"],
    input[type="file"],
    select {
      width: 100%;
      padding: 8px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    button {
      width: 100%;
      padding: 10px;
      background-color: #28a745;
      border: none;
      border-radius: 4px;
      color: #fff;
      font-size: 16px;
      cursor: pointer;
    }
    button:hover {
      background-color: #218838;
    }
  </style>
</head>
<body>
  <?php
     require "../php/messenge.php";
     require "../php/validation.php";
     require "../Database/Repository.php";
     require "../../config.php";
  ?>
  <form action='' method='post' enctype='multipart/form-data'>
    <h2>Đăng ký tài khoản</h2>
    <div>
      <label for="username">Tên đăng nhập</label>
      <input type="text" name="username" id="username" <?php if(isset($_POST['username'])) {echo "value = '".$_POST['username']."'";} ?>>
    </div>
    <div>
      <label for="name">Họ và tên</label>
      <input type="text" name="fullname" id="name" <?php if(isset($_POST['fullname'])) {echo "value = '".$_POST['fullname']."'";} ?>>
    </div>
    <div>
      <label for="password">Mật khẩu</label>
      <input type="password" name="password" id="password">
    </div>
    <div>
      <label for="repassword">Nhập lại mật khẩu</label>
      <input type="password" name="repassword" id="repassword">
    </div>
    <div>
      <label for="role">Vai trò</label>
      <select name="role" id="role">
        <option value="0">Giáo viên</option>
        <option value="-1" selected>Học sinh</option>
      </select>
    </div>
    <button type="submit" name="dangKy">Đăng ký</button>
  </form>
  <?php include "../php/dang_ky.php"?>
</body>
</html>
