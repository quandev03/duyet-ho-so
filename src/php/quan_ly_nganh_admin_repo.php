<?php
require "../Database/Repository.php";
session_start();
$mysqli = new Repository( 'nganh_xet_tuyen');
$hoSoRepo = new Repository("ho_so_xet_tuyen");
$accRepo = new Repository("account");
$notification = new Repository( "notification");
/** @var Repository $mysqli */
/** @var Repository $hoSoRepo */
/** @var Repository $accRepo */
function layDuLieuNganhChoHocSinh() {
  global $mysqli;
  $data = $mysqli->findAll('*', ["status"=> 1]);
  return $data;
}
function layDuLieuHoSo() {
  global $hoSoRepo;
  global $mysqli;
  if ($_SESSION['roles']) {
    return $hoSoRepo->findAll();
  }else{
    $userId = $_SESSION['userId'];
    $lsNganh = $mysqli->customFindLike("id", ["nguoiDuyet"=> "%_".$userId."_%"]);
    $listHoSo = [];
    foreach ($lsNganh as $key => $value) {
      $lsHS = $hoSoRepo->findAll("*", ["nganhXetTuyen"=> $value["id"]]);
      $listHoSo = array_merge($listHoSo, $lsHS);
    }
    return $listHoSo;
  }
}
function layDuLieuGiaoVien($idNguoiDuyet){

}
function taoDuLieu($idHocSinh, $khoiXetTuyen, $nganhXetTuyen, $diemMon1, $diemMon2, $diemMon3, $hocBa = null, $trangThai = 0) {
  global $hoSoRepo;

  // Tạo dữ liệu bản ghi mới
  $data = [
    "idHocSinh" => $idHocSinh,
    "khoiXetTuyen" => $khoiXetTuyen,
    "nganhXetTuyen" => $nganhXetTuyen,
    "diemMon1" => $diemMon1,
    "diemMon2" => $diemMon2,
    "diemMon3" => $diemMon3,
    "hoc_ba" => $hocBa,
    "trangThai" => $trangThai,
    "nguoiDuyet" => null, // Để null khi chưa có người duyệt
    "createAt" => date("Y-m-d H:i:s") // Thời gian tạo bản ghi hiện tại
  ];

  // Thêm bản ghi mới vào bảng "ho_so_xet_tuyen"
  $hoSoRepo->insert($data);
}

function nguoiDuyetHoSo($idNguoiDuyet) {
  global $accRepo;
  return $accRepo->findAll("full_name", ["id"=> $idNguoiDuyet])[0]["full_name"];
}
function checkHocBa() {
  global $accRepo;
  $idHocSinh = $_SESSION["userId"];
  return $accRepo->findAll(["hocBa"], ["id"=> $idHocSinh])[0]["hocBa"]!==null;
}