<style>
 .btnRefresh{
  width: 30px;
  height: 30px;
  background-color: #EBF5EE;

 }
 .body_page_form {
  width: 75%;
  height: 500px;
  border-radius: 20px;
  margin: 10px 0;
  padding: 50px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  /* align-items: center; */
  background-color: #EBF5EE;
 }
 .btnNopHoSo {
  width: 200px;
  height: 50px;
  border-radius: 20px;
  position: relative;
  left: 35%;
  background-color: #4BA665;
  color: white;
 }
 .nhapDiem {
  display: flex;
  justify-content: space-around;
  align-items: center;
 }
 .input_diem {
  width: 100px;
  height: 30px;
  border-radius: 10px;
  text-align: center;
 }
 .chuyenNhanh {
  width: 300px;
  height: 50px;
  border-radius: 20px;
  padding: 10px;
 }
 .chonKhoi {
  width: 300px;
  height: 50px;
  border-radius: 20px;
  padding: 10px;
 }
 .body_page_render {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 670%;
 }
</style>
<?php 
    require '../php/data.php';
    $idNganh = $_GET['id'];
    $infoNganh = layThongTinNganhXetTuyen($idNganh)[0];
    $khoiXetTuyen = explode(' ', $infoNganh['khoiXetTuyen']);
  ?>
<div class="body_page_render">
<form method="post" class="body_page_form">
  <div>
  <h2>Chuyên Ngành</h2>
  <select name="chuyenNhanh" id="" class="chuyenNhanh" >
    <option value="<?php echo $infoNganh['id']; ?>"><?php echo $infoNganh['tenNganhXetTuyen']; ?></option>
  </select>
  </div>

  <div class="khoiXetTuyet">
  <h2>Nhập điểm</h2>
    <select name="khoi" class="chonKhoi" id="">
      <?php 
        foreach($khoiXetTuyen as $key => $value) {
          echo "<option value='$value'>$value</option>";
        }
        ?>

    </select>
    <button name="btnSelect" class="btnRefresh"><img src="../storage/image_system/icons8-refresh-20.png" alt=""></button>
  </div>
  
  <div class="nhapDiem">
    <label for="mon1"><?php if(isset($_POST['btnSelect']) || isset($_POST['btnNopHoSo'])) { echo $dsKhoiXetTuyen[$_POST['khoi']][0];} ?></label>
    <input type="number" name="mon1" id="" placeholder="Nhập điểm" max="10" min="0" value="0" class="input_diem">
    <label for="mon2"><?php if(isset($_POST['btnSelect']) || isset($_POST['btnNopHoSo'])) { echo $dsKhoiXetTuyen[$_POST['khoi']][1];} ?></label>
    <input type="number" name="mon2" id="" placeholder="Nhập điểm" max="10" min="0" value="0" class="input_diem">
    <label for="mon3"><?php if(isset($_POST['btnSelect']) || isset($_POST['btnNopHoSo'])) { echo $dsKhoiXetTuyen[$_POST['khoi']][2];}?></label> 
    <input type="number" name="mon3" id="" placeholder="Nhập điểm" max="10" min="0" value="0" class="input_diem">
  </div>
  <button class="btnNopHoSo" name="btnNopHoSo">Nộp</button>
  <?php include "../php/nop_ho_so.php" ?>
</form>
</div>