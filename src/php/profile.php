<?php
function renderProfile($avata, $tenDangKi, $khoiXetTuyen = [], $diemXetTuyen = [], $anhHocBa) {
    echo "<div class='profile'>";
    echo "<div class='avata'>";
    echo "<img src='" . $avata . "' alt='Ảnh đại diện' />";
    echo "</div>";   
    echo "<p>Tên đăng kí: " . $tenDangKi . "</p>";
    
    $khoi = implode(", ", $khoiXetTuyen);
    echo "<p>Khối xét tuyển: " . $khoi . "</p>";
    
    $diem = implode(", ", $diemXetTuyen);
    echo "<p>Điểm xét tuyển: " . $diem . "</p>";
    
    echo "<div class='hocba'>";
    echo "<img src='" . $anhHocBa . "' alt='Ảnh học bạ' />";
    echo "</div>";
    echo "</div>"; 
}
?>
