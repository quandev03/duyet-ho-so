<?php
  session_start();
  if (isset($_POST["admin"])) {
    $_SESSION["username"] = "login";
    $_SESSION["roles"] = 1;
    header("Location: ../index.php");
  }
  if (isset($_POST["teacher"])) {
    $_SESSION["username"] = "tearch";
    $_SESSION["roles"] = 0;
    header("Location: ../");
  }
  if (isset($_POST["btn_dang_nhap"])) {
    $_SESSION["username"] = "TEACHER";
    $_SESSION["roles"] = -1;
    $_SESSION["userId"] = 3;
    header("Location: ../..");
  }