<?php
$servername = $HOST;
$username = $USERNAME_BD;
$password = $PASSWORD_BD;
$dbname = $DATABASE_BD;

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $nganhId = $_GET['id'];
    
    // Lấy thông tin ngành cần sửa
    $sql = "SELECT * FROM nganh_xet_tuyen WHERE id = $nganhId";
    $result = $conn->query($sql);
    $nganh = $result->fetch_assoc();
    
    // Nếu không tìm thấy ngành
    if (!$nganh) {
        echo "Ngành không tồn tại!";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tenNganh = $_POST['tenNganh'];
    $khoi = isset($_POST['khoi']) ? implode(' ', $_POST['khoi']) : '';
    $ngayBatDau = $_POST['ngayBatDau'];
    $ngayKetThuc = $_POST['ngayKetThuc'];
    $giaoVienDuyet = isset($_POST['giaoVienDuyet']) ? $_POST['giaoVienDuyet'] : [];
    $nguoi_duyet = "_" . implode("_", $giaoVienDuyet) . "_";

    if (strtotime($ngayBatDau) >= strtotime($ngayKetThuc)) {
        echo "<script>alert('Ngày bắt đầu phải nhỏ hơn ngày kết thúc.');</script>";
    } else {
        // Kiểm tra tên ngành có tồn tại chưa
        $checkSQL = "SELECT COUNT(*) AS count FROM nganh_xet_tuyen WHERE tenNganhXetTuyen = '$tenNganh' AND id != $nganhId";
        $result = $conn->query($checkSQL);
        $row = $result->fetch_assoc();

        if ($row['count'] > 0) {
            echo "<script>alert('Tên ngành này đã tồn tại. Vui lòng chọn tên ngành khác.');</script>";
        } else {
            // Cập nhật ngành vào bảng nganh_xet_tuyen
            $sql = "UPDATE nganh_xet_tuyen SET tenNganhXetTuyen = '$tenNganh', khoiXetTuyen = '$khoi', nguoiDuyet = '$nguoi_duyet', dateStart = '$ngayBatDau', dateEnd = '$ngayKetThuc' WHERE id = $nganhId";
            if ($conn->query($sql) === TRUE) {
                // Xóa các giáo viên duyệt cũ và thêm lại giáo viên duyệt mới
                $conn->query("DELETE FROM giao_vien_duyet WHERE nganhId = $nganhId");
                if (!empty($giaoVienDuyet)) {
                    foreach ($giaoVienDuyet as $giaoVienId) {
                        $sqlGV = "INSERT INTO giao_vien_duyet (nganhId, giaoVienId) VALUES ($nganhId, $giaoVienId)";
                        $conn->query($sqlGV);
                    }
                }
                echo "<script>alert('Ngành đã được sửa thành công!'); window.location.href = 'them_nganh.php';</script>";
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}

// Lấy danh sách giáo viên từ cơ sở dữ liệu
$sql = "SELECT id, full_name FROM account WHERE roles = 0";
$result = $conn->query($sql);

$teachers = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $teachers[] = $row;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Sửa Ngành Xét Tuyển</title>
    <style>

        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            display: block;
            margin: 0 auto;
            margin-top: 20px;
        }

        .button:hover {
            background-color: #45a049;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"] {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        input[type="checkbox"] {
            margin-right: 10px;
        }

        .button[type="submit"],
        button[type="button"] {
            padding: 10px 20px;
            border: none;
            width: 120px;
            height: 40px;
            border-radius: 5px;
            margin-top: 20px;
            cursor: pointer;
            font-size: 16px;
        }

        .button[type="submit"] {
            background-color: #4CAF50;
            color: white;
        }

        .button[type="submit"]:hover {
            background-color: #45a049;
        }

        .button[type="button"] {
            background-color: #f44336;
            color: white;
        }

        .button[type="button"]:hover {
            background-color: #e53935;
        }
        #nganhForm{
            /* text-align: center; */
            margin-top: 5%;
            /* font-size: 40px; */
            border: 1px solid  black;
            width: 600px;
            height: 600px;

        }
        .container{
            margin-left: 40%;
            margin-top: -50%;
        }

    </style>
</head>

<body>
    <div class="container">
        <form id="nganhForm" action="" method="POST">
            <label for="tenNganh">Tên Ngành:</label>
            <input type="text" id="tenNganh" name="tenNganh" value="<?php echo $nganh['tenNganhXetTuyen']; ?>" required><br><br>

            <label>Chọn Khối:</label><br>
            <?php
            $dsKhoiXetTuyen = [
                "A00" => ["Toán", "Lý", "Hoá"],
                "A01" => ["Toán", "Lý", "Anh"],
                "B00" => ["Toán", "Hoá", "Sinh"],
                "C00" => ["Văn", "Sử", "Địa"],
                "D01" => ["Toán", "Văn", "Anh"]
            ];

            // Lấy khối đã chọn từ cơ sở dữ liệu
            $khoiSelected = explode(' ', $nganh['khoiXetTuyen']);

            foreach ($dsKhoiXetTuyen as $maKhoi => $monThi) {
                $checked = in_array($maKhoi, $khoiSelected) ? 'checked' : '';
                echo '<input type="checkbox" name="khoi[]" value="' . $maKhoi . '" ' . $checked . '> ' . $maKhoi . ' (' . implode(', ', $monThi) . ')<br>';
            }
            ?><br>

            <label for="ngayBatDau">Ngày Bắt Đầu:</label>
            <input type="date" id="ngayBatDau" name="ngayBatDau" value="<?php echo $nganh['dateStart']; ?>" required><br><br>

            <label for="ngayKetThuc">Ngày Kết Thúc:</label>
            <input type="date" id="ngayKetThuc" name="ngayKetThuc" value="<?php echo $nganh['dateEnd']; ?>" required><br><br>

            <label>Giáo Viên Duyệt:</label><br>
            <?php
            if (!empty($teachers)) {
                $giaoVienDuyet = explode('_', $nganh['nguoiDuyet']);
                foreach ($teachers as $teacher) {
                    $checked = in_array($teacher['id'], $giaoVienDuyet) ? 'checked' : '';
                    echo '<input type="checkbox" name="giaoVienDuyet[]" value="' . $teacher['id'] . '" ' . $checked . '> ' . $teacher['full_name'] . '<br>';
                }
            }
            ?><br>

            <button type="submit" class="button">Lưu</button>
            <button type="button" class="button" onclick="window.location.href='them_nganh.php'">Đóng</button>
        </form>
    </div>
</body>

</html>
