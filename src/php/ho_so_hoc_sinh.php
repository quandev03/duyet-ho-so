<?php
$idHoSo = $_GET["id"];
// echo "ACs";
$thongTinHoSo= layThongTinHoSo($idHoSo);
if(isset($_POST["cancel"])) {
  echo "<a href='them_ho_so.php' id = 'navigate'></a>";
  echo "<script>";
  echo "document.getElementById('navigate').click()";
  echo "</script>";
}

if(isset($_POST["btnXemHocBa"])) {
  if ($thongTinHoSo["hoc_ba"]) {
    $url = "../storage/file_upload/hoc_ba/" . $thongTinHoSo["hoc_ba"]; 
    // echo $url;
    echo "<a href='" . $url . "' target='_blank' id='navigate_ho_ba'></a>"; 
    echo "<script>";
    echo "document.getElementById('navigate_ho_ba').click()";
    echo "</script>";
  }else {
    displayMessage("Học bạ chưa được cập nhật", "warning");
  }
}

if(isset($_POST["btnDuyet"])) {
  duyetHoSo($idHoSo);
}
if(isset($_POST["btnTC"])) {
  echo tuChoiHoSoHS($idHoSo);
}
if(isset($_POST["btnXoa"])) {
  xoaHoSoHS($idHoSo);
}
