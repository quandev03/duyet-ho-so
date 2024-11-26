<?php


if(isset($_POST["btn_exits"])) {
  header("Location: ../..");

}
print_r($_POST);
if (isset($_POST["btnXoa"])) {
  $id = $_POST["btnXoa"];
  echo  "asca";

  deleteNotification($id);
  header("Location: ./trang_thong_bao.php");
}