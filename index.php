<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang chủ - Xét tuyển</title> <!-- Cải thiện tiêu đề -->
  <!-- <link rel="stylesheet" href="./CSS/main.css"> -->
  <!-- <link rel="stylesheet" href="./CSS/them_ho_so.css"> -->
  <!-- <link rel="stylesheet" href="./CSS/messenge.css"> -->
  <!-- <link rel="stylesheet" href="./CSS/nghanh_xet_tuyen.css"> -->
  
  <style>
    .header {
      display: flex;
      justify-content: start;
      align-items: center;
      background-color: white;
      padding: 20px;
    }
    .header_div {
      width: 100%;
    }
    .titleHeader {
      margin-left: 5%;
      color: #0B3051;
    }
    .logo {
      margin-left: 5%;
      width: 60px;
      height: 60px;
    }
    form {
      width: 100%;
      height: 100%;
    }
    .avatar {
      position: absolute;
      right: 5%;
      border-radius: 50%;
      width: 40px;
      height: 40px;
    }
    .btn_header {
      position: absolute;
      right: 12%;
      width: 140px;
      height: 40px;
      background-color: white;
      color: #0B3051;
      border-radius: 20px;
      border: none;
      font-size: 16px;
      font-weight: bold;
    }
    input[type=search] {
      box-sizing: border-box;
      border: 2px solid #ccc;
      border-radius: 10px;
      font-size: 16px;
      background-color: white;
      background-image: url("./src/storage/image_system/icon_search.png");
      background-position: 10px 15px; 
      background-repeat: no-repeat;
      padding: 12px 20px 12px 40px;
      position: absolute;
      right: 30%;
    }
    .notification {
      position: absolute;
      right: 24%;
      width: 30px;
      height: 30px;
    }
    .body_page{
      flex-direction: row;
      float: inherit;
    }
  </style>
</head>
<body>
  <?php 
    // Khởi động session
    // session_start(); 

    require "./src/php/handle.php";
    require "./src/php/them_ho_so.php";
    require "./src/php/data.php";
    require "./src/view/component/header.php";
   
    handleSession();
    checkRolesAccess("1");
  ?>

  <div>
    <?php header_page("Xét tuyển", "./src/"); ?>
  </div>
  
  <div class="body_page">
    <?php 
        include "./src/view/component/menu.php";
        include "./src/view/component/student/nghanh_xet_tuyen.php"; 
    ?>
  </div>
</body>
</html>
