<?php
function hienThiThongBao($title, $content, $thoiGian) {
  echo '
  <div class="thongBao">
    <h2 class="title">' . htmlspecialchars($title) . '</h2>
    <p class="content">' . htmlspecialchars($content) . '</p>
    <p class="thoiGian">' . htmlspecialchars($thoiGian) . '</p>
    <button class="btnXoa">Xoá thông báo</button>
  </div>';
}
$dataThongBao = getDataNotification();
foreach ($dataThongBao as $thongBao) {
  hienThiThongBao($thongBao["title"], $thongBao["messenge"], $thongBao["thoiGian"]);
}

if(isset($_POST["btn_exits"])) {
  header("Location: them_ho_so.php");

}