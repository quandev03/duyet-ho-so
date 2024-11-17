<?php
// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "duyet_ho_so";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Truy vấn để lấy thông tin ngành xét tuyển
$sql = "SELECT * FROM nganh_xet_tuyen ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

// Kiểm tra nếu có ngành vừa được thêm
if ($result->num_rows > 0) {
    // Lấy thông tin ngành vừa thêm
    $row = $result->fetch_assoc();
    echo "<h3>Thông tin ngành vừa thêm:</h3>";
    echo "Tên Ngành: " . $row['tenNganhXetTuyen'] . "<br>";
    echo "Khối: " . $row['khoiXetTuyen'] . "<br>";
    echo "Ngày Bắt Đầu: " . $row['dateStart'] . "<br>";
    echo "Ngày Kết Thúc: " . $row['dateEnd'] . "<br><br>";

    // Lấy thông tin giáo viên duyệt (nếu có)
    $nganhId = $row['id'];
    $sqlGV = "SELECT a.full_name FROM account a 
              JOIN giao_vien_duyet g ON a.id = g.giaoVienId 
              WHERE g.nganhId = $nganhId";
    $resultGV = $conn->query($sqlGV);

    if ($resultGV->num_rows > 0) {
        echo "Giáo viên duyệt: ";
        while ($rowGV = $resultGV->fetch_assoc()) {
            echo $rowGV['full_name'] . " ";
        }
    } else {
        echo "Không có giáo viên duyệt.";
    }
} else {
    echo "Chưa có ngành nào được thêm.";
}

// Đóng kết nối
$conn->close();
?>
