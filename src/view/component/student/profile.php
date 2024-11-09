<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 20px;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

h1 {
    text-align: center;
    color: #333;
}

.body_page_render {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Định dạng cho phần container */
.container {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
    justify-content: center;
    max-width: 800px;
}

/* Định dạng cho mỗi hồ sơ sinh viên */
.profile {
    display: flex;
    gap: 15px;
    padding: 15px;
    background-color: #fafafa;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    align-items: center;
    max-width: 100%;
    flex-direction: column;
    overflow-y: scroll;
}

/* Ảnh đại diện */
.avata img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
}

/* Thông tin sinh viên */
.info {
    text-align: center;
}

.info p {
    margin: 5px 0;
    color: #555;
}

.info .nganh {
    font-weight: bold;
    color: #007bff;
}

.hocba img {
    width: 100%;
    height: auto;
    border-radius: 4px;
    margin-top: 10px;
}

/* Media query cho màn hình nhỏ */
@media (max-width: 600px) {
    .profile {
        width: 90%;
    }

    .avata img {
        width: 80px;
        height: 80px;
    }
}

input {
    /* background-color: #007bff; */
    color: white;
    border: none;
    padding: 10px 15px;
    cursor: pointer;
    border-radius: 4px;
    margin-top: 10px;
}

input:hover {
    /* background-color: #0056b3; */
}

input:focus {
    outline: none;
}
</style>

<?php 
?>
<div>

<form class="body_page_render" method="post" enctype="multipart/form-data">
    <h1>Hồ sơ sinh viên <?php echo $username; ?></h1>
    <div class="container">
        <?php 
        ?>
    </div>
</form>

<?php
function renderProfile($avata, $tenDangKi, $khoiXetTuyen = [], $diemXetTuyen = [], $nganh, $anhHocBa) {
    // Hiển thị ảnh đại diện
    echo "<div class='avata'>";
    echo "<img src='" . htmlspecialchars($avata) . "' alt='Ảnh đại diện' />";
    echo "<label for='avata-file'>Sửa ảnh đại diện</label>";
    echo "<input type='file' id='avata-file' name='avata-file' />";
    echo "</div>";   

    // Hiển thị thông tin sinh viên
    echo "<div class='info'>";
    echo "<p><strong>Tên đăng kí:</strong> " . htmlspecialchars($tenDangKi) . "</p>";
    echo "<p><strong>Khối xét tuyển:</strong> " . htmlspecialchars(implode(", ", $khoiXetTuyen)) . "</p>";
    echo "<p><strong>Điểm xét tuyển:</strong> " . htmlspecialchars(implode(", ", $diemXetTuyen)) . "</p>";
    echo "<p class='nganh'><strong>Ngành xét tuyển:</strong> " . htmlspecialchars($nganh) . "</p>";
    echo "</div>";

    // Hiển thị ảnh học bạ
    echo "<div class='hocba'>";
    echo "<img src='" . htmlspecialchars($anhHocBa) . "' alt='Ảnh học bạ' />";
    echo "<label for='hocba-file'>Cập nhật ảnh học bạ</label>";
    echo "<input type='file' id='hocba-file' name='hocba-file' />";
    echo "</div>";

    // Xử lý tải ảnh đại diện
    handleFileUpload('avata-file', '../storage/file_upload/', 'Ảnh đại diện');

    // Xử lý tải ảnh học bạ
    handleFileUpload('hocba-file', '../storage/file_upload/', 'Ảnh học bạ');
}

function handleFileUpload($fileInputName, $targetDir, $fileType) {
    if (isset($_FILES[$fileInputName]) && $_FILES[$fileInputName]['error'] == 0) {
        $file = $_FILES[$fileInputName];
        $targetFile = $targetDir . basename($file['name']);

        // Kiểm tra loại tệp
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($file['type'], $allowedTypes)) {
            echo "<div class='alert_error'>Lỗi: Chỉ chấp nhận tệp hình ảnh.</div>";
            return;
        }

        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            echo "<div class='alert_success'>Cập nhật $fileType thành công!</div>";
        } else {
            echo "<div class='alert_error'>Lỗi tải $fileType.</div>";
        }
    }
}
?>
<!-- lưu tên tên của file đã up lên csdl -->