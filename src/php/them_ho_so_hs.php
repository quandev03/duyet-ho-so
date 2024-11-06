<?php
if(isset($_POST['btnNopHoBa'])) {
  nopHocBa() ;
}
if(isset($_POST['btnCancelNopHoBa'])) {
  cancelDialog();
}
if(isset($_POST['btnNop'])) {
  if(checkSizeFile($_FILES['file'])) {
    echo "<div class='alert_success' id='alert'>Nộp học bạ thành công</div>";
    echo "<script>";
    echo " setTimeout(() => {document.getElementById('alert').remove()}, 5000);";
    echo "</script>";
    move_uploaded_file($_FILES['file']['tmp_name'], '../storage/file_upload/' . str_replace(" ", "_", $_FILES['file']['name']));
  }else {
    echo "<div class='alert_error' id='alert'>Nộp học bạ thất bại</div>";
    echo "<script>";
    echo " setTimeout(() => {document.getElementById('alert').remove()}, 5000);";
    echo "</script>";
  }
}
if(isset($_POST["btn_nop"])) {
  echo "<a href='nop_ho_so.php?id=".$_POST["btn_nop"]."' id='navigate'/>";
  echo "<script>";
  echo "document.getElementById('navigate').click();";
  echo "</script>";

}