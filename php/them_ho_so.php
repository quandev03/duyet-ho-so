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
