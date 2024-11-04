<style>

</style>
<?php
function header_page($title, $path){
  echo "<div class='header_div'>";
  echo " <form action='' class='header' method='post'>";
  echo "   <img src='$path/storage/image_system/logo.webp' alt='logo web'  class='logo'>";
  echo "   <h1 class ='titleHeader'>$title</h1> ";
  echo "   <input type='search' name='input_search' id=''>";
  echo "   <img src='$path/storage/image_system/icons8-notification-30.png' alt='' class='notification'>";
  $username = strtoupper($_SESSION['username']);
  echo "   <button type='submit' name='logout' class='btn_header'>$username</button>";
  echo "   <img src='$path/storage/image_system/logo.webp' alt='' class='avatar'>";
  echo " </form>";
  echo "</div>";
}