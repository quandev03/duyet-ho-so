<?php 

if (isset($_POST["dangKy"])) {
  $username = $_POST["username"] ?? null;
  $password = $_POST["password"] ?? null;
  $fullname = $_POST["fullname"] ?? null;
  $repassword = $_POST["repassword"] ?? null;
  $role = $_POST["role"] ?? null;

  if (empty($username) || empty($password) || empty($fullname) || empty($repassword) || empty($role)) {
    displayMessage("Vui lòng điền đầy đủ thông tin", "error");
  } else {
    if (validateUsername($username)) {
      if (validatePassword($password)) {
        if ($password === $repassword) {
          $mysqli = new Repository("account");
          $pass = md5($password); 
          $dataInsert = [
            "username" => "'$username'",
            "password" => "'$pass'",
            "full_name" => "'$fullname'",
            "roles" => $role
          ];
          
          $checkExist = $mysqli->findAll("*", ["username" => $username]);
          if (count($checkExist) > 0) {
            displayMessage("Tên đăng nhập đã tồn tại", "error");
          } else {
            $mysqli->insertOne($dataInsert);
            displayMessage("Đăng ký thành công", "success");
            header("Location: dang_nhap.php");
          }
        } else {
          displayMessage("Mật khẩu không trùng khớp", "error");
        }
      } else {
        displayMessage("Mật khẩu không hợp lệ. Vui lòng nhập mật khẩu đủ mạnh: ít nhất 8 ký tự, gồm chữ hoa, chữ thường, và ký tự đặc biệt.", "error");
      }
    } else {
      displayMessage("Tên đăng nhập không hợp lệ", "error");
    }
  }
}