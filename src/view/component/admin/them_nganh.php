<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 20px;
        min-height: 100vh;
        margin-top: 6%;

    }

    .form-container {
        padding: 20px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 800px;
        margin-left: 35%;
        margin-top: -40%;
        /* margin: auto; */
    }

    .export-btn {
        background-color: #0B3051;
        color: white;
        border: none;
        padding: 8px 12px;
        margin-left: 8px;
        border-radius: 5px;
        cursor: pointer;

    }

    .nganh-form {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group label {
        margin-bottom: 5px;
        color: #0B3051;
        font-weight: bold;
    }

    .form-group input,
    .form-group select {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .form-actions {
        grid-column: span 2;
        display: flex;
        gap: 10px;
        width: 50%;
    }

    .create-btn {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 8px 20px;
        border-radius: 20px;
        cursor: pointer;
    }

    .cancel-btn {
        background-color: #e0e0e0;
        color: #333;
        border: none;
        padding: 8px 20px;
        border-radius: 20px;
        cursor: pointer;
    }
</style>
</head>
<div>
    <?php
    // Define sample values for the parameters
    $chuyenNghanh = ["IT", "Math", "Physics"];
    $khoi = ["A", "B", "C"];
    $giaoVien = "Nguyen Van A";
    $startDate = "2024-01-01";
    $endDate = "2024-12-31";

    // Render the form
    rederThemNghanh($chuyenNghanh, $khoi, $giaoVien, $startDate, $endDate);
    ?>

</div>

</html>

<?php
function rederThemNghanh($chuyenNghanh, $khoi, $giaoVien, $startDate, $endDate)
{
    echo "
    <div class='form-container'>
        <div class='header'>
            <button class='export-btn'>Thêm nghành mới</button>
        </div>
        <form class='nganh-form'>
            <div class='form-group'>
                <label for='chuyenNghanh'>Chuyên ngành</label>
                <select id='chuyenNghanh' name='chuyenNghanh'>
                    <option value=''>Chọn chuyên ngành</option>";
    foreach ($chuyenNghanh as $option) {
        echo "<option value='$option'>$option</option>";
    }
    echo "
                </select>
            </div>
            <div class='form-group'>
                <label for='khoi'>Khối</label>
                <select id='khoi' name='khoi'>
                    <option value=''>Chọn khối</option>";
    foreach ($khoi as $option) {
        echo "<option value='$option'>$option</option>";
    }
    echo "
                </select>
            </div>
            <div class='form-group'>
                <label for='giaoVien'>Giáo viên</label>
                <input type='text' id='giaoVien' name='giaoVien' placeholder='Nhập tên giáo viên' value='$giaoVien'>
            </div>
            <div class='form-group'>
                <label for='startDate'>Start Date</label>
                <input type='date' id='startDate' name='startDate' value='$startDate'>
            </div>
            <div class='form-group'>
                <label for='endDate'>End Date</label>
                <input type='date' id='endDate' name='endDate' value='$endDate'>
            </div>
            <div class='form-actions'>
                <button type='submit' class='create-btn'>Tạo</button>
                <button type='button' class='cancel-btn'>Hủy</button>
            </div>
        </form>
    </div>
    ";
}
?>