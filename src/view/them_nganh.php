<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nộp Hồ Sơ</title>
  <link rel="stylesheet" href="../CSS/main.css">
  <link rel="stylesheet" href="../CSS/header.css">
  <link rel="stylesheet" href="../CSS/qln.css">
</head>
<body> 
  <?php 
    require "../php/handle.php";
    require "component/header.php";
    require "../../config.php";
    require "../php/data.php";

    handleSession();
    // checkRolesAccess("1");
  ?>
  <div>
    <?php header_page("Quản lý ngành xét tuyển", '..');?>
  </div>
  <div class="body_page">
    <?php 
      include "component/menu.php";  
    ?>
    <div class="contain">
      <?php 
        include "component/admin/quan_ly_nganh.php";
        include "component/admin/them_nganh.php";
      ?>
    </div>
  </div>

</body>
</html>