<style>
  .body_page_render {
    display: flex;
    flex-direction: column;
    align-items: center;
    overflow-y: scroll;
  }
  .hoSo {
    width: 90%;
    padding: 10px;
    border-radius: 30px;
    background-color: #EBF5EE;
    margin: 10px 0;
  }
.infoNganhDangKy {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  height: 100px;
  border-radius: 20px;
  padding: 10px;
  margin: 10px 0;
}
.diem {
  display: flex;
  width: 250px;
  justify-content: space-between;
}
.btnXetTuyen {
  width: 120px;
  height: 50px;
  font-size: 15px;
  border-radius: 20px;
  margin-left: 15px;
}
.infoHS {
  display: flex;
  justify-content: space-around;
  align-items: center;
}
.xetTuyen {
  margin-right: 20px;
}
.successBtn{
  background-color: #4BA665;
  color: white;
}
.warningBtn {
  background-color: #FFC107;
  color: white;
}
.infoBtn {
  background-color: #152259;
  color: white;
}
.deleteBrn {
  background-color: #FF0000;
  color: white;
}
.btnListXetTuyen {
  display: flex;
  justify-content: end;
  align-items: center;
}
</style>
<form method="post" class="body_page_render">
  <?php 
    renderHoSoHS("12345", "Nguyễn Văn A", "Công nghệ thông tin", "25/9/2024", "Nguyễn Văn B", 0, "C00", [9, 9, 9]);
    renderHoSoHS("12225", "Nguyễn Văn C", "Công nghệ", "25/9/2024", "Nguyễn Văn B", 1, "A00", [4, 9, 6]);
    renderHoSoHS("12445", "Nguyễn Văn D", "Hoá Học", "25/9/2024", "Nguyễn Văn B", 1, "A00", [6, 4, 8]);
    renderHoSoHS("11111", "Nguyễn Văn E", "Vật Lý", "25/9/2024", "Nguyễn Văn B", -1, "A01", [10, 9, 10]);

    if(isset($_POST['xemHoSoHS'])) {
      echo "<a href='ho_so_hoc_sinh.php?id=".$_POST['xemHoSoHS']."' id = 'navigate'></a>";
      echo "<script>";
      echo "document.getElementById('navigate').click()";
      // echo "alert('Xem hồ sơ')";
      echo "</script>";
      // header('Location: ho_so_hoc_sinh.php');
    }
  ?>
</form>