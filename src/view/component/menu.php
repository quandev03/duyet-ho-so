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
    

    <?php 
      if($_SESSION['roles'] == 1){
        echo "<button type='submit' class='btn_navigate' name='menu' value='themHoSo'>Duyệt hồ sơ</button>";
        echo "<hr>";
        echo "<button type='submit' class='btn_navigate' name='menu' value='thongKe'>Thống kê</button>";
        echo "<hr>";
        echo "<button type='submit' class='btn_navigate' name='menu' value='quanLyNganh'>Quản lý các ngành</button>";

      }else if($_SESSION['roles'] == 0){
        echo "<button type='submit' class='btn_navigate' name='menu' value='themHoSo'>Duyệt hồ sơ</button>";
      }
      else{
        echo "<button type='submit' class='btn_navigate' name='menu' value='themHoSo'>Nộp hồ sơ</button>";
        echo "<hr>";
        echo "<button type='submit' class='btn_navigate' name='menu' value='profile'>Profile</button>";
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

          if ($uri =="/duyet-ho-so/"){
            header("Location: ./");
            break;
          }elseif ($uri == "/duyet-ho-so/index.php"){
            header("Location: ./");
            break;
          }
          else{
            header("Location: ../../");
            break;
          }
        case 'themHoSo':
          if ($uri =="/duyet-ho-so/"){
            echo "<script>window.location.href = 'src/view/them_ho_so.php';</script>";
            break;
          }elseif ($uri == "/duyet-ho-so/index.php"){
            // header("Location: src/view/them_ho_so.php");
            echo "<script>window.location.href = 'src/view/them_ho_so.php';</script>";
            break;
          }
          else{
            header("Location: them_ho_so.php");
            break;
          }
        case 'profile':
          if ($uri =="/duyet-ho-so/"){
            echo "<script>window.location.href = 'src/view/xem_ho_so_hoc_sinh_da_dang_ki.php';</script>";
            break;
          }elseif ($uri == "/duyet-ho-so/index.php"){
            echo "<script>window.location.href = 'src/view/xem_ho_so_hoc_sinh_da_dang_ki.php';</script>";
            break;
          }else{
            header("Location: xem_ho_so_hoc_sinh_da_dang_ki.php");
            break;
          }
        case 'thongKe':
          if ($uri =="/duyet-ho-so/"){
            echo "<script>window.location.href = 'src/view/thong_ke_ho_so.php';</script>";
            break;
          }elseif ($uri == "/duyet-ho-so/index.php"){
            echo "<script>window.location.href = 'src/view/thong_ke_ho_so.php';</script>";
            break;
          }else{
            header("Location: thong_ke_ho_so.php");
            break;
          }
          case 'quanLyNganh':
            if ($uri =="/duyet-ho-so/"){
              echo "<script>window.location.href = 'src/view/them_nganh.php';</script>";
              break;
            }elseif ($uri == "/duyet-ho-so/index.php"){
              echo "<script>window.location.href = 'src/view/them_nganh.php';</script>";
              break;
            }else{
              header("Location: them_nganh.php");
              break;
            }
          
          case "dangXuat":
            session_destroy();
            if ($uri =="/duyet-ho-so/"){
              echo "<script>window.location.href = 'src/view/dang_nhap.php';</script>";
              break;
            }elseif ($uri == "/duyet-ho-so/index.php"){
              echo "<script>window.location.href = 'src/view/dang_nhap.php';</script>";
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