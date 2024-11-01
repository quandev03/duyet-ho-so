<?php 
function checkSizeFile( $file) {
  if ($file["size"] < 100*1024*1024) {
    return true;
  }else {
    return false;
  }
} 