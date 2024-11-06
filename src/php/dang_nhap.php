<?php
  session_start();
  if (isset($_POST["admin"])) {
    $_SESSION["username"] = "login";
    $_SESSION["roles"] = 1;
    header("Location: ../index.php");
  }
  if (isset($_POST["tearch"])) {
    $_SESSION["username"] = "tearch";
    $_SESSION["roles"] = 0;
    header("Location: ../index.php");
  }
  if (isset($_POST["login"])) {
    $_SESSION["username"] = "studen";
    $_SESSION["roles"] = -1;
    header("Location: ../index.php");
  }
  ?>