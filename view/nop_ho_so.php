<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nộp Hồ Sơ</title>
  <link rel="stylesheet" href="../CSS/them_ho_so.css">
  <style>
    .body_page {
      display: flex;
    }
  </style>
</head>
<body>
  <!-- <script src="../JS/them_ho_so.js" type="module"></script> -->
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
    <?php include "component/menu.php";?>
    <?php 
      include "component/student/nop_ho_so.php";
    ?>
  </div>

</body>
</html>