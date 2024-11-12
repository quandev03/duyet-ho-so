<?php
require "../Database/Repository.php";
require "../../config.php";
session_start();

// Khởi tạo các đối tượng Repository
$mysqli = new Repository('nganh_xet_tuyen');
$hoSoRepo = new Repository("ho_so_xet_tuyen");
$accRepo = new Repository("account");
$notification = new Repository( "notification");

/** @var Repository $mysqli */
/** @var Repository $hoSoRepo */
/** @var Repository $accRepo */

/**
 * Lấy dữ liệu ngành cho học sinh
 */
function layDuLieuNganhChoHocSinh() {
    global $mysqli;
    return $mysqli->findAll('*');
}

function layDuLieuHoSo() {
    global $hoSoRepo, $mysqli;
    if ($_SESSION['roles']) {
        return $hoSoRepo->findAll();
    } else {
        $userId = $_SESSION['userId'];
        $lsNganh = $mysqli->customFindLike("id", ["nguoiDuyet" => "%_".$userId."_%"]);
        $listHoSo = [];
        foreach ($lsNganh as $nganh) {
            $lsHS = $hoSoRepo->findAll("*", ["nganhXetTuyen" => $nganh["id"]]);
            $listHoSo = array_merge($listHoSo, $lsHS);
        }
        return $listHoSo;
    }
}

function layTenHocSinh($idHocSinh) {
    global $accRepo;
    $result = $accRepo->findAll(["full_name"], ["id" => $idHocSinh]);
    return $result[0]["full_name"] ?? '';
}

function layTenChuyenNganh($idChuyenNganh) {
    global $mysqli;
    $result = $mysqli->findAll(["tenNganhXetTuyen"], ["id" => $idChuyenNganh]);
    return $result[0]["tenNganhXetTuyen"] ?? '';
}

function capNhatThongTinProfile($idHocSinh, $newData) {
    global $accRepo;
    $result = $accRepo->updateOne($newData, $idHocSinh);
    return $result ? "Thông tin hồ sơ đã được cập nhật." : "Không thể cập nhật thông tin hồ sơ.";
}

function layThongTinProfile($idHocSinh) {
    global $accRepo;
    $data = $accRepo->findAll(["id", "username", "full_name", "roles", "avatar", "hocba"], ["id" => $idHocSinh]);
    return $data ? $data[0] : null;
}

function layDiemHS($idHocSinh) {
    global $accRepo;
    
    // Truy vấn lấy thông tin điểm học sinh từ bảng ho_so_xet_tuyen
    $data = $accRepo->findAll("*", ["id" => $idHocSinh]);
    
    return $data ? $data[0] : null; // Trả về dữ liệu điểm của học sinh
}

function checkFileType($file, $allowedTypes) {
    return in_array($file['type'], $allowedTypes);
}

// Function to upload file to the server
function uploadFile($file, $uploadDir) {
    $fileName = basename($file['name']);
    $targetFile = $uploadDir . uniqid() . '-' . $fileName; // Add unique id to file name
    if (move_uploaded_file($file['tmp_name'], $targetFile)) {
        return $targetFile;  // Return the file path relative to the upload directory
    }
    return false;
}