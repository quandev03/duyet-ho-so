<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang Chủ</title>
</head>
<body>
  <?php 
    require "./php/handle.php";
    require "./php/them_ho_so.php";
    session_start();
    handleSession();
  ?>
  <div>
    <?php //include "view/component/header.php"; ?>
  </div>
  <div class="body_page">
    <?php//include "view/component/menu.php"; ?>
    <?php 
      include "home.php";
      checkRoles("view/component/admin/them_ho_so.php", "view/component/admin/them_ho_so.php", "view/component/student/them_ho_so.php");
    ?>
  </div>

</body>
</html>
