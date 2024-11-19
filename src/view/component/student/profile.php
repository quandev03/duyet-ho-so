<?php
require "../Database/Repository.php";

session_start();

$nganhRepo = new Repository('nganh_xet_tuyen');
$diemRepo = new Repository('ho_so_xet_tuyen');
$accRepo = new Repository("account");

$isAdmin = isset($_SESSION['roles']) && $_SESSION['roles'] === -1;
$userId = $_SESSION['userId'] ?? null;

if (!$userId) {
    die("Bạn cần đăng nhập để xem thông tin này.");
}
$nganhDangKy = $diemRepo->findAll(["nganhXetTuyen"], where: ["idHocSinh" => $userId, "trangThai"=> "1"]);
// print_r($nganhDangKy);
$data = $diemRepo->findAll("*", where: ["idHocSinh" => $userId]);
// print_r($data);


function layThongTinNguoiDung($userId) {
    global $accRepo;
    return $accRepo->findAll([ "username", "full_name"], ["id" => $userId])[0] ?? null;
}

$nguoiDung = layThongTinNguoiDung($userId);
function layThongTinNganh($idNganh) {
    global $nganhRepo;
    $nganh = $nganhRepo->findAll(["tenNganhXetTuyen"], ["id" => $idNganh])[0];
    return $nganh["tenNganhXetTuyen"];
}
function renderBangNganh($nganh) {
    global $diemRepo, $userId;
    // nganhXetTuyen
    $tenNganh = layThongTinNganh($nganh['nganhXetTuyen']);
    $id = htmlspecialchars($nganh['id']);
    $tenNganh = htmlspecialchars($tenNganh);
    $khoiXetTuyen = htmlspecialchars($nganh['khoiXetTuyen']);
    $ngayNop = htmlspecialchars($nganh['createAt']);
    // $hoc_ba = htmlspecialchars($nganh['hoc_ba']);


    // Lấy điểm từ hồ sơ
    $diem = $diemRepo->findAll(
        ["diemMon1", "diemMon2", "diemMon3"],
        ["idHocSinh" => $userId, "nganhXetTuyen" => $id]
    );

    // Gán giá trị điểm
    $diemMon1 = htmlspecialchars($nganh["diemMon1"] ?? 'N/A');
    $diemMon2 = htmlspecialchars($nganh['diemMon2'] ?? 'N/A');
    $diemMon3 = htmlspecialchars($nganh['diemMon3'] ?? 'N/A');
    $hoc_ba_path = $nganh['hoc_ba'];
    $hoc_ba = "";
    if($nganh["hoc_ba"]) {
        $hoc_ba = "<a href='../storage/file_upload/hoc_ba/$hoc_ba_path' target='_blank'=>Xem học bạ</a>";
    } else {
        $hoc_ba = "Chưa có học bạ";
    }


    echo "
    <tr>
        <td>{$tenNganh}</td>
        <td>{$khoiXetTuyen}</td>
        <td>{$ngayNop}</td>
        <td>{$diemMon1}</td>
        <td>{$diemMon2}</td>
        <td>{$diemMon3}</td>
        <td>$hoc_ba</td>

    </tr>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý ngành học</title>
    <link rel="stylesheet" href="../CSS/main.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-left: 20px;
            border: 1px solid black;

        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #4CAF50;
        }

        .profile {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
                <p><strong>Các ngành đã nộp xét tuyển</p>

    <div class="profile">
        <?php if ($nguoiDung): ?>
            <div>
                <p><strong>Họ và tên:</strong> <?php echo htmlspecialchars($nguoiDung['full_name']); ?></p>
                <p><strong>Tên đăng nhập:</strong> <?php echo htmlspecialchars($nguoiDung['username']); ?></p>

            </div>
        <?php else: ?>
            <p>Không tìm thấy thông tin người dùng.</p>
        <?php endif; ?>
    </div>

    <table>
        <thead>
            <tr>
                <th>Tên ngành</th>
                <th>Khối xét tuyển</th>
                <th>Ngày nộp</th>
                <th>Điểm môn 1</th>
                <th>Điểm môn 2</th>
                <th>Điểm môn 3</th>
                <th>Xem học bạ</th>
            </tr>
        </thead>
        <tbody>
        <?php if (empty($data)): ?>
            <tr>
                <td colspan="7" style="text-align: center;">Không có ngành học nào.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($data as $nganh): ?>
                <?php renderBangNganh($nganh); ?>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</body>

</html>
