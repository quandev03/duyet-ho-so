<style>
  img {
    width: 60px;
    height: 60px;
  }
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
  h1 {
    margin-left: 5%;
    color:#0B3051;
;
  }
  .logo {
    margin-left: 5%;
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
  input[type=search] {
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 10px;
  font-size: 16px;
  background-color: white;
  background-image: url("../storage/image_system/icons8-search-20.png");
  background-position:  10px 15px; 
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
  position: absolute;
  right: 30%;
}
.notification {
  position: absolute;
  right: 24%;
  width: 30px;
  height: 30px;
}
</style>
<div class="header_div">
  <form action="" class="header" method="post">
    <img src="../storage/image_system/logo.webp" alt="logo web"  class="logo">
    <h1>Nộp Hồ Sơ</h1> <!-- Đây là title của trang web -->
    <input type="search" name="input_search" id="">
    <img src="../storage/image_system/icons8-notification-30.png" alt="" class="notification">
    <button type="submit" name="logout" class="btn_header">Đăng xuất</button>
    <img src="../storage/image_system/logo.webp" alt="" class="avatar">
  </form>
  <?php 
    if(isset($_POST["logout"])){
      session_destroy();
      // header("Location: ../index.php");
      echo $_SESSION["username"];
    }
  ?>
</div>