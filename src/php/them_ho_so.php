<?php 
function checkSizeFile( $file) {
  if ($file["size"] < 100*1024*1024 && $file["size"] > 0) {
    return true;
  }else {
    return false;
  }
} 

function nopHocBa(){
  echo "<dialog open id='dialogNopHoSo'>";
  echo "  <form action='' method='post' enctype='multipart/form-data'>";
  echo "    <input class='dialog_input' type='file' name='file' id='file' accept='application/pdf'>";
  echo "    <button class='dialog_btn cancel_btn' type='submit' name='btnCancelNopHoBa'>Huỷ</button>";
  echo "    <button class='dialog_btn success_btn' type='submit' name='btnNop'>Nộp</button>";
  echo "  </form>";
  echo "</dialog>";
}

function cancelDialog(){
  echo "<script>";
  echo "  document.getElementById('dialogNopHoSo').close();";
  echo "</script>";
}

function renderNganh($tenNganh, $khoiXetTuyen =[], $ngayBatDau, $ngayKetThuc, $idNganh){
  echo "<div class='nganhXetTuyen'>";
  echo "<div class='nganh'>";
  echo   "<h2>".$tenNganh."</h2>";
  $khoi = implode(", ", $khoiXetTuyen);
  echo   "<p>Khối xét tuyển: ".$khoi."</p>";
  echo "</div>";
  echo "<div class='dateStart'>";
  echo  " <h5>Ngày bắt đầu:</h5>";
  echo   "<p class='date'>".$ngayBatDau."</p>";
  echo "</div>";
  echo "<div class='dateEnd'>";
  echo   "<h5>Ngày kết thúc:</h5>";
  echo   "<p class='date'>".$ngayKetThuc."</p>";
  echo "</div>";
  echo "<button type='submit' class='btnNopHoSo' name='btn_nop' value ='".$idNganh."'>Nộp ngay</button>";
  echo "</div>";
}

function renderHoSoHS (
  $idHoSo,
  $tenHocSinh,
  $tenChuyenNganh,
  $ngayDangKy, 
  $nguoiDuyet,
  $trangThai,
  $khoiXetTuyen, 
  $diemXetTuyen = []

){
  $dsKhoiXetTuyen = ["A00" => ["Toán", "Lý", "Hoá"], "A01" => ["Toán", "Lý", "Anh", "Sinh"], "B00" => ["Toán", "Hoá", "Sinh"], "C00" => ["Văn", "Sử", "Địa"],  "D01" => ["Toán", "Văn", "Anh"]];
  $monXetTuyen = $dsKhoiXetTuyen[$khoiXetTuyen];
  echo "  <div class='hoSo'>";
  echo "    <div class='infoHS'>";
  echo "      <h3 class='idHS'>ID:".$idHoSo."</h3>";
  echo "      <h1>Họ và tên :".$tenHocSinh."</h1>";
  echo "    </div>";
  echo "    <div class='infoNganhDangKy'>";
  echo "      <div class='tenNganhDK'>";
  echo "        <h3>Ngành đăng ký: ".$tenChuyenNganh."</h3>";
  echo "        <p>Ngày đăng ký: ".$ngayDangKy."</p>";
  echo "      </div>";
  echo "      <div class='khoiXetTuyen'>";
  echo "        <h4 class='titleKhoiXetTuyen'>Khối: ".$khoiXetTuyen."</h4>";
  echo "        <div class='diem'>";
  echo "          <p class='diemXetTuyen'>". $monXetTuyen[0].": ". $diemXetTuyen[0]."</p>";
  echo "          <p class='diemXetTuyen'>". $monXetTuyen[1].": ". $diemXetTuyen[1]."</p>";
  echo "          <p class='diemXetTuyen'>". $monXetTuyen[2].": ". $diemXetTuyen[2]."</p>";
  echo "        </div>";
  echo "      </div>";
  echo "      <div class='xetTuyen'>";
  if($trangThai == 0) {
    echo "        <h4 id='trangThaiHoSo'><font color= '#FFC107'>Trạng thái: Chưa duyệt </font></h4>";
  } else if($trangThai == 1) {
    echo "        <h4 id='trangThaiHoSo'><font color= '#4BA665'>Trạng thái:  Đã duyệt</font></h4>";
  } else {
    echo "        <h4 id='trangThaiHoSo'><font color= '#FF0000'> Trạng thái: Từ chối</font></h4>";
  }
  echo "        <h5>Nguời duyệt: Nguyễn Văn B</h5>";
  echo "      </div>";
  echo "    </div>";
  echo "    <div class='btnListXetTuyen'>";
  echo "      <button type='submit' class='btnXetTuyen successBtn' name='duyetHoSoHS' value=".$idHoSo.">Duyệt</button>";
  echo "      <button type='submit' class='btnXetTuyen warningBtn' name='tuChoiHoSoHS' value=".$idHoSo.">Không</button>";
  echo "      <button type='submit' class='btnXetTuyen infoBtn' name='xemHoSoHS' value=".$idHoSo.">Xem hồ sơ</button>";
  if($_SESSION['roles'] == 1) {
    echo "<button type='submit' class='btnXetTuyen deleteBrn' name='xoaHoSoHS'>Xóa</button>";
  }
  echo "    </div>";
  echo "  </div>";

}