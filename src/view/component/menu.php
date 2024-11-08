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
  .btn_navigate {
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
    <button type="submit" class="btn_navigate" name="menu" value="home">Trang Chủ</button>
    <hr>
    <button type="submit" class="btn_navigate" name="menu" value="themHoSo">Thêm hồ sơ</button>
    <hr>
    <button type="submit" class="btn_navigate" name="menu" value="profile">Profile</button>
    <hr>
    <button type="submit" class="btn_navigate" name="menu" value="about">Thông Tin</button>

    <?php 
      if($_SESSION['roles'] == 1){
        echo "<hr>";
        echo "<button type='submit' class='btn_navigate' name='menu' value='thongKe'>Thống kê</button>";
        echo "<hr>";
        echo "<button type='submit' class='btn_navigate' name='menu' value='phanQuyen'>Phân quyền</button>";
      }

    ?>
    <hr>
    <button type="submit" class="btn_navigate" name="menu" value="dangXuat">Đăng xuất</button>


  </form>
  <?php 
    if(isset($_POST['menu'])) {
      $menu = $_POST['menu'];
      $uri = $_SERVER["REQUEST_URI"];
      switch ($menu) {
        case 'home':

          if ($uri =="/duyet_ho_so/"){
            header("Location: ./");
            break;
          }else{
            echo "not ok";
            header("Location: ../../");
            break;
          }
        case 'themHoSo':
          if ($uri =="/duyet_ho_so/"){
            header("Location: src/view/them_ho_so.php");
            break;
          }else{
            echo "not ok";
            header("Location: them_ho_so.php");
            break;
          }
        case 'profile':
          if ($uri =="/duyet_ho_so/"){
            header("Location: src/view/profile.php");
            break;
          }else{
            echo "not ok";
            header("Location: profile.php");
            break;
          }
        case 'thongKe':
          if ($uri =="/duyet_ho_so/"){
            header("Location: src/view/thong_ke_ho_so.php");
            break;
          }else{
            header("Location: thong_ke_ho_so.php");
            break;
          }
          case "dangXuat":
            session_destroy();
            if ($uri =="/duyet_ho_so/"){
              header("Location: src/view/dang_nhap.php");
              break;
            }else{
              header("Location: dang_nhap.php");
              break;
            }
        default:
          # code...
          break;
      }
    }
  ?>
</div>