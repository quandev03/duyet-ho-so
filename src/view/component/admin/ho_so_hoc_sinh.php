<style>
.infoHoSo {
  display: flex;
  justify-content: space-around;
}
.display  {
  width: 80%;
}
.infoChuyenNgạnh {
display: flex;
align-items: center;
justify-content: space-around;

}
.btnXemHocBa {
  width: 200px;
  height: 50px;
  background-color: #4BA665;
  padding-left: 50px;
  background-image: url("../storage/image_system/icons8-document-30.png");
  background-repeat: no-repeat;
  background-position: 10px 10px;
  border-radius: 25px;
}
.chuyenNganh {
  width: 50%;
}
.diem {
  display: flex;
  width: 250px;
  justify-content: space-between;
}
.xetTuyen {
  position: relative;
  width: 400px;
  height: auto;
  left: 6%;
}
.btnHoSo {
  width: 150px;
  height: 50px;
  border-radius: 25px;
  margin: 10px;
  font-size: 15px;
}
.groupBtn {
  display: flex;
  justify-content: end;
}
.btnSucess {
  background-color: #4BA665;
}
.btnCancel {
  position:absolute;
  bottom:  32%;
  left: 25%;
  width: 50px;
  height: 50px;
  background-image: url(../storage/image_system/icons8-back-50.png);
  background-repeat: no-repeat;
  background-size: 50%;
  background-position: 12px 12px;
}
.btnDelete {
  background-color: red;
}
.btnError {
  background-color: orange;
}
</style>
<?php 
  $khoiXetTuyen = "A00";
?>
<form class='body_page_render' method="post">
    <div class="display">
      <div class='infoHoSo'>
        <h3 class='text'>ID: 11234</h3>
        <h2 class='text'>Họ tên: Nguyễn Văn A</h2>
      </div>
      <div class='infoChuyenNgạnh'>
        <div class="chuyenNganh">
          <h3 class='text'>Ngành: Công nghệ thông tin</h3>
          <p class='text'>Ngày đăng ký: 25/9/2024</p>
        </div>
        <button type='submit' class="btnXemHocBa">Xem học bạ</button>
      </div>
      <div class='xetTuyen'>
        <h4>Khối: <?php echo $khoiXetTuyen?></h4>
        <div class='diem'>
          <p class='diemHocBa'><?php echo $dsKhoiXetTuyen[$khoiXetTuyen][0]?>: 10</p>
          <p class='diemHocBa'><?php echo $dsKhoiXetTuyen[$khoiXetTuyen][1]?>: 10</p>
          <p class='diemHocBa'><?php echo $dsKhoiXetTuyen[$khoiXetTuyen][2]?>: 10</p>
        </div>
      </div>
      <div class='groupBtn'>
        <button type='submit' class='btnHoSo btnSucess'>Duyệt</button>
        <button type='submit' class='btnHoSo btnError'>Không Duyệt</button>
        
        <?php if($_SESSION["roles"]==1) {echo "<button type='submit' class='btnHoSo btnDelete'>Xoá</button>";}?>
        <button type='submit' name="cancel" class='btnHoSo btnCancel'></button>
      </div>
    </div>
</form>
    <?php
    if(isset($_POST["cancel"])) {
      echo "<a href='them_ho_so.php' id = 'navigate'></a>";
      echo "<script>";
      echo "document.getElementById('navigate').click()";
      echo "</script>";
      exit;
    }
    ?>