<?php include("src/php/connect_db.php"); ?>
<?php
  $vp = 1;

  $sql = "SELECT tags_id FROM dict_tags ";
       $mysql = mysqli_query($conn, $sql);
       while ($row = mysqli_fetch_assoc($mysql)) {
        $vp= $vp+1;
      }
       $sql = "INSERT INTO mkt_commission (acc_id,idcreator,request_price,job_color,job_scale,job_description,job_category,job_mature,job_private) VALUES ( "",'SAES')";
     //   $mysql = $conn->mysqli_query($sql);
       if ($conn->query($sql)=== TRUE) {
          echo "New record has been added successfully !";
       } else {
          echo "Error: " . $sql . ":-" . mysqli_error($conn);
       }
      
       $sql = "SELECT * FROM dict_tags";
       $mysql = mysqli_query($conn, $sql);
       while ($row = mysqli_fetch_assoc($mysql)) {
           echo "<h5>Table: {$row['tags_label']} </h5>";
      }
      mysqli_close($conn);
  
?>

<!DOCTYPE html>
<html lang ="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Anything will be fine</title>
    <link rel="stylesheet" href="src/css/bootstrap.min.css">
    <script src="src/js/bootstrap.min.js"></script>
    <script>

      
      $.ajax({
      type: "POST", 
      url: 'process.php',
      data: {
        iduser: $('input[id="iduser"]:'),
        idcreator: Document.getElementById("idcreator"),
        price: Document.getElementById("price"),
        color: $('input[id="color"]:checked'),
        scale: $('input[id="scale"]:checked'),
        description: Document.getElementById("description"),
        category: $('input[id="category"]:checked'),
        mature: $('input[id="mature"]:checked'),
        publiceArt: $('input[id="publiceArt"]:checked'),
        action : "insertCommission"},
      success: function(data){
      console.log(data);
      },
      error: function(xhr, status, error){
      console.error(xhr);
    }
    });</script>

</head>
<body>

<div class="offcanvas offcanvas-bottom" id="demo">
    <div class="offcanvas-header">
      <h1 class="offcanvas-title">COMMISSION</h1>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
       <div class="mb-3"> <label>รหัสประจำตัวUser</label><br>
        <input class="md-4" id="iduser" name="acc_id">
        </div>
        <div class="mb-3">
            <label >รหัสประจำตัวCreator</label><br>
            <input class="md-4" id="idcreator" name="acc_id" >
        </div> 
       
         <div class="mb-3">
            <label >ราคา</label>
            <input class="md-4" id="price" name="request_price"><label >บาท</label>
        </div> 
        <div class="mb-3">
          <label>ประเภทสี</label><br>
          <input class="form-check-input" type="checkbox" id="color" name="job_color" value="something" >
          <label class="form-check-label">สีขาว-ดำ</label>
          <input class="form-check-input" type="checkbox" id="color" name="job_color" value="something" >
          <label class="form-check-label">สี</label>
        </div>
        <div class="mb-3">
          <label class="form-label">scaleของงาน</label><br>
          <input class="form-check-input" type="checkbox" id="scale" name="job_scale" value="something">
          <label class="form-check-label">Protrait</label>
          <input class="form-check-input" type="checkbox" id="scale" name="job_scale" value="something" >
          <label class="form-check-label">Bust-up</label>
          <input class="form-check-input" type="checkbox" id="scale" name="job_scale" value="something">
          <label class="form-check-label">Knee-up</label>
          <input class="form-check-input" type="checkbox" id="scale" name="job_scale" value="something">
          <label class="form-check-label">Full Body</label>
        </div> 
        <div class="mb-3">
            <label for="detail" class="form-label">รายละเอียดผลงาน</label>
            <textarea name="job_description" id="description" cols="30" row="30"class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">category</label><br>
            <input class="md-4" id="category" class="form-control" name="job_category"><label ></label>
        </div> 
        <div class="mb-3">
          <label  class="form-label">mature?</label><br>
          <input class="form-check-input" type="checkbox" id="mature" name="job_mature" value="something">
          <label class="form-check-label">NO</label>
          <input class="form-check-input" type="checkbox" id="mature" name="job_mature" value="something">
          <label class="form-check-label">YES</label>
        </div>
        <div class="mb-3">
          <label class="form-label">เปิดผลงานเป็นสาธารณะหรือไม่</label><br>
          <input class="form-check-input" type="checkbox" id="publiceArt" name="job_private" value="0" >
          <label class="form-check-label">ไม่อนุญาต</label>
          <input class="form-check-input" type="checkbox" id="publiceArt" name="job_private" value="1" >
          <label class="form-check-label">อนุญาต</label>
        </div>
       
        
       
      <button class="btn btn-danger" type="button">ยืนยัน</button>
      <button class="btn btn-secondary" type="button">ยกเลิก</button>
    </div>
  </div>
      
      <form class="container-fluid mt-3" align = 'left'>
        <h3> กฏของการทำCOMMISION</h3>
        <div class="col-sm-3"><p style="color:black">  1.การสร้างสัญญาการจ้างวานทั้งสองฝ่ายต้องติดต่อคุย ตกลงให้เรียบร้อยแล้วเท่านั้นจึงลงข้อมูลเข้าระบบและทำการชำระตามที่ระบบกำหนด โดยผู้ที่ต้องสร้าง commission จะต้องเป็นผู้จ้างวานเท่านั้น อีกทั้งการติดต่อ commission
            จะต้องได้รับการกดยืนยันจากทั้งผู้ซื้อและผู้ขายก่อนจึงจะดำเนินการต่อได้ </p></div>
        <div class="col-sm-3"><p style="color:black">  2.การจ้างงานแบบ commission ต้องมีการแบ่งชำระเป็นสองงวดเท่านั้น หากงวดที่สองไม่ชำระจะถือว่าสัญญาเป็นโมฆะ </p></div>
        <div class="col-sm-3"><p style="color:black">  3.Creator จะสามารถขอยืดเวลาการทำงานได้ 15 วัน หากเลย 15 วันแล้วยังไม่เสร็จ ผู้จ้างวานจะสามารถยื่นขอคืนเงินได้ </p></div>
        <div class="mb-3">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" id="check1" name="option1" value="something" required>
            <label class="form-check-label">ฉันได้อ่านและยอมรับข้อเสนอทุกข้อ </label>
          </div>
      
        <button class="btn btn-success" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
          ยืนยันCOMMISSSON
        </button>
      </div>  </form>

</body>
</html>