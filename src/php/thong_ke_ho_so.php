<?php
function renderThongKeHoSo ($tenNganh, $tongSoHoSo, $daDuyet, $chuaDuyen, $tuChoi, $dateStart, $dateEnd) {

  echo   "<div class='nganh'>";
  echo   "<h2 class='text_render'>$tenNganh</h2>";
  echo   "<h4 class='text_render'>Tổng số hồ sơ: $tongSoHoSo</h4>";
  echo   "<div class='infoHoSo'>";
  echo   "  <div class='thongKe'>";
  echo   "    <div class='hoSoDangKy'>";
  echo   "      <h5 class='text_render'><font color='orange'>Chưa Duyệt</font></h5>";
  echo   "      <p class='text_render'>$chuaDuyen</p>";
  echo   "    </div>";
  echo   "    <div class='hoSoDangKy'>";
  echo   "      <h5 class='text_render'><font color='4BA665'>Đã Duyệt</font></h5>";
  echo   "      <p class='text_render'>$daDuyet</p>";
  echo   "    </div>";
  echo   "    <div class='hoSoDangKy'>";
  echo   "      <h5 class='text_render'><font color='red'>Từ Chối</font></h5>";
  echo   "      <p class='text_render'>$tuChoi</p>";
  echo   "    </div>";
  echo   "  </div>";
  echo   "  <div class='dateStart'>";
  echo   "    <h5 class='text_render'>Ngày bắt đầu</h5>";
  echo   "    <p class='text_render'>$dateStart</p>";
  echo   "  </div>";
  echo   "  <div class='dateEnd'>";
  echo   "    <h5 class='text_render'>Ngày kết thúc</h5>";
  echo   "    <p class='text_render'>$dateEnd</p>";
  echo   "  </div>";
  echo   "</div>";
  echo   "</div>";
}
