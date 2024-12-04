<?php
session_start();
// if (isset($_POST["btn_dang_nhap"])) {
//     $_SESSION['username'] = 'admin';
//     $_SESSION['roles'] = -1;
//     $_SESSION['idUser'] = 1;
 
// }
// Kiểm tra nếu người dùng đã gửi form đăng nhập
if (isset($_POST["btn_dang_nhap"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $mysqli = new Repository("account");

    $username = trim($username);
    $user = $mysqli->findAll("*", ["username" => $username]);
    // print_r($user);

    if (count($user) > 0) {
        $userData = $user[0];

        if (md5($password) === $userData['password']) {
            $_SESSION['userId'] = $userData['id'];
            $_SESSION['username'] = $username;
            $_SESSION['roles'] = $userData['roles'];
            $_SESSION['fullname'] = $userData['full_name'];
            displayMessage("Mật khẩu trùng khớp", "success");
            header("Location: ../..");
            exit();
            


        } else {
            displayMessage("Mật khẩu không đúng", "error");
        }
    } else {
        displayMessage("Tên người dùng không tồn tại", "error");
    }
}



