<?php 
$data= layDuLieuHoSo();
$listNganh = layDanhSachChuyenNganh();
if(isset($_POST['xemHoSoHS'])) {
  echo "<a href='src/view/ho_so_hoc_sinh.php?id=".$_POST['xemHoSoHS']."' id = 'navigate'></a>";
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
if(isset($_POST["btn_nop"])) {
  echo "<a href='src/view/nop_ho_so.php?id=".$_POST["btn_nop"]."' id='navigate'/>";
  echo "<script>";
  echo "document.getElementById('navigate').click();";
  echo "</script>";

}