
Dưới đây là phiên bản tái cấu trúc của đoạn mã PHP bạn yêu cầu. Mình đã cải thiện cấu trúc và cách thức xử lý các tình huống, giúp mã rõ ràng hơn và dễ bảo trì:

php
Sao chép mã
<?php
require "../Database/Repository.php";
require "../../config.php";
session_start();

$mysqli = new Repository($HOST, $USERNAME_BD, $PASSWORD_BD, $DATABASE_BD, 'nganh_xet_tuyen');
$hoSoRepo = new Repository($HOST, $USERNAME_BD, $PASSWORD_BD, $DATABASE_BD, "ho_so_xet_tuyen");
$accRepo = new Repository($HOST, $USERNAME_BD, $PASSWORD_BD, $DATABASE_BD, "account");

/** @var Repository $mysqli */
/** @var Repository $hoSoRepo */
/** @var Repository $accRepo */

function layDuLieuNganhChoHocSinh() {
    global $mysqli;
    return $mysqli->findAll('*');
}

function layDuLieuHoSo() {
    global $hoSoRepo;
    if (isset($_SESSION['roles']) && $_SESSION['roles'] == 'Teacher') {
        return $hoSoRepo->findAll();
    } else {
        return "Bạn không có quyền truy cập vào dữ liệu này.";
    }
}

function layTenHocSinh($idHocSinh) {
    global $accRepo;
    $data = $accRepo->findAll(["full_name"], ["id" => $idHocSinh]);
    return $data ? $data[0]["full_name"] : null;
}

function layTenChuyenNganh($idChuyenNganh) {
    global $mysqli;
    $data = $mysqli->findAll(["tenNganhXetTuyen"], ["id" => $idChuyenNganh]);
    return $data ? $data[0]["tenNganhXetTuyen"] : null;
}

function duyetHoSo($idHoSo) {
    global $hoSoRepo;
    $hoSo = $hoSoRepo->findAll(["trangThai"], ["id" => $idHoSo]);
    
    if ($hoSo && $hoSo[0]['trangThai'] != 1) {
        $dataSent = ["trangThai" => 1];
        $result = $hoSoRepo->updateOne($dataSent, $idHoSo);
        return $result ? "Hồ sơ đã được duyệt thành công." : "Không thể duyệt hồ sơ.";
    }
    return "Hồ sơ đã được duyệt hoặc không tồn tại.";
}

function tuChoiHoSoHS($idHoSo) {
    global $hoSoRepo;
    $dataSent = ["trangThai" => -1];
    $result = $hoSoRepo->updateOne($dataSent, $idHoSo);
    return $result ? "Hồ sơ đã bị từ chối." : "Không thể từ chối hồ sơ.";
}

function xoaHoSoHS($idHoSo) {
    global $hoSoRepo;
    $result = $hoSoRepo->deleteOne($idHoSo);
    return $result ? "Hồ sơ đã được xóa." : "Không thể xóa hồ sơ.";
}

function capNhatAvatar($idHocSinh, $avatarFile) {
    global $accRepo;
    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
    
    if (in_array($avatarFile['type'], $allowedTypes)) {
        $uploadDir = 'uploads/avatars/';
        $uploadFile = $uploadDir . basename($avatarFile['name']);
        
        if (move_uploaded_file($avatarFile['tmp_name'], $uploadFile)) {
            $dataSent = ["avatar" => $uploadFile];
            $result = $accRepo->updateOne($dataSent, $idHocSinh);
            return $result ? "Ảnh đại diện đã được cập nhật." : "Không thể cập nhật ảnh đại diện.";
        } else {
            return "Lỗi khi tải lên ảnh đại diện.";
        }
    } else {
        return "Ảnh không hợp lệ.";
    }
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

function capNhatHocBa($idHocSinh, $hocBaFile) {
    global $accRepo;
    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'application/pdf'];
    
    if (in_array($hocBaFile['type'], $allowedTypes)) {
        $uploadDir = 'uploads/hocba/';
        $uploadFile = $uploadDir . basename($hocBaFile['name']);
        
        if (move_uploaded_file($hocBaFile['tmp_name'], $uploadFile)) {
            $dataSent = ["hocba" => $uploadFile];
            $result = $accRepo->updateOne($dataSent, $idHocSinh);
            return $result ? "Học bạ đã được cập nhật." : "Không thể cập nhật học bạ.";
        } else {
            return "Lỗi khi tải lên học bạ.";
        }
    } else {
        return "Tệp học bạ không hợp lệ.";
    }
}
?>