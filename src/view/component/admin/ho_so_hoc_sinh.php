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
  bottom:  27%;
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
  <?php include "../php/ho_so_hoc_sinh.php"; ?>
<form class='body_page_render' method="post">
    <div class="display">
      <div class='infoHoSo'>
        <h3 class='text'>ID: <?php echo $thongTinHoSo["id"]?></h3>
        <h2 class='text'>Họ tên: <?php echo $thongTinHoSo["full_name"]?></h2>
      </div>
      <div class='infoChuyenNgạnh'>
        <div class="chuyenNganh">
          <h3 class='text'>Ngành: <?php echo $thongTinHoSo["tenNganhXetTuyen"]?></h3>
          <p class='text'>Ngày đăng ký: <?php echo $thongTinHoSo["createAt"]?></p>
        </div>
        <button type='submit' class="btnXemHocBa" name="btnXemHocBa">Xem học bạ</button>
      </div>
      <div class='xetTuyen'>
        <h4>Khối: <?php echo $khoiXetTuyen?></h4>
        <div class='diem'>
          <p class='diemHocBa'><?php echo $dsKhoiXetTuyen[$thongTinHoSo["khoiXetTuyen"]][0]?>: <?php echo $thongTinHoSo["diemMon1"]?></p>
          <p class='diemHocBa'><?php echo $dsKhoiXetTuyen[$thongTinHoSo["khoiXetTuyen"]][1]?>: <?php echo $thongTinHoSo["diemMon2"]?></p>
          <p class='diemHocBa'><?php echo $dsKhoiXetTuyen[$thongTinHoSo["khoiXetTuyen"]][2]?>: <?php echo $thongTinHoSo["diemMon3"]?></p>
        </div>
        <h5>Trạng Thái: <?php 
          if($thongTinHoSo["trangThai"]==1) {
            echo "<font color='#4BA665'>Đã duyệt</font>";
          }elseif( $thongTinHoSo["trangThai"]== 0) {
            echo "<font color='orange'>Chưa duyệt</font>";
          }else {
            echo "<font color='red'>Từ chối</font>";
          }
        ?></h5>
      </div>
      <div class='groupBtn'>
        <button type='submit' name="btnDuyet" class='btnHoSo btnSucess' value="<?php echo $thongTinHoSo["id"]?>">Duyệt</button>
        <button type='submit' name="btnTC" class='btnHoSo btnError' value="<?php echo $thongTinHoSo["id"]?>">Không Duyệt</button>
        
        <?php if($_SESSION["roles"]==1) {echo "<button type='submit' name='btnXoa' class='btnHoSo btnDelete' value='".$thongTinHoSo["id"]."'>Xoá</button>";}?>
        <button type='submit' name="cancel" class='btnHoSo btnCancel'></button>
      </div>
    </div>
</form>