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
    include ("../php/them_ho_so_admin.php");
    if($data){
      foreach($data as $key => $value) {
        renderHoSoHS($value["id"], layTenHocSinh($value["idHocSinh"]), layTenChuyenNganh($value["nganhXetTuyen"]),$value["createAt"], nguoiDuyetHoSo($value["nguoiDuyet"]), $value["trangThai"], $value["khoiXetTuyen"], [$value["diemMon1"], $value["diemMon2"], $value["diemMon3"]]);
      }
    }
    else{
      echo "<h1>Không có hồ sơ nào</h1>";
    }

    
  ?>
</form>