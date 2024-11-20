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
if(isset($_POST['action'])) {
  $id = $_POST['action'];
  header("Location: ./quan_ly_nganh.php?id=$id");
}

$data = $nganhRepo->findAll( "*");
print_r($data);

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
function renderNganh($nganh) {
  // Escape dữ liệu đầu vào
  $id = htmlspecialchars($nganh['id']);
  $tenNganh = htmlspecialchars($nganh['tenNganhXetTuyen']);
  $khoiXetTuyen = htmlspecialchars($nganh['khoiXetTuyen']);
  $ngayBatDau = htmlspecialchars($nganh['dateStart']);
  $ngayKetThuc = htmlspecialchars($nganh['dateEnd']);
  $nguoiDuyet = nguoiDuyet($nganh['nguoiDuyet']);
  $status = isset($nganh['status']) && $nganh['status'] ? "Hiện" : "Ẩn";

  echo "
  <div class='nganh'>
      <h3>{$tenNganh}</h3>
      <p>Khối xét tuyển: {$khoiXetTuyen}</p>
      <p>Ngày bắt đầu: {$ngayBatDau}</p>
      <p>Ngày kết thúc: {$ngayKetThuc}</p>
      <p>Người được duyệt: {$nguoiDuyet}</p>
      <input type='hidden' name='idNganh' value='{$id}' />
      <button type='submit' class='btnAn btn' name='btn_status' value='$id'>{$status}</button>
      <button type='submit' class='btnSua btn' name='action' value='$id'>Sửa</button>
  </div>";
}


?>

<style>
  .listNganh {
    display: flex;
    flex-direction: column;
    align-items: center;
    overflow-y: auto;
    height: 90%;
    position: absolute;
    margin-left: 10%;
    margin-top: -45%;
  }

  .nganh {
    border: 1px solid #ddd;
    border-radius: 1%;
    margin-bottom: 2%;
    padding: 2%;
    background: #f9f9f9;
    width: 60%;
  }

  .nganh h3 {
    margin: 0 0 2%;
  }

  .nganh p {
    margin: 1% 0;
  }

  .btnAn {
    background: #007bff;
  }

  .btnSua {
    background: #ffc107;
  }

  .btn {
    margin-right: 2%;
    padding: 1% 2%;
    border: none;
    color: white;
    border-radius: 4%;
    cursor: pointer;
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
