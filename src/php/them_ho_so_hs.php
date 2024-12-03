<?php

if(isset($_POST["btn_nop"])) {
  if($_POST["btn_nop"]>=0){
  navigate("src/view/nop_ho_so.php?id=".$_POST["btn_nop"], 0);
  } else {
    echo "<script>alert('Đã hết hạn nộp hồ sơ')</script>";
  }
}