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
<div class="body_page_render">
<form method="post" class="body_page_form">
  <div>
  <h2>Chuyên Ngành</h2>
  <select name="chuyenNhanh" id="" class="chuyenNhanh" readonly>
    <option value="1">Công Nghệ Thông Tin</option>
    <option value="2">Sư Phạm Tin Học</option>
    <option value="3">Sinh Học</option>
    <option value="4">Hoá Học</option>
    <option value="5">Vật Lý</option>
    <option value="6">Địa Lí</option>
    <option value="7">Lịch Sử</option>
  </select>
  </div>

  <div class="khoiXetTuyet">
  <h2>Nhập điểm</h2>
    <select name="khoi" class="chonKhoi" id="">
      <option value="0" <?php if(isset($_POST['btnSelect']) && $_POST['khoi'] == "0") echo "selected"; ?>>Chọn khối xét tuyển</option>
      <option value="A00" <?php if(isset($_POST['btnSelect']) && $_POST['khoi'] == "A00") echo "selected"; ?>>A00</option>
      <option value="A01" <?php if(isset($_POST['btnSelect']) && $_POST['khoi'] == "A01") echo "selected"; ?>>A01</option>
      <option value="B00" <?php if(isset($_POST['btnSelect']) && $_POST['khoi'] == "B00") echo "selected"; ?>>B00</option>
      <option value="C00" <?php if(isset($_POST['btnSelect']) && $_POST['khoi'] == "C00") echo "selected"; ?>>C00</option>
      <option value="D01" <?php if(isset($_POST['btnSelect']) && $_POST['khoi'] == "D01") echo "selected"; ?>>D01</option>
    </select>
    <button name="btnSelect" class="btnRefresh"><img src="../storage/image_system/icons8-refresh-20.png" alt=""></button>
  </div>
  <?php 
    require '../php/data.php';
  ?>
  <div class="nhapDiem">
    <label for="mon1"><?php if(isset($_POST['btnSelect']) || isset($_POST['btnNopHoSo'])) { echo $dsKhoiXetTuyen[$_POST['khoi']][0];} ?></label>
    <input type="number" name="mon1" id="" placeholder="Nhập điểm" max="10" min="0" value="0" class="input_diem">
    <label for="mon2"><?php if(isset($_POST['btnSelect']) || isset($_POST['btnNopHoSo'])) { echo $dsKhoiXetTuyen[$_POST['khoi']][1];} ?></label>
    <input type="number" name="mon1" id="" placeholder="Nhập điểm" max="10" min="0" value="0" class="input_diem">
    <label for="mon3"><?php if(isset($_POST['btnSelect']) || isset($_POST['btnNopHoSo'])) { echo $dsKhoiXetTuyen[$_POST['khoi']][2];}?></label> 
    <input type="number" name="mon3" id="" placeholder="Nhập điểm" max="10" min="0" value="0" class="input_diem">
  </div>
  <button class="btnNopHoSo" name="btnNopHoSo">Nộp</button>
  <?php 
    if(isset($_POST['btnNopHoSo'])) {
      if($_POST['khoi']!= '0'){
        echo "Ok";
      }
      else {
        echo "<div class='alert_error' id='alert'>Nộp học bạ thất bại</div>";
        echo "<script>";
        echo " setTimeout(() => {document.getElementById('alert').remove()}, 5000);";
        echo "</script>";
      }
    }
  ?>
</form>
</div>