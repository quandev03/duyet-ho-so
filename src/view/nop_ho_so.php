<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng ký chuyên ngành</title>
  <link rel="stylesheet" href="../CSS/header.css">
  <link rel="stylesheet" href="../CSS/nop_ho_so.css">
  <link rel="stylesheet" href="../CSS/messenge.css">
  <link rel="stylesheet" href="../CSS/main.css">
</head>
<body>
  <?php 
    require "../php/handle.php";
    require "component/header.php";
    session_start();
    handleSession();
  ?>
  <div>
    <?php header_page("Đăng ký chuyên ngành", '..');?>
  </div>
  <div class="body_page">
    <?php include "component/menu.php";?>
    <?php 
      include "component/student/nop_ho_so.php";
    ?>
  </div>

</body>
</html>