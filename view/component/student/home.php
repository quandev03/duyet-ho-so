<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    require "../php/handle.php";
    require "../php/them_ho_so.php";
    session_start();
    handleSession();
  ?>
<div>

    <?php include "view/component/header.php"; ?>
  </div>
    
</body>
</html>