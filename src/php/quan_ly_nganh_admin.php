<!--  khi giáo viên đăng kí thì lưu vào check box luôn
  hiển thị dilog -->
  <?php
// Kiểm tra nếu form được submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $chuyenNganh = $_POST['chuyenNganh'] ?? '';
    $khoi = $_POST['khoi'] ?? '';
    $startDate = $_POST['startDate'] ?? '';
    $endDate = $_POST['endDate'] ?? '';
    $teachers = $_POST['teachers'] ?? [];
z
    // Kiểm tra dữ liệu đã lấy
    echo "<h2>Thông tin ngành hồ sơ xét tuyển</h2>";
    echo "<p>Chuyên ngành: " . htmlspecialchars($chuyenNganh) . "</p>";
    echo "<p>Khối: " . htmlspecialchars($khoi) . "</p>";
    echo "<p>Start Date: " . htmlspecialchars($startDate) . "</p>";
    echo "<p>End Date: " . htmlspecialchars($endDate) . "</p>";

    echo "<h3>Danh sách giáo viên:</h3>";
    if (!empty($teachers)) {
        echo "<ul>";
        foreach ($teachers as $teacher) {
            echo "<li>" . htmlspecialchars($teacher) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Không có giáo viên nào được chọn.</p>";
    }
}
?>
