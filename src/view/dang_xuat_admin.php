<?php
session_start();

session_unset();
session_destroy();

header("Location: dang_nhap.php");
exit();
?>
