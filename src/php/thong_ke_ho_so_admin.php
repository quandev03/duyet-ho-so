<?php
  $data = getDataThongKe();
  foreach ($data as $key => $value) {
    $dataThongKe = layThongTinTungNganh($value["nganhXetTuyen"]);
    renderThongKeHoSo($dataThongKe["tenNganh"], $value["soLuong"], $dataThongKe["status1"], $dataThongKe["status0"], $dataThongKe["status-1"], $dataThongKe["dateStart"], $dataThongKe["dateEnd"]);
  }