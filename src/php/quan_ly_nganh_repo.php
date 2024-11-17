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
// function toggleStatus($id): int {
//   $currentVisibility = $mysqli->findOne(['status'], ['id' => $id])['status'];
//   $newVisibility = $currentVisibility ? 0 : 1;
//   $this->updateOne(['status' => $newVisibility], $id);
//   return $newVisibility;
// }

