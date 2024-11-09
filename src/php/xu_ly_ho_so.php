<form action="" enctype="multipart/form-data" method="post">
  <input type="file" name="fileUpload" id="file" />
  <button type="submit" name="btnNop" class="btnHoSo btnSucess"></button>
</form>
<?php
if(isset($_POST["btnNop"]) ){
    print_r($_FILES["fileUpload"]);
}