<?php 
$data= layDuLieuHoSo();
if(isset($_POST['xemHoSoHS'])) {
  echo "<a href='ho_so_hoc_sinh.php?id=".$_POST['xemHoSoHS']."' id = 'navigate'></a>";
  echo "<script>";
  // echo "document.getElementById('navigate').click()";
  echo "</script>";
}
if(isset($_POST["duyetHoSoHS"])) {
  $result = duyetHoSo($_POST["duyetHoSoHS"]);
  if($result) {
    echo "<script>location.reload()</script>";
    displayMessage("Thanh Cong", "sucess");
  }

};
if (isset($_POST["tuChoiHoSoHS"])) {
  $result = tuChoiHoSoHS($_POST["tuChoiHoSoHS"]);
  if($result) {
    echo "<script>location.reload()</script>";
  }
};
if (isset($_POST["xoaHoSoHS"])) {
  echo $_POST["xoaHoSoHS"];
  $result = xoaHoSoHS($_POST["xoaHoSoHS"]);
  if($result) {
    echo "<script>location.reload()</script>";
  }
}