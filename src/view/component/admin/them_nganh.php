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

if (isset($_POST['action'])) {
    $id = $_POST['action'];
    header("Location: ./sua_nganh.php?id=$id");
}

// Xử lý form khi người dùng nhấn nút Lưu
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tenNganh = ucwords(strtolower(trim($_POST['tenNganh'])));
    $khoi = isset($_POST['khoi']) ? implode(' ', $_POST['khoi']) : '';
    $ngayBatDau = $_POST['ngayBatDau'];
    $ngayKetThuc = $_POST['ngayKetThuc'];
    $giaoVienDuyet = isset($_POST['giaoVienDuyet']) ? $_POST['giaoVienDuyet'] : [];
    $nguoi_duyet = "_" . implode("_", $giaoVienDuyet) . "_";

}
else {
        // Kiểm tra tên ngành đã tồn tại
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
            width: 40%;
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
            height: 10%;
            position: absolute;
            right: 10px;
            width: 15%;
        }


        .groupBtn {
            display: flex;

        }
    </style>
</head>

    <button class="button themNganh" onclick="openDialog()">Thêm Ngành Xét Tuyển</button>
    <dialog id="dialog">
        <form id="nganhForm" action="" method="POST">
            <label for="tenNganh">Tên Ngành:</label>
            <input type="text" id="tenNganh" name="tenNganh" required><br><br>

            <label>Chọn Khối:</label><br>
            <?php
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
        document.getElementById("nganhForm").addEventListener("submit", function (e) {
            const tenNganh = document.getElementById("tenNganh").value.trim();
            const ngayBatDau = new Date(document.getElementById("ngayBatDau").value);
            const ngayKetThuc = new Date(document.getElementById("ngayKetThuc").value);
            const khoiCheckboxes = document.querySelectorAll("input[name='khoi[]']:checked");
            const giaoVienCheckboxes = document.querySelectorAll("input[name='giaoVienDuyet[]']:checked");

            let errorMessage = "";
            if (!tenNganh) {
                errorMessage += "Vui lòng nhập tên ngành.\n";
            }
            if (!ngayBatDau || !ngayKetThuc) {
                errorMessage += "Vui lòng chọn đầy đủ ngày bắt đầu và ngày kết thúc.\n";
            } else if (ngayBatDau >= ngayKetThuc) {
                errorMessage += "Ngày bắt đầu phải nhỏ hơn ngày kết thúc.\n";
            }
            if (khoiCheckboxes.length === 0) {
                errorMessage += "Vui lòng chọn ít nhất một khối xét tuyển.\n";
            }
            if (giaoVienCheckboxes.length === 0) {
                errorMessage += "Vui lòng chọn ít nhất một giáo viên duyệt.\n";
            }
            if (errorMessage) {
                e.preventDefault();
                alert(errorMessage);
            }
        });

    </script>

</html>