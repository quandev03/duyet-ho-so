<style>
  .menu {
    background-color: #152259;
    padding: 10px;
    width: 300px;
    height: 100%;
    min-height: 700px;
    position: relative;
    float: 1;
    z-index: 10;
    display: flex;
  
  }
  button {
    background-color: #152259;
    color: white;
    padding: 10px 20px;
    margin: 10px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    font-size: x-large;
    font-style: bold;
  }
  hr {
    width: 50%;
  }

</style>
<div class="menu">
  <form action="" method="post">
    <button type="submit" name="menu" value="home">Trang Chủ</button>
    <hr>
    <button type="submit" name="menu" value="themHoSo">Thêm hồ sơ</button>
    <hr>
    <button type="submit" name="menu" value="profile">Profile</button>
    <hr>
    <button type="submit" name="menu" value="about">Thông Tin</button>

    <?php 
      if($_SESSION['roles'] == 1){
        echo "<hr>";
        echo "<button type='submit' name='menu' value='thongKe'>Thống kê</button>";
        echo "<hr>";
        echo "<button type='submit' name='menu' value='phanQuyen'>Phân quyền</button>";
      }

    ?>
    <hr>
    <button type="submit" name="menu" value="dangXuat">Đăng xuất</button>


  </form>
  <?php 
    if(isset($_POST['menu'])) {
      $menu = $_POST['menu'];
      switch ($menu) {
        case 'home':
          header("Location: ../index.php");
          break;
        case 'themHoSo':
          header("Location: them_ho_so.php");
          break;
        case 'profile':
          header("Location: ../index.php?profile");
          break;
        case 'about':
          header("Location: ../index.php?about");
          break;
        case 'thongKe':
          header("Location: thong_ke_ho_so.php");
          break;
        default:
          # code...
          break;
      }
    }
  ?>
</div>