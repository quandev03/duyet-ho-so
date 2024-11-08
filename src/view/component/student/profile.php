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
// Khai báo biến $username nếu cần thiết
$username = "Nguyễn Văn A";
?>
<div>
</div>
<form class="body_page_render" method="post">
    <h1>Hồ sơ sinh viên <?php echo $username; ?></h1>
    <div class="container">
        <?php 
        renderProfile("../storage/file_upload/avata.png", "Nguyễn Văn A", ["A01", "B00"], [8.0, 7.5, 9.0], "Công nghệ thông tin", "../storage/file_upload/anhHB.jpg");
        ?>
    </div>
</form>

<?php
function renderProfile($avata, $tenDangKi, $khoiXetTuyen = [], $diemXetTuyen = [], $nganh, $anhHocBa) {
    // Ảnh đại diện
    echo "<div class='avata'>";
    echo "<img src='" . htmlspecialchars($avata) . "' alt='Ảnh đại diện' />";
    echo "<label for='avata-file'>Sửa ảnh đại diện</label>";
    echo "<input type='file' id='avata-file' name='avata-file' />";
    echo "</div>";   
    
    // Thông tin sinh viên
    echo "<div class='info'>";
    echo "<p><strong>Tên đăng kí:</strong> " . htmlspecialchars($tenDangKi) . "</p>";
    
    $khoi = implode(", ", $khoiXetTuyen);
    echo "<p><strong>Khối xét tuyển:</strong> " . htmlspecialchars($khoi) . "</p>";
    
    $diem = implode(", ", $diemXetTuyen);
    echo "<p><strong>Điểm xét tuyển:</strong> " . htmlspecialchars($diem) . "</p>";
    
    echo "<p class='nganh'><strong>Ngành xét tuyển:</strong> " . htmlspecialchars($nganh) . "</p>";
    echo "</div>";

    // Ảnh học bạ
    echo "<div class='hocba'>";
    echo "<img src='" . htmlspecialchars($anhHocBa) . "' alt='Ảnh học bạ' />";
    echo "<label for='hocba-file'>Cập nhật ảnh học bạ</label>";
    echo "<input type='file' id='hocba-file' name='hocba-file' />";
    echo "</div>";
}
?>
