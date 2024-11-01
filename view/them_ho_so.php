<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nộp Hồ Sơ</title>
  <link rel="stylesheet" href="../CSS/them_ho_so.css">
</head>
<body>
  <?php 
    require "../php/handle.php";
    require "../php/them_ho_so.php";
    session_start();
    handleSession();
    
  ?>

  <div class="header">
    <h1>Nộp Hồ Sơ</h1>
  </div>
</body>
</html>