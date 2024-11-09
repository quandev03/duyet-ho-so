<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Cá Nhân</title>
    <style>
        /* Reset some default styles */


        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
            padding: 20px;
            flex-direction: column;
        }

        .container {
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            width: 900px;
        }

        .title {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .profile-info {
            margin-bottom: 30px;
        }

        .profile-info p {
            font-size: 16px;
            margin: 10px 0;
        }

        .avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-top: 10px;
            border: 2px solid #ccc;
        }

        .upload-section {
            margin-top: 30px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }

        .upload-section h2 {
            font-size: 20px;
            color: #555;
            margin-bottom: 10px;
        }

        .upload-input {
            display: block;
            margin-bottom: 10px;
            padding: 10px;
            width: 100%;
            border-radius: 4px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }

        .upload-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .upload-button:hover {
            background-color: #45a049;
        }

        .upload-section p {
            font-size: 14px;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php if (isset($_SESSION['userId'])): ?>
            <h1 class="title">Thông Tin Cá Nhân</h1>
            <?php
            // Lấy thông tin người dùng
            $user = layThongTinProfile($_SESSION['userId']);

            // Lấy thông tin điểm của học sinh
            $diem = layDiemHS($_SESSION['userId']);

            if ($user && $diem): ?> <!-- Kiểm tra nếu cả user và điểm đều có dữ liệu -->

                <div class="profile-info">
                    <p><strong>Họ và tên:</strong> <?php echo htmlspecialchars($user['full_name']); ?></p>
                    <p><strong>Ngành xét tuyển:</strong>
                        <?php //echo htmlspecialchars(layTenChuyenNganh($user['nganhXetTuyen'])); ?></p>
                    <p><strong>Điểm môn 1:</strong> <?php //echo htmlspecialchars($diem['diemMon1']); ?></p>
                    <p><strong>Điểm môn 2:</strong> <?php //echo htmlspecialchars($diem['diemMon2']); ?></p>
                    <p><strong>Điểm môn 3:</strong> <?php //echo htmlspecialchars($diem['diemMon3']); ?></p>
                    <p><strong>Khối xét tuyển:</strong> <?php //echo htmlspecialchars($diem['khoiXetTuyen']); ?></p>

                    <?php if ($user['avatar']): ?>
                        <img src="uploads/<?php echo htmlspecialchars($user['avatar']); ?>" alt="Avatar" class="avatar">
                    <?php else: ?>
                        <p>Chưa có ảnh đại diện</p>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <p>Thông tin người dùng hoặc điểm không có sẵn.</p>
            <?php endif; ?>
            <div class="upload-section">
                <h2>Upload Avatar</h2>
                <form action="profile.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="avatar" required class="upload-input">
                    <button type="submit" name="upload_avatar" class="upload-button">Tải lên Avatar</button>
                </form>
            </div>
            <div class="upload-section">
                <h2>Upload Học Bạ</h2>
                <form action="profile.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="hocba" required class="upload-input">
                    <button type="submit" name="upload_hocba" class="upload-button">Tải lên Học Bạ</button>
                </form>
            </div>

        <?php else: ?>
            <p>Vui lòng đăng nhập để xem thông tin cá nhân.</p>
        <?php endif; ?>
    </div>

</body>

</html>