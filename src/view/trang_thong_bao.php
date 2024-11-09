<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thông báo</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }
    .thongBao {
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 5px;
      padding: 20px;
      margin: 20px auto;
      max-width: 600px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .title {
      font-size: 24px;
      margin-bottom: 10px;
    }
    .content {
      font-size: 16px;
      margin-bottom: 10px;
    }
    .thoiGian {
      font-size: 14px;
      color: #888;
      margin-bottom: 20px;
    }
    .btnXoa {
      background-color: #ff4d4d;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
    }
    .btnXoa:hover {
      background-color: #ff1a1a;
    }
  </style>
</head>
<body>
  <h1>Thông báo</h1>
  <form action="" method="post">
  <button class="btnXoa" name="btn_exits">Thoát</button>
  </form>
  <?php
  
  ?>
  <?php
    session_start();
    require "../php/notification_repo.php";
    include "../php/trang_thong_bao.php";
  ?>
</body>
</html>