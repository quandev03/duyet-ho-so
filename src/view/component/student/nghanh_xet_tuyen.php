<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Các Ngành Xét Tuyển</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 80%;
            margin: 0px;
            margin-top: 6%;
        }

        .nganh {
            width: 100%;
            padding: 10px;
            border-radius: 20px;
            background-color: #EBF5EE;
            margin-top: 10px;
        }

        .infoNghanXetTuyen {
            display: flex;
            justify-content: space-around;
            align-items: center;
            width: 100%;
        }

        .dateStart, .dateEnd {
            display: flex;
            flex-direction: column;
            justify-content: right;
            align-items: center;
            width: 30%;
            height: 40%;
        }

        .text_render {
            margin: 4px;
        }

        .body_page_render {
            display: flex;
            flex-direction: column;
            align-items: center;
            overflow-y: scroll;
            height: 100%;
        }

        .nopNgay {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }

        .nopNgay .btn {
            padding: 10px 20px;
            border: none;
            width: 120px;
            height: 50px;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            font-size: 16px;
        }

        .nopNgay .btn:hover {
            background-color: #45a049;
        }

        .body_page_render {
            width: 75%;
            height: 720px;
            overflow-y: auto;
            background-color: #f9f9f9; 
        }

    </style>
</head>
<body>
    <form class="body_page_render" method="post">
        <h1>Các ngành xét tuyển theo phương thức học bạ</h1>
        <div class="container">
            <?php
            $servername = "localhost";
            $username = "root"; 
            $password = "";
            $dbname = "duyet_ho_so";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Kết nối thất bại: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM nganh_xet_tuyen";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    renderNganhXetTuyen($row['tenNganhXetTuyen'], $row['dateStart'], $row['dateEnd'], "Nộp hồ sơ");
                }
            } else {
                echo "Không có ngành xét tuyển nào.";
            }

            // Đóng kết nối
            $conn->close();

            function renderNganhXetTuyen($tenNganh, $dateStart, $dateEnd, $nopNgay) {
                echo "<div class='nganh'>";
                echo "<h2 class='text_render'>$tenNganh</h2>"; 
                echo "<div class='infoNghanXetTuyen'>";

                echo "<div class='dateStart'>";
                echo "<h5 class='text_render'>Ngày bắt đầu</h5>";
                echo "<p class='text_render'>$dateStart</p>"; 
                echo "</div>";

                echo "<div class='dateEnd'>";
                echo "<h5 class='text_render'>Ngày kết thúc</h5>";
                echo "<p class='text_render'>$dateEnd</p>"; 
                echo "</div>";

                echo "<div class='nopNgay'>";
                echo "<button class='text_render btn' >$nopNgay</button>"; 
                echo "</div>";
                echo "</div>";  
                echo "</div>"; 
            }
            ?>
        </div>
    </form>
</body>
</html>
