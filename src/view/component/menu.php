<style>
  .menu {
    background-color: #152259;
    padding: 10px;
    width: 300px;
    height: 100%;
    min-height: 700px;
    position: relative;
    float: left;
    z-index: 10;
    display: flex;
    flex-direction: column;
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
    font-weight: bold;
  }
  button.selected {
    background-color: #f39c12; /* Color for selected button */
  }
  hr {
    width: 50%;
  }
</style>

<div class="menu">
  <form action="" method="post">
    <button type="submit" name="menu" value="home" class="<?php echo (isset($_POST['menu']) && $_POST['menu'] == 'home') ? 'selected' : ''; ?>">Trang Chủ</button>
    <hr>
    <button type="submit" name="menu" value="themHoSo" class="<?php echo (isset($_POST['menu']) && $_POST['menu'] == 'themHoSo') ? 'selected' : ''; ?>">Thêm hồ sơ</button>
    <hr>
    <button type="submit" name="menu" value="profile" class="<?php echo (isset($_POST['menu']) && $_POST['menu'] == 'profile') ? 'selected' : ''; ?>">Profile</button>

    <?php 
      if(isset($_SESSION['roles']) && $_SESSION['roles'] == 1){
        echo "<hr>";
        echo "<button type='submit' name='menu' value='thongKe' class='" . (isset($_POST['menu']) && $_POST['menu'] == 'thongKe' ? 'selected' : '') . "'>Thống kê</button>";
        echo "<hr>";
        echo "<button type='submit' name='menu' value='phanQuyen' class='" . (isset($_POST['menu']) && $_POST['menu'] == 'phanQuyen' ? 'selected' : '') . "'>Phân quyền</button>";
      }
    ?>
    <hr>
    <button type="submit" name="menu" value="dangXuat" class="<?php echo (isset($_POST['menu']) && $_POST['menu'] == 'dangXuat') ? 'selected' : ''; ?>">Đăng xuất</button>
  </form>

  <?php 
    if(isset($_POST['menu'])) {
      $menu = $_POST['menu'];
      switch ($menu) {
        case 'home':
          header("Location: ./index.php");
          exit();
        case 'themHoSo':
          header("Location: ./src/view/them_ho_so.php");
          exit();
        case 'profile':
          header("Location: ./src/view/xem_ho_so_hoc_sinh_da_dang_ki.php");
          exit();
        case 'thongKe':
          header("Location: ./src/view/thong_ke_ho_so.php");
          exit();
        case 'dangXuat':
          header("Location: src/view/logout.php");
          exit();
        default:
          break;
      }
    }
  ?>
</div>
