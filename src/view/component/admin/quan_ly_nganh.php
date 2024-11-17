<?php
require "../Database/Repository.php";

session_start();

$nganhRepo = new Repository('nganh_xet_tuyen');

// Kiểm tra quyền admin
$isAdmin = isset($_SESSION['roles']) && $_SESSION['roles'] === 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $action = $_POST['action'] ?? '';
  $idNganh = $_POST['idNganh'] ?? '';

  // Kết nối cơ sở dữ liệu
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "duyet_ho_so";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
  }

  if ($action === 'togleStatgus' && $idNganh) {
    // Đổi trạng thái ngành học
    $currentStatus = $nganhRepo->findOne(['status'], ['id' => $idNganh])['status'];
    $newStatus = $currentStatus ? 0 : 1;
    $nganhRepo->updateOne(['status' => $newStatus], $idNganh);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
  } elseif ($action === 'edit' && $idNganh) {
    header("Location: sua_nganh.php?id={$idNganh}");
    exit;
  } 
}

$data = $nganhRepo->findAll("*");

function renderNganh($nganh, $isAdmin)
{
  $id = htmlspecialchars($nganh['id']);
  $tenNganh = htmlspecialchars($nganh['tenNganhXetTuyen']);
  $khoiXetTuyen = htmlspecialchars($nganh['khoiXetTuyen']);
  $ngayBatDau = htmlspecialchars($nganh['dateStart']);
  $ngayKetThuc = htmlspecialchars($nganh['dateEnd']);
  $nguoiDuyet = htmlspecialchars($nganh['nguoiDuyet']);
  $status = $nganh['status'] ? "Hiện" : "Ẩn";

  echo "
    <div class='nganh' id='nganh_{$id}'>
        <h3>{$tenNganh}</h3>
        <p>Khối xét tuyển: {$khoiXetTuyen}</p>
        <p>Ngày bắt đầu: {$ngayBatDau}</p>
        <p>Ngày kết thúc: {$ngayKetThuc}</p>
        <p>Người được duyệt: {$nguoiDuyet}</p>

        <form method='post'>
            <input type='hidden' name='idNganh' value='{$id}' />
            <button type='submit' name='action' value='toggleStatus'>{$status}</button>
            <button type='submit' name='action' value='edit'>Sửa</button>";


  // Chỉ hiển thị nút xóa nếu là admin
  if ($isAdmin) {
    echo "<button type='submit' name='action' value='delete'>Xóa ngành</button>";
  }

  echo "</form></div>";
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
    .listNganh {
      display: flex;
      flex-direction: column;
      align-items: center;
      overflow-y: scroll;
      height: 700px;
      position: relative;
      margin-left: 100px;
    }

    .nganh {
      border: 1px solid #ddd;
      border-radius: 8px;
      margin-bottom: 15px;
      padding: 15px;
      background: #f9f9f9;
      width: 800px;
    }

    .nganh h3 {
      margin: 0 0 10px;
    }

    .nganh p {
      margin: 5px 0;
    }

    .nganh form button {
      margin-right: 10px;
      padding: 5px 10px;
      border: none;
      background: #007bff;
      color: white;
      border-radius: 4px;
      cursor: pointer;
    }

    .nganh form button:nth-child(2) {
      background: #ffc107;
    }
  </style>
</head>

<body>
  <br>
  <div class="listNganh">
    <?php foreach ($data as $nganh) {
      renderNganh($nganh, $isAdmin);
    } ?>
  </div>
</body>

</html>
