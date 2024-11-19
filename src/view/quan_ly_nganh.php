<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm nghành học</title>
    <link rel="stylesheet" href="../CSS/main.css">
    <link rel="stylesheet" href="../CSS/them_ho_so.css">
    <link rel="stylesheet" href="../CSS/messenge.css">
    <link rel="stylesheet" href="../CSS/header.css">
    <style>
        .body_page{
            display:  flex;
        }
    </style>
</head>


<body>
    <?php
    require "../php/handle.php";
    require "../php/data.php";
    require "component/header.php";
    require "../php/messenge.php";
  
    session_start();
    handleSession();
    ?>
    <div>
        <?php
        checkRolesAccess("1");

        header_page("Quản lý ngành", '..');
        ?>
    </div>
    <div class="body_page">
        <?php
        include "component/menu.php";
        include "component/admin/them_nganh.php";
      
        include "component/admin/quan_ly_nganh.php";

        ?>
    </div>

</body>

</html>