<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Hồ sơ học sinh</title>
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
    require "../php/ho_so_hoc_sinh_repo.php";
    require "../php/messenge.php";

    session_start();
    handleSession();
  ?>
  <div>
    <?php header_page("Xem hồ sơ học sinh", '..');?>
  </div>
  <div class="body_page">
    <?php 
      include "component/menu.php";
      include "component/admin/ho_so_hoc_sinh.php";
    ?>
  </div>

</body>
</html>