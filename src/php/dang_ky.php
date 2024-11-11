<?php 

if (isset($_POST["dangKy"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $fullname = $_POST["fullname"];
  $repassword = $_POST['repassword'];
  $role = $_POST["role"];

  if (validateUsername($username)) {
    if(validatePassword($password)) {
      if ($password === $repassword) {
          $mysqli = new Repository( "account");
          
          $dataInsert = [
            "username"=> "".$username."",
            "password"=> "".md5($password)."",
            "full_name"=> "".$fullname."",
            "roles"=> $role
          ];
          $checkExist =  $mysqli->findAll("*", ["username" => $username]);
          if (count($checkExist) > 0) {
            displayMessage("Tên đăng nhập đã tồn tại", "error");
          }else {
          $mysqli->insertOne($dataInsert);
          displayMessage("Đăng ký thành công", "success");
          }
        }
      }else {
        displayMessage("Mật khẩu không trùng khớp", "error");
      }
    }else {
      displayMessage("Mật khẩu không hợp lệ", "error");
    }
  }else {
    displayMessage("Tên đăng nhập không hợp lệ", "error");
  }

