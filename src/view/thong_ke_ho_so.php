<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nộp Hồ Sơ</title>
  <link rel="stylesheet" href="../CSS/main.css">
  <link rel="stylesheet" href="../CSS/them_ho_so.css">
  <link rel="stylesheet" href="../CSS/header.css">
  <link rel="stylesheet" href="../CSS/messenge.css">
</head>
<body> 
  <?php 
    require "../php/handle.php";
    require "../php/them_ho_so.php";
    require "../php/data.php";
    require "component/header.php";
    require "../php/them_ho_so_repo.php";
    require "../php/thong_ke_ho_so.php";
    require "../../config.php";

    session_start();
    handleSession();
    checkRolesAccess("1");
  ?>
  <div>
    <?php header_page("Thống kê hồ sơ", '..');?>
  </div>
  <div class="body_page">
    <?php 
      include "component/menu.php";
      include "component/admin/thong_ke_ho_so.php";
    ?>
  </div>

</body>
</html>