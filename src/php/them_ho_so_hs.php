<?php

if(isset($_POST["btn_nop"])) {
  echo "<a href='nop_ho_so.php?id=".$_POST["btn_nop"]."' id='navigate'/>";
  echo "<script>";
  echo "document.getElementById('navigate').click();";
  echo "</script>";

}