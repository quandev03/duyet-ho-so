<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nộp Hồ Sơ</title>
  <link rel="stylesheet" href="../CSS/main.css">
  <link rel="stylesheet" href="../CSS/them_ho_so.css">
</head>
<body>
  <?php 
    require "../php/handle.php";
    require "../php/them_ho_so.php";
    session_start();
    handleSession();
  ?>
  <div>
    <?php include "component/header.php";?>
  </div>
  <div class="body_page">
    <?php 
      include "component/menu.php";
      checkRoles("component/admin/them_ho_so.php", "component/admin/them_ho_so.php", "component/student/them_ho_so.php")
    ?>
  </div>

</body>
</html>