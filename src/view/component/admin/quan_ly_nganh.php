<?php
require "../Database/Repository.php";

session_start();

$nganhRepo = new Repository('nganh_xet_tuyen');
$accRepo = new Repository("account");

// Kiểm tra quyền admin
$isAdmin = isset($_SESSION['roles']) && $_SESSION['roles'] === 1;


if(isset($_POST['btn_status'])) {
  $id = $_POST['btn_status'];
  $custom = $nganhRepo->findAll(["status"], ["id" => $id]);
  $preStatus = $custom[0]["status"];
  $status = $preStatus? 0 : 1;
  $nganhRepo->updateOne(["status" => $status], $id);

}

$data = $nganhRepo->findAll("*");
function nguoiDuyet(string $id): string {
  if ($id=='_') return 'Chưa có người đươc duyệt';
  global $accRepo;
  $id = trim($id, '_');
  $listId = explode("_", $id);
  $nguoiDuyet = array_map(function($id) use ($accRepo) {
    return tenNguoiDuyet($id, $accRepo);
  }, $listId);
  $result = implode(", ", $nguoiDuyet);
  return $result;
}

function tenNguoiDuyet($id, $accRepo){
  $result = $accRepo->findAll(["full_name"], ["id" => $id]);
  return $result[0]["full_name"] ?? 'unknown';
}
function renderNganh($nganh)
{
    // Escape data for safe HTML output
    $id = htmlspecialchars($nganh['id']);
    $tenNganh = htmlspecialchars($nganh['tenNganhXetTuyen']);
    $khoiXetTuyen = htmlspecialchars($nganh['khoiXetTuyen']);
    $ngayBatDau = htmlspecialchars($nganh['dateStart']);
    $ngayKetThuc = htmlspecialchars($nganh['dateEnd']);
    $nguoiDuyet = nguoiDuyet($nganh['nguoiDuyet']);
    // $nguoiDuyet = $nganh['nguoiDuyet'];
    $status = isset($nganh['status']) && $nganh['status'] ? "Hiện" : "Ẩn";

    echo "
    <div class='nganh'>
        <h3>{$tenNganh}</h3>
        <p>Khối xét tuyển: {$khoiXetTuyen}</p>
        <p>Ngày bắt đầu: {$ngayBatDau}</p>
        <p>Ngày kết thúc: {$ngayKetThuc}</p>
        <p>Người được duyệt: {$nguoiDuyet}</p>
        <form method='post'>
            <input type='hidden' name='idNganh' value='{$id}' />
            <button type='submit' name='btn_status' value='$id'>{$status}</button>
            <button type='submit' name='action' value='edit'>Sửa</button>";
            
    // Only show delete button for admins
    if ($_SESSION['roles'] === 1) {
        echo "<button type='submit' name='action' value='delete'>Xóa ngành</button>";
    }

    echo "</div>";
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
  <form class="listNganh" method="post">
    <?php foreach ($data as $nganh) {
      renderNganh($nganh);
    } ?>
  </form>
</body>

</html>
