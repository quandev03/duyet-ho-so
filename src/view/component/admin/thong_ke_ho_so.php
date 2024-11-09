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
<form class="body_page_render" method="post">
  <?php 
    include "../php/thong_ke_ho_so_admin.php";
  ?>
</form>