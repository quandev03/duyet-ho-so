<?php 
session_start();
function handleSession() {
  if (isset($_SESSION["username"])) {
    return true;
  } else {
    return header("Location: ../view/dang_nhap.php");
  }
}
function checkRoles($pathAdmin, $pathTeacher, $pathStudent) {
  if ($_SESSION["roles"] == 1) {
    include $pathAdmin;
  }
  elseif ($_SESSION["roles"] == 0) {
    include $pathTeacher;
  } elseif($_SESSION["roles"] == -1) {
    include $pathStudent;
  }
}
function checkRolesAccess($rolesAccess) {
    if ($_SESSION["roles"] != $rolesAccess) {
      return header("Location: error.php");
    }
}