
<style>
  .btn_upload_ho_ba {
    background-color: #152259;
    background-image: url("../storage/image_system/icons8-upload-26-2.png");
    background-repeat: no-repeat;
    background-position: 15px 15px;
    color: white;
    padding: 15px 15px 15px 50px;
    margin: 10px 0;
    border: none;
    cursor: pointer;
    width: 200px;
    font-size: x-large;
    font-style: bold;
    border-radius: 20px;
    text-align: center;
    position: absolute;
    right: 1%;
  }
  
  dialog {
    width: 400px;
    height: 400px;
    background-color: white;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 20px;
    padding: 20px;
    /* display: none; */
  }
  .dialog_btn {
    padding: 10px 20px;
    margin: 10px;
    border: none;
    cursor: pointer;
    font-size: x-large;
    font-style: bold;
    border-radius: 20px;
    width: 150px;
  
  }
  .cancel_btn {
    background-color: red;
    color: white;
    position: absolute;
    left: 10%;
    bottom: 10%;
  }
  .success_btn {
    background-color: #152259;
    color: white;
    position: absolute;
    right: 10%;
    bottom: 10%;
  }

  .listNganh {
    margin-left: 2%;
    overflow-y: scroll;
    height: 700px;
  }
  .nganhXetTuyen {
    width: 75%;
    height: 100px;
    background-color: #EBF5EE;
    border-radius: 20px;
    margin: 10px 0;
    padding: 10px;
    display: flex;
    justify-content: space-around;
    align-items: center;
  }
  .btnNopHoSo {
    background-color: #EBF5EE;
    display: flex;
    justify-content: space-around;
    align-items: center;
    width: 15%;
  }
  .dateStart, .dateEnd {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 15%;
    height: 40%;
  }
  .nganh {
    width: 40%;
    /* height: 1px; */
    /* background-color: black; */
  }
  .date{
    width: 90%;
    text-align: end;
    background-image: url("../storage/image_system/icons8-date-15.png");
    background-repeat: no-repeat;
    margin: 0px;
    margin-top: 5px;
  }
  .dateStart h5, .dateEnd h5 {
    text-align: center;
    color: #152259;
    margin: 0px;
    margin-bottom: 5px;
  }
  
  .btnNopHoSo {
    width: 25%;
    height: 50%;
    padding-left: 50px;
    background-color: rgba(75, 166, 111, 0.11);
    border-radius: 20px;
    text-align: center;
    color: #4BA665;
    background-image: url("../storage/image_system/icons8-time-machine-30-1.png");
    background-repeat: no-repeat;
    background-position: 12px 12px;
  }
</style>

<div class="body_page_render">
  <form action="" method="post">
    <button class="btn_upload_ho_ba" name="btnNopHoBa">Nộp học bạ</button>
    <div class="listNganh">
      <?php 
        $data = layDuLieuNganhChoHocSinh();
        foreach($data as $key => $value) {
          $khoiXetTuyen = explode(" ", $value['khoiXetTuyen']);
          $startDate = date("d-m-Y", strtotime($value['dateStart']));
          $endDate = date("d-m-Y", strtotime($value['dateEnd']));
          renderNganh($value['tenNganhXetTuyen'], $khoiXetTuyen, $startDate,  $endDate, $value['id']);
        }
      ?>
    </div>
  </form>
    <?php 
      include "../php/them_ho_so_hs.php";
    ?>

</div>