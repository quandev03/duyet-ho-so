<?php 
session_start();
function handleSession() {
  if (isset($_SESSION["username"])) {
    return true;
  } else {
    return header("Location: ../view/dang_nhap.php");
  }
}