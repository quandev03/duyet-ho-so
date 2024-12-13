<?php
session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");
$mysqli = new Repository( ' nganh_xet_tuyen');
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

function layTenHocSinh($idHocSinh) {
  global $accRepo;
  return $accRepo->findAll(["full_name"], ["id"=> $idHocSinh])[0]["full_name"];

}
function layTenChuyenNganh($idChuyenNganh) {
  global $mysqli;
  return $mysqli->findAll(["tenNganhXetTuyen"], ["id"=> $idChuyenNganh])[0]["tenNganhXetTuyen"];

}
function duyetHoSo($idHoSo) {
  global $hoSoRepo;
  global $notification;
  $roles = $_SESSION['roles'];
  $infoHoSo = $hoSoRepo->findAll(["trangThai", "idHocSinh"], ["id"=> $idHoSo])[0];
  $idUser = $_SESSION["userId"];
  $dataSent = [
    "trangThai"=> 1,
    "nguoiDuyet"=> $idUser,
  ];
  $messenge =$idUser==1?"ADMIN":"Giáo Viên";
  $dataNofification = [
    "title"=>"'Hồ sơ được duyệt'", 
    "sent_to"=> $infoHoSo["idHocSinh"], 
    "messenge"=> "'Hồ sơ của bạn đã được ".$messenge." được duyệt lúc". date("H:i:s d-m-Y")."'"
  ];
  if($roles==1 && $infoHoSo["trangThai"] == 1){
    displayMessage("Hồ sơ đã được duyệt", "warning");
  }elseif($roles==1 && $infoHoSo["trangThai"]!=1){
    $hoSoRepo->updateOne($dataSent, $idHoSo);
    $notification->insertOne($dataNofification);
    displayMessage("Duyệt hồ sơ thành công", "success");
    return reloadPage(3001);
  }elseif($roles== 0&& $infoHoSo["trangThai"]== -1){
    return displayMessage("Bạn không có quyền thay đổi", "error");
  } elseif($roles== 0&& $infoHoSo["trangThai"]== 0){
    $hoSoRepo->updateOne($dataSent, $idHoSo);
    $notification->insertOne($dataNofification);
    displayMessage("Duyệt hồ sơ thành công", "success");
    return reloadPage(3001);
  }else{
    displayMessage("Bạn không có quyền thay đổi", "error");
  }
}
function tuChoiHoSoHS($idHoSo) {
  global $hoSoRepo;
  global $notification;
  $roles = $_SESSION['roles'];
  $infoHoSo = $hoSoRepo->findAll(["trangThai", "idHocSinh"], ["id"=> $idHoSo])[0];
  $idUser = $_SESSION["userId"];
  $dataSent = [
    "trangThai"=> -1,
    "nguoiDuyet"=> $idUser
  ];
  $messenge =$idUser==1?"ADMIN":"Giáo Viên";
  $dataNofification = [
    "title"=>"'Hồ sơ bị từ chối'", 
    "sent_to"=> $infoHoSo["idHocSinh"], 
    "messenge"=> "'Hồ sơ của bạn đã bị ".$messenge." từ chối lúc". date("H:i:s d-m-Y")."'"
  ];
  if($roles==1 && $infoHoSo["trangThai"] == -1){
    return displayMessage("Hồ sơ đã từ chối", "warning");
  }elseif($roles==1 && $infoHoSo["trangThai"]!= -1){
    $hoSoRepo->updateOne($dataSent, $idHoSo);
    $notification->insertOne($dataNofification);
    displayMessage("Từ chối hồ sơ thành công", "success");
    return reloadPage(3001);
  }elseif($roles== 0&& $infoHoSo["trangThai"]== -1){
    return displayMessage("Bạn không có quyền thay đổi", "error");
  }elseif($roles== 0&& $infoHoSo["trangThai"]== 0){
    $hoSoRepo->updateOne($dataSent, $idHoSo);
    $notification->insertOne($dataNofification);
    displayMessage("Từ chối hồ sơ thành công", "success");
    return reloadPage(3001);
  }else{
    return displayMessage("Bạn không có quyền thay đổi", "error");
  }
}
function xoaHoSoHS($idHoSo) {
  global $hoSoRepo;
  global $notification;
  $idUser = $_SESSION["userId"];
  $data = $hoSoRepo->findAll(["idHocSinh", "hoc_ba"], ["id"=> $idHoSo])[0];
  $messenge =$idUser==1?"ADMIN":"Giáo Viên";
  $dataNofification = [
    "title"=>"'Hồ sơ Xoá'", 
    "sent_to"=> $data["idHocSinh"], 
    "messenge"=> "'Hồ sơ của bạn đã bị ".$messenge." xoá lúc". date("H:i:s d-m-Y")."'"
  ];
  $url = "../storage/file_upload/hoc_ba/".$data["hoc_ba"];
  unlink($url);
  $hoSoRepo->deleteOne($idHoSo);
  $notification->insertOne($dataNofification);
  displayMessage("Xóa hồ sơ thành công", "success");
  return reloadPage(3001);
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

function layDanhSachChuyenNganh(): array {
  global $mysqli;

  if ($_SESSION['roles']) {
    return $mysqli->findAll(['*']);
  }else{
    $sql = "SELECT * FROM nganh_xet_tuyen WHERE status = 1 AND nguoiDuyet LIKE '%_".$_SESSION['userId']."_%'";
    $result = $mysqli->__model()->query($sql);
    $data = [];
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
    return $data;
  }
}