<?php
require "../../config.php";
// $servername = ;
$username = $USERNAME_BD;
$password = $PASSWORD_BD;
$dbname = $DATABASE_BD;

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Xử lý form khi người dùng nhấn nút Lưu
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
        // kiểm tra tên nganh có tồn tại chưa

        $checkSQL = "SELECT COUNT(*) AS count FROM nganh_xet_tuyen WHERE tenNganhXetTuyen = '$tenNganh'";
        $result = $conn->query($checkSQL);
        $row = $result->fetch_assoc();

        if ($row['count'] > 0) {
            echo "<script>alert('Tên ngành này đã tồn tại. Vui lòng chọn tên ngành khác.');</script>";

        } else {
            // Thêm ngành vào bảng nganh_xet_tuyen
            $sql = "INSERT INTO nganh_xet_tuyen (tenNganhXetTuyen, khoiXetTuyen, nguoiDuyet, dateStart, dateEnd) 
                    VALUES ('$tenNganh', '$khoi', '$nguoi_duyet', '$ngayBatDau', '$ngayKetThuc')";
            if ($conn->query($sql) === TRUE) {
                $nganhId = $conn->insert_id;

                // Thêm giáo viên duyệt vào bảng giao_vien_duyet
                if (!empty($giaoVienDuyet)) {
                    foreach ($giaoVienDuyet as $giaoVienId) {
                        $sqlGV = "INSERT INTO giao_vien_duyet (nganhId, giaoVienId) 
                                VALUES ($nganhId, $giaoVienId)";
                        $conn->query($sqlGV);
                    }
                }

                echo "<script>alert('Ngành đã được thêm thành công!');</script>";
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
    <title>Thêm Ngành Xét Tuyển</title>
    <style>
         h2 {
            text-align: center;
            margin-top: 30px;
            font-size: 40px;
        }

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

        dialog {
            width: 700px;
            height: 75%;
            padding: 10px;
            border-radius: 10px;
            background-color: #ffffff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
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

        .themNganh {
            height: 100px;
            margin-right: -200px;
           
        }

        .container {
            width: 90%;
            max-width: 1200px;
            text-align: center;
            padding: 20px;
            margin-top: -750px;
            position: absolute;
        }
        .groupBtn {
            display: flex;
            
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Quản lý ngành xét tuyển</h2>
        <button class="button themNganh" onclick="openDialog()">Thêm Ngành Xét Tuyển</button>
    </div>
    <dialog id="dialog">
        <form id="nganhForm" action="" method="POST">
            <label for="tenNganh">Tên Ngành:</label>
            <input type="text" id="tenNganh" name="tenNganh" required><br><br>

            <label>Chọn Khối:</label><br>
            <?php
            // Danh sách các khối xét tuyển
            $dsKhoiXetTuyen = [
                "A00" => ["Toán", "Lý", "Hoá"],
                "A01" => ["Toán", "Lý", "Anh"],
                "B00" => ["Toán", "Hoá", "Sinh"],
                "C00" => ["Văn", "Sử", "Địa"],
                "D01" => ["Toán", "Văn", "Anh"]
            ];
            foreach ($dsKhoiXetTuyen as $maKhoi => $monThi) {
                echo '<input type="checkbox" name="khoi[]" value="' . $maKhoi . '"> ' . $maKhoi . ' (' . implode(', ', $monThi) . ')<br>';
            }
            ?><br>

            <label for="ngayBatDau">Ngày Bắt Đầu:</label>
            <input type="date" id="ngayBatDau" name="ngayBatDau" required><br><br>

            <label for="ngayKetThuc">Ngày Kết Thúc:</label>
            <input type="date" id="ngayKetThuc" name="ngayKetThuc" required><br><br>

            <label>Giáo Viên Duyệt:</label><br>
            <?php
            if (!empty($teachers)) {
                foreach ($teachers as $teacher) {
                    echo '<input type="checkbox" name="giaoVienDuyet[]" value="' . $teacher['id'] . '"> ' . $teacher['full_name'] . '<br>';
                }
            } else {
                echo "Không có giáo viên nào.";
            }
            ?><br>

            <div class="groupBtn">
            <button class="button" type="submit">Lưu</button>
            <button class="button" type="button" onclick="closeDialog()">Đóng</button>
            </div>
        </form>
    </dialog>

    <script>
        function openDialog() {
            const dialog = document.getElementById("dialog");
            if (typeof dialog.showModal === "function") {
                dialog.showModal();
            } else {
                alert("Trình duyệt của bạn không hỗ trợ dialog, vui lòng cập nhật trình duyệt.");
            }
        }

        function closeDialog() {
            const dialog = document.getElementById("dialog");
            if (typeof dialog.close === "function") {
                dialog.close();
            }
        }

        // Kiểm tra ngoại lệ ngày
        document.getElementById("nganhForm").addEventListener("submit", function (e) {
            const ngayBatDau = new Date(document.getElementById("ngayBatDau").value);
            const ngayKetThuc = new Date(document.getElementById("ngayKetThuc").value);

            if (ngayBatDau >= ngayKetThuc) {
                e.preventDefault();
                alert("Ngày bắt đầu phải nhỏ hơn ngày kết thúc.");
            }
        });
    </script>
</body>

</html>