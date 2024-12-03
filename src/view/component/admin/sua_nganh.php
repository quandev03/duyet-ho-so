<?php

$nganhRepo = new Repository('nganh_xet_tuyen');
$accRepo = new Repository('account');

if (isset($_GET['id'])) {
    $nganhId = $_GET['id'];
    // Lấy thông tin ngành cần sửa
    $nganh = $nganhRepo->findAll('*', ['id' => $nganhId])[0];
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
        if ($tenNganh != $nganh['tenNganhXetTuyen']) {
            $checkSQL = $nganhRepo->findAll('*', ['tenNganhXetTuyen' => $tenNganh])[0];
            if($checkSQL){
                echo "<script>alert('Tên ngành này đã tồn tại. Vui lòng chọn tên ngành khác.');</script>";
            }
        }else {
            $tenNganh = $nganh['tenNganhXetTuyen'];
        }
        $dataUpload = [
            'tenNganhXetTuyen' => $tenNganh,
            'khoiXetTuyen' => $khoi,
            'nguoiDuyet' => $nguoi_duyet,
            'dateStart' => $ngayBatDau,
            'dateEnd' => $ngayKetThuc
        ];
        $nganhRepo->updateOne($dataUpload, $nganhId);
        navigate('them_nganh.php');
    }
}


// Lấy danh sách giáo viên từ cơ sở dữ liệu
$teachers = $accRepo->findAll(['id', 'full_name'], ['roles' => 0]);

?>

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
            /* background-color: lightsteelblue; */
            width: 600px;
            height: 400px;

        }
        .container{
            margin: 0%;
            padding: 10% 5% ;
            width: 70%;
            height: 200px;
            border: none;
            border-radius: 10px;
            border: 1px solid #ddd;
        }
        .layout{
            display: flex;
            justify-content: center;
            align-items: center;
            width: 90%;
        }
        .dateGr {
            display: flex;
            width: 100%;
            justify-content: space-around;
        }
        .date {
            width: 45%;
        }
        #ngayBatDau, #ngayKetThuc {
            width: 100%;
        }
        .btnGr {
            display: flex;
            justify-content: space-around;
        }

    </style>
    <div class="layout">
        <form id="nganhForm" class="container" action="" method="POST">
            <label for="tenNganh">Tên Ngành:</label>
            <input type="text" id="tenNganh" name="tenNganh" value="<?php echo $nganh['tenNganhXetTuyen'];?>" required><br><br>

            <label>Chọn Khối:</label><br>
            <?php
        

            // Lấy khối đã chọn từ cơ sở dữ liệu
            $khoiSelected = explode(' ', $nganh['khoiXetTuyen']);

            foreach ($dsKhoiXetTuyen as $maKhoi => $monThi) {
                $checked = in_array($maKhoi, $khoiSelected) ? 'checked' : '';
                echo '<input type="checkbox" name="khoi[]" value="' . $maKhoi . '" ' . $checked . '> ' . $maKhoi . ' (' . implode(', ', $monThi) . ')<br>';
            }
            ?><br>

            <div class="dateGr">
            <div class="date">
            <label for="ngayBatDau">Ngày Bắt Đầu:</label><br>
            <input type="date" id="ngayBatDau" name="ngayBatDau" value="<?php echo $nganh['dateStart']; ?>" required><br><br>
            </div>
            <div class="date">
            <label for="ngayKetThuc">Ngày Kết Thúc:</label><br>
            <input type="date" id="ngayKetThuc" name="ngayKetThuc" value="<?php echo $nganh['dateEnd']; ?>" required><br><br>
            </div>
            </div>

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
            <div class="btnGr">
                <button type="submit" class="button">Lưu</button>
                <button type="button" class="button" onclick="window.location.href='them_nganh.php'">Đóng</button>
            </div>
        </form>
    </div>
</html>
