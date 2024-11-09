<?php 
$data= layDuLieuHoSo();
if(isset($_POST['xemHoSoHS'])) {
  echo "<a href='ho_so_hoc_sinh.php?id=".$_POST['xemHoSoHS']."' id = 'navigate'></a>";
  echo "<script>";
  echo "document.getElementById('navigate').click()";
  echo "</script>";
}
if(isset($_POST["duyetHoSoHS"])) {
  duyetHoSo($_POST["duyetHoSoHS"]);

};
if (isset($_POST["tuChoiHoSoHS"])) {
  tuChoiHoSoHS($_POST["tuChoiHoSoHS"]);
};
if (isset($_POST["xoaHoSoHS"])) {
  xoaHoSoHS($_POST["xoaHoSoHS"]);
}