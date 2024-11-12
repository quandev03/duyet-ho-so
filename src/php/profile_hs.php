<?php
if (isset($_POST['upload_avatar'])) {
    $avatar = $_FILES['avatar'];
    $allowedAvatarTypes = ['image/jpeg', 'image/png', 'image/jpg'];

    if ($avatar['error'] == 0 && checkFileType($avatar, $allowedAvatarTypes)) {
        $avatarName = uploadFile($avatar, './src/storage/image_system/');  // Save in the image_system folder
        if ($avatarName) {
            $sql = "UPDATE account SET avatar = ? WHERE id = ?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("si", $avatarName, $_SESSION['userId']);
            echo $stmt->execute() ? "<p>Avatar đã được cập nhật thành công!</p>" : "<p>Không thể cập nhật avatar, vui lòng thử lại.</p>";
        } else {
            echo "<p>Không thể upload avatar. Vui lòng thử lại.</p>";
        }
    } else {
        echo "<p>Chỉ chấp nhận các tệp hình ảnh (.jpg, .jpeg, .png) cho avatar.</p>";
    }
}

// Handle học bạ upload
if (isset($_POST['upload_hocba'])) {
    $hocba = $_FILES['hocba'];
    $allowedHocbaTypes = ['application/pdf', 'image/jpeg', 'image/png'];

    if ($hocba['error'] == 0 && checkFileType($hocba, $allowedHocbaTypes)) {
        $hocbaName = uploadFile($hocba, './src/storage/file_upload/');  // Save in the image_system folder
        echo $hocbaName ? "<p>Học bạ đã được upload thành công!</p>" : "<p>Không thể upload học bạ. Vui lòng thử lại.</p>";
    } else {
        echo "<p>Chỉ chấp nhận các tệp PDF hoặc hình ảnh (.jpg, .jpeg, .png) cho học bạ.</p>";
    }
}
