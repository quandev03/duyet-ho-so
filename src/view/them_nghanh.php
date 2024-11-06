<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nộp Hồ Sơ</title>
  <link rel="stylesheet" href="../CSS/main.css">
  <link rel="stylesheet" href="../CSS/header.css">
</head>
<body> 
  <?php 
    require "../php/handle.php";
    require "component/header.php";

    handleSession();
    checkRolesAccess("1");
  ?>
  <div>
    <?php header_page("Thông tin hồ sơ", '..');?>
  </div>
  <div class="body_page">
    <?php 
      include "component/menu.php";
      include "../view/component/admin/them_nghanh.php";
    ?>
  </div>

</body>
</html>