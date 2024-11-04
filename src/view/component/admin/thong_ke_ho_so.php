<style>
  .nganh {
    width: 80%;
    padding: 10px;
    border-radius: 20px;
    background-color: #EBF5EE;
    margin-top: 10px;
  }
  .infoHoSo {
    display: flex;
    justify-content: space-around;
    align-items: center;
    width: 100%;
  }
  .thongKe {
    display: flex;
    justify-content: space-around;
    align-items: center;
    width: 40%;
  }
  .dateStart, .dateEnd {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 20%;
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
    height: 700px;
  }
  .hoSoDangKy {
    text-align: center;
  }
</style>
<?php require "../php/thong_ke_ho_so.php"; ?>
<form class="body_page_render" method="post">
  <div class="nganh">
    <h2 class="text_render">Công nghệ thông tin</h2>
    <h4 class="text_render">Tổng số hồ sơ: 1000</h4>
    <div class="infoHoSo">
      <div class="thongKe">
        <div class="hoSoDangKy">
          <h5 class="text_render"><font color="orange">Chưa Duyệt</font></h5>
          <p class="text_render">100</p>
        </div>
        <div class="hoSoDangKy">
          <h5 class="text_render"><font color="4BA665">Đã Duyệt</font></h5>
          <p class="text_render">100</p>
        </div>
        <div class="hoSoDangKy">
          <h5 class="text_render"><font color="red">Từ Chối</font></h5>
          <p class="text_render">100</p>
        </div>
      </div>
      <div class="dateStart">
        <h5 class="text_render">Ngày bắt đầu</h5>
        <p class="text_render">25/1/2024</p>
      </div>
      <div class="dateEnd">
        <h5 class="text_render">Ngày kết thúc</h5>
        <p class="text_render">25/2/2024</p>
      </div>
    </div>
  </div>

  <?php 
    renderThongKeHoSo("Công nghệ thông tin", 1000, 100, 100, 100, "25/1/2024", "25/2/2024");
    renderThongKeHoSo("Công nghệ thông tin", 1000, 100, 100, 100, "25/1/2024", "25/2/2024");
    renderThongKeHoSo("Công nghệ thông tin", 1000, 100, 100, 100, "25/1/2024", "25/2/2024");
    renderThongKeHoSo("Công nghệ thông tin", 1000, 100, 100, 100, "25/1/2024", "25/2/2024");
    renderThongKeHoSo("Công nghệ thông tin", 1000, 100, 100, 100, "25/1/2024", "25/2/2024");
    renderThongKeHoSo("Công nghệ thông tin", 1000, 100, 100, 100, "25/1/2024", "25/2/2024");
    renderThongKeHoSo("Công nghệ thông tin", 1000, 100, 100, 100, "25/1/2024", "25/2/2024");
    renderThongKeHoSo("Công nghệ thông tin", 1000, 100, 100, 100, "25/1/2024", "25/2/2024");
  ?>

</form>