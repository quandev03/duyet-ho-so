<style>
  .header {
  display: flex;
  justify-content: start;
  align-items: center;
  background-color: white;
  padding: 20px;

}
.header_div {
  width: 100%;
}
.titleHeader {
  margin-left: 5%;
  color:#0B3051;
;
}
.logo {
  margin-left: 5%;
  width: 60px;
  height: 60px;
}
form {
  width: 100%;
  height: 100%;
}
.avatar {
  position:absolute;
  right: 5%;
  border-radius: 50%;
  width: 40px;
  height: 40px;
}
.btn_header {
  position:absolute;
  right: 12%;
  width: 140px;
  height: 40px;
  background-color: white;
  color: #0B3051;
  border-radius: 20px;
  border: none;
  font-size: 16px;
  font-weight: bold;

}
.btn_noti {
  position: absolute;
  right: 24%;
  width: 40px;
  height: 40px;
  background-color: white;
  
  background-image: url(<?php 
  // print_r( $_SERVER);
  if ($_SERVER["PHP_SELF"] == "/") {
      echo "src/storage/image_system/icons8-notification-30.png";
  } else {
      echo "../storage/image_system/icons8-notification-30.png";
  }
  ?>);
  /* background-image: url('../storage/image_system/icons8-notification-30.png'); */
  background-repeat: no-repeat;
  background-position: 5px 5px;
  border: none;
}
</style>
<?php

function header_page($title, $path){
  echo $_SESSION["REQUEST_URI"];
  echo "<div class='header_div'>";
  echo " <form action='' class='header' method='post'>";
  echo "   <img src='$path/storage/image_system/logo.webp' alt='logo web'  class='logo'>";
  echo "   <h1 class ='titleHeader'>$title</h1> ";
  echo "   <button type='submit' class='btn_noti' name='btnNotification' id=''></button>";
  $fullname = strtoupper($_SESSION['fullname']);
  echo "   <button type='submit' name='logout' class='btn_header btn_user'>$fullname</button>";
  echo "   <img src='$path/storage/image_system/logo.webp' alt='' class='avatar'>";
  echo " </form>";
  echo "</div>";
}
if(isset($_POST["btnNotification"])){
  // echo "<script>document.querySelector('.dialog_notification').style.display = 'block';</script>";
  // header("Location: trang_thong_bao.php");
  // print_r($_SERVER);
  if ($_SERVER["PHP_SELF"] == "/") {
    header("Location: src/view/trang_thong_bao.php");
} else {
  header("Location: trang_thong_bao.php");
}
}
