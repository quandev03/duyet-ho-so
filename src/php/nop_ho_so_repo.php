<?php
require "../Database/Repository.php";
require "../../config.php";
$nganhXetTuyenRepo = new Repository('nganh_xet_tuyen');
$hoSoRepo = new Repository('ho_so_xet_tuyen');
/** @var Repository $nganhXetTuyenRepo*/
/** @var Repository $hoSoRepo*/
function layThongTinNganhXetTuyen($id){
  global $nganhXetTuyenRepo;
  return $nganhXetTuyenRepo->findAll("*", ["id" => $id]);
}
function nopHoSo($data, $idUser){
  global $hoSoRepo;
  $dataInsert = [
    "idHocSinh"=>  $idUser,
    "khoiXetTuyen"=> "'".$data["khoiXetTuyen"]."'",
    "diemMon1"=> $data["diemMon1"],
    "diemMon2"=> $data["diemMon2"],
    "diemMon3"=> $data["diemMon3"],
    "nganhXetTuyen"=> $data["nganhXetTuyen"],
    "hoc_ba"=> "'".$data["hoc_ba"]."'"
  ];
  return $hoSoRepo->insertOne($dataInsert);
}
function checkDaNopHoSo($idUser, $idNganh){
  global $hoSoRepo;
  $data = $hoSoRepo->findAll(["id"], ["idHocSinh" => $idUser, "nganhXetTuyen"=> $idNganh]);
  return count($data) > 0;
}
