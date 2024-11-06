<style>

  .container {
  display: flex;
  flex-direction: column;
  margin-left: 20%;
  width: 70%;
  margin-top: 6%;
}

.nganh {
  width: 80%;
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

.hoSoDangKy {
  text-align: center;
}

.nopNgay {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 10px;
}

.nopNgay button {
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

.nopNgay button:hover {
  background-color: #45a049;
}

.body_page_render {
  position: absolute;
  overflow-y: auto; /* Cho phép cuộn nếu nội dung vượt quá chiều cao */
  background-color: #f9f9f9; /* Thêm màu nền cho dễ nhìn */
}

</style>
<form class="body_page_render" method="post">
    <h1>Các ngành xét tuyển theo phương thức học bạ</h1>
    <div class="container">
        <?php 
        renderNganhXetTuyen("Công nghệ thông tin", "25/1/2024", "25/2/2024", 'Nộp Ngay');
        renderNganhXetTuyen("Khoa học dữ liệu", "20/1/2024", "20/2/2024", 'Nộp Ngay');
        renderNganhXetTuyen("Kỹ thuật phần mềm", "30/1/2024", "30/2/2024", 'Nộp Ngay');
        renderNganhXetTuyen("Kỹ thuật phần mềm", "30/1/2024", "30/2/2024", 'Nộp Ngay');
        renderNganhXetTuyen("Kỹ thuật phần mềm", "30/1/2024", "30/2/2024", 'Nộp Ngay');
        renderNganhXetTuyen("Kỹ thuật phần mềm", "30/1/2024", "30/2/2024", 'Nộp Ngay');
        renderNganhXetTuyen("Kỹ thuật phần mềm", "30/1/2024", "30/2/2024", 'Nộp Ngay');

        ?>
    </div>
</form>
<?php
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
    echo "<button class='text_render'>$nopNgay</button>"; 
    echo "</div>";
    echo   "</div>";  
    echo "</div>"; 
}
?>