<?php
require "../Database/Repository.php";
require "../../config.php";
session_start();
$mysqli = new Repository($HOST, $USERNAME_BD, $PASSWORD_BD, $DATABASE_BD, 'nganh_xet_tuyen');
$hoSoRepo = new Repository($HOST, $USERNAME_BD, $PASSWORD_BD, $DATABASE_BD,"ho_so_xet_tuyen");
$accRepo = new Repository($HOST, $USERNAME_BD, $PASSWORD_BD, $DATABASE_BD,"account");
/** @var Repository $mysqli */
/** @var Repository $hoSoRepo */
/** @var Repository $hoSoaccRepoRepo */
function layDuLieuNganhChoHocSinh() {
  global $mysqli;
  $data = $mysqli->findAll('*');
  return $data;
}
function layDuLieuHoSo() {
  global $hoSoRepo;
  if ($_SESSION['roles']) {
    return $hoSoRepo->findAll();
  }else{
    return "Teacher";
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
  $dataSent = [
    "trangThai"=> 1,
  ];
  return $hoSoRepo->updateOne($dataSent, $idHoSo);
}
function tuChoiHoSoHS($idHoSo) {
  global $hoSoRepo;
  $dataSent = [
    "trangThai"=> -1,
  ];
  return $hoSoRepo->updateOne($dataSent, $idHoSo);
}
function xoaHoSoHS($idHoSo) {
  global $hoSoRepo;
  return $hoSoRepo->deleteOne($idHoSo);
}