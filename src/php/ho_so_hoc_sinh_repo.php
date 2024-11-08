<?php
require "../Database/Repository.php";
require "../../config.php";
$mysqli = new Repository($HOST, $USERNAME_BD, $PASSWORD_BD, $DATABASE_BD, 'nganh_xet_tuyen');
$hoSoRepo = new Repository($HOST, $USERNAME_BD, $PASSWORD_BD, $DATABASE_BD,"ho_so_xet_tuyen");
$accRepo = new Repository($HOST, $USERNAME_BD, $PASSWORD_BD, $DATABASE_BD,"account");
$notification = new Repository($HOST, $USERNAME_BD, $PASSWORD_BD, $DATABASE_BD, "notification");
/** @var Repository $mysqli */
/** @var Repository $hoSoRepo */
/** @var Repository $hoSoaccRepoRepo */
function layThongTinHoSo($id){
  global $hoSoRepo;
  global $accRepo;
  global $mysqli;
  // return $hoSoRepo->findAll(["idHocSinh"],["id"=> $id]);
  $infoHoSo = $hoSoRepo->findAll("*",["id"=> $id])[0];
  // return $infoHoSo;
  $infoAccount = $accRepo->findAll(["full_name", "hocBa"], ["id"=> $infoHoSo["idHocSinh"]])[0];
  return $mysqli->findAll(["tenNganhXetTuyen"], ["id"=> $infoHoSo["nganhXetTuyen"]])[0]+ $infoHoSo + $infoAccount;
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
    "messenge"=> "'Hồ sơ của bạn đã bị ".$messenge." được duyệt'"
  ];
  if($roles==1 && $infoHoSo["trangThai"] == 1){
    displayMessage("Hồ sơ đã được duyệt", "warning");
  }elseif($roles==1 && $infoHoSo["trangThai"]!=1){
    displayMessage("Duyệt hồ sơ thành công", "success");
    $hoSoRepo->updateOne($dataSent, $idHoSo);
    $notification->insertOne($dataNofification);
    return reloadPage(3001);
  }elseif($roles== 0&& $infoHoSo["trangThai"]== -1){
    return displayMessage("Bạn không có quyền thay đổi", "error");
  } elseif($roles== 0&& $infoHoSo["trangThai"]== 0){
    displayMessage("Duyệt hồ sơ thành công", "success");
    $hoSoRepo->updateOne($dataSent, $idHoSo);
    $notification->insertOne($dataNofification);
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
    "nguoiDuyet"=> $idUser,
  ];
  $messenge =$idUser==1?"ADMIN":"Giáo Viên";
  $dataNofification = [
    "title"=>"'Hồ sơ bị từ chối'", 
    "sent_to"=> $infoHoSo["idHocSinh"], 
    "messenge"=> "'Hồ sơ của bạn đã bị ".$messenge." từ chối'"
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
    displayMessage("Từ chối hồ sơ thành công", "success");
    $hoSoRepo->updateOne($dataSent, $idHoSo);
    $notification->insertOne($dataNofification);
    return reloadPage(3001);
  }else{
    return displayMessage("Bạn không có quyền thay đổi", "error");
  }
}
function xoaHoSoHS($idHoSo) {
  global $hoSoRepo;
  global $notification;
  $idUser = $_SESSION["idUser"];
  $data = $hoSoRepo->findAll("idHocSinh", ["id"=> $idHoSo])[0]["idHocSinh"];
  $messenge =$idUser==1?"ADMIN":"Giáo Viên";
  $dataNofification = [
    "title"=>"'Hồ sơ Xoá'", 
    "sent_to"=> $data, 
    "messenge"=> "'Hồ sơ của bạn đã bị ".$messenge." xoá'"
  ];

  $hoSoRepo->deleteOne($idHoSo);
  $notification->insertOne($dataNofification);
  displayMessage("Xóa hồ sơ thành công", "success");
  return reloadPage(3001);
}