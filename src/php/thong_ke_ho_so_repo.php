<?php
require "../Database/Repository.php";
require "../../config.php";
$nganhXetTuyenRepo = new Repository($HOST, $USERNAME_BD, $PASSWORD_BD, $DATABASE_BD, 'nganh_xet_tuyen');
$hoSoRepo = new Repository($HOST, $USERNAME_BD, $PASSWORD_BD, $DATABASE_BD, 'ho_so_xet_tuyen');

/** @var Repository $hoSoRepo */
/** @var Repository  $nganhXetTuyenRepo */
function getDataThongKe(){
  global $hoSoRepo;
  return $hoSoRepo->findAll(["count(*) as soLuong", "nganhXetTuyen"], [],[] ,["GROUP BY nganhXetTuyen"]);
}

function layThongTinTungNganh($idNganh) {
  global $hoSoRepo;
  global $nganhXetTuyenRepo;
  $infoNganh = $nganhXetTuyenRepo->findAll(["tenNganhXetTuyen", "dateStart", "dateEnd"], ["id" => $idNganh])[0];
  $infoThongKe = $hoSoRepo->findAll(["count(*) as ls", "trangThai"], ["nganhXetTuyen" => $idNganh], [], ["GROUP BY trangThai"]);
  $tt1 = 0;
  $tt0 = 0;
  $tt_1 = 0;
  foreach ($infoThongKe as $key => $value) {


    if($value["trangThai"] == 1) {
      $tt1 = $value["ls"];
    } else if($value["trangThai"] == 0) {
      $tt0 = $value["ls"];
    }else if($value["trangThai"] == -1) {
      $tt_1 = $value["ls"];
    }
  }


  $result = [
    "tenNganh" => $infoNganh["tenNganhXetTuyen"],
    "dateStart"=> $infoNganh["dateStart"],
    "dateEnd"=> $infoNganh["dateEnd"],
    "status0"=> $tt0,
    "status1"=> $tt1,
    "status-1"=> $tt_1,
  ];
  return $result;
}