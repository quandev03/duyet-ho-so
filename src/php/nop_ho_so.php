<?php
if(isset($_POST['btnNopHoSo'])) {
  // print_r($_SESSION);
  $dataCheck =checkDaNopHoSo($_SESSION['userId'], $infoNganh["id"]);
  if(checkDaNopHoSo($_SESSION['userId'], $infoNganh["id"])){
    displayMessage("Hồ sơ đã được nộp", "warning");
  }else{
    $khoi = $_POST['khoi'];
    $diemMon1 = $_POST['mon1'];
    $diemMon2 = $_POST['mon2'];
    $diemMon3 = $_POST['mon3'];
    $data = [
      'khoiXetTuyen'=> $khoi,
      "diemMon1" => $diemMon1,
      "diemMon2" => $diemMon2,
      "diemMon3" => $diemMon3,
      "nganhXetTuyen"=> $infoNganh["id"],
    ];
    $idUser = $_SESSION['userId'];
    $dateNow = date('Y-m-d');
    if (strtotime($dateNow) < strtotime($infoNganh['dateStart'])){
      displayMessage('Chưa đến ngày nộp hồ sơ', 'warning');
      echo  '<a href="them_ho_so.php" id="navigate"></a>';
        echo "<script>";
        echo "setTimeout(() => {
          document.getElementById('navigate').click()
        }, 3000);";
        echo "</script>";
    } elseif (strtotime($dateNow) > strtotime($infoNganh['dateEnd'])){
      displayMessage('Hết hạn nộp hồ sơ', 'warning');
    } else {
      $result = nopHoSo($data, $idUser);
      if($result == 1) {
        displayMessage('Nộp hồ sơ thành công', 'success');
        echo  '<a href="them_ho_so.php" id="navigate"></a>';
        echo "<script>";
        echo "setTimeout(() => {
          document.getElementById('navigate').click()
        }, 3000);";
        echo "</script>";
      }
      else {
        displayMessage('Nộp hồ sơ thất bại', 'error');
      }
    }
  }
  
  
}
 