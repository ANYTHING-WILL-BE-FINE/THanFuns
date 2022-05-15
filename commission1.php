<?php include("src/php/connect_db.php"); ?>
<!DOCTYPE html>
<html lang ="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Anything will be fine</title>
    <link rel="stylesheet" href="src/css/bootstrap.min.css">
    <script src="src/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
      function color() {  
          var yes = document.getElementById("color");  
          var no = document.getElementById("black-white");  
          if (yes.checked == true && no.checked == true){  
          return document.getElementById("error").innerHTML = "Please mark only one checkbox either Yes or No";  
         }  
          else if (yes.checked == true){  
          var y = document.getElementById("color").value;  
          return document.getElementById("result").innerHTML = y;   
        }   
          else if (no.checked == true){  
          var n = document.getElementById("black-white").value;  
          return document.getElementById("result").innerHTML = n;  
        }  
          else {  
          return document.getElementById("error").innerHTML = "*Please mark any of checkbox";  
        } 
      } 
      
      function scale() {  
          var protrait = document.getElementById("Protrait");  
          var bustup = document.getElementById("Bust-up");
          var kneeup = document.getElementById("Knee-up");  
          var fullbody = document.getElementById("Full Body");    
          if (protrait.checked == true && bustup.checked == true && kneeup.checked == true && fullbody.checked == true){  
          return document.getElementById("error").innerHTML = "Please mark only one checkbox either Yes or No";  
         }  
          else if (protrait.checked == true){  
          var p = document.getElementById("Protrait").value;  
          return document.getElementById("result").innerHTML = p;   
        }   
          else if (bustup.checked == true){  
          var b = document.getElementById("Bust-up").value;  
          return document.getElementById("result").innerHTML = b;  
        }  
          else if (kneeup.checked == true){  
          var k = document.getElementById("Knee-up").value;  
          return document.getElementById("result").innerHTML = k;  
        }  
          else if (fullbody.checked == true){  
          var f = document.getElementById("Full Body").value;  
          return document.getElementById("result").innerHTML = f;  
        }  
          else {  
          return document.getElementById("error").innerHTML = "*Please mark any of checkbox";  
        } 
      } 

      function mature() {  
          var yes = document.getElementById("yes");  
          var no = document.getElementById("no");  
          if (yes.checked == true && no.checked == true){  
          return document.getElementById("error").innerHTML = "Please mark only one checkbox either Yes or No";  
         }  
          else if (yes.checked == true){  
          var y = document.getElementById("yes").value;  
          return document.getElementById("result").innerHTML = y;   
        }   
          else if (no.checked == true){  
          var n = document.getElementById("no").value;  
          return document.getElementById("result").innerHTML = n;  
        }  
          else {  
          return document.getElementById("error").innerHTML = "*Please mark any of checkbox";  
        } 
      }

      function publiceArt() {  
          var yes = document.getElementById("1");  
          var no = document.getElementById("2");  
          if (yes.checked == true && no.checked == true){  
          return document.getElementById("error").innerHTML = "Please mark only one checkbox either Yes or No";  
         }  
          else if (yes.checked == true && no.checked == false){  
          var y = document.getElementById("yes").value;  
          return document.getElementById("result").innerHTML = y;   
        }   
          else if (yes.checked == false && no.checked == true){  
          var n = document.getElementById("no").value;  
          return document.getElementById("result").innerHTML = n;  
        }  
          else {  
          return document.getElementById("error").innerHTML = "*Please mark any of checkbox";  
        } 
      }

      function insertMyday(){
      $.ajax({
      type: "POST", 
      url: 'process.php',
      data:{
          user_id: $("#user_id").val(),
          creator_id: $("#user_creator").val(),
          request_price: $("#request_price").val(),
          job_color:0,
          job_scale:$("#job_scale").val(),
          job_mature:1,
          job_private:0,
          job_description: $("#job_description").val(),
          first_pay:234,
          job_co_right_mode:0,
          datetime_limit:"2022-09-13",
          commission_status :2,

          // iduser: document.getElementById("iduser"),
          // idcreator: document.getElementById("idcreator"),
          // price: document.getElementById("price"),
          // description: document.getElementById("description"),
          // category: $('input[id="category"]:checked'),
          // job_private: $('input[id="job_private"]:checked'),
          action : 'insertCommission'},
      success: function(data){
      console.log(data);
      },
      error: function(xhr, status, error){
      console.error(xhr);
    }
    });
  }
  </script>

</head>


<body>
    <div class="container-fluid mt-3" align = 'left'>
        <h3> กฏของการทำCOMMISION</h3>
        <div class="col-sm-3"><p style="color:black">  1.การสร้างสัญญาการจ้างวานทั้งสองฝ่ายต้องติดต่อคุย ตกลงให้เรียบร้อยแล้วเท่านั้นจึงลงข้อมูลเข้าระบบและทำการชำระตามที่ระบบกำหนด โดยผู้ที่ต้องสร้าง commission จะต้องเป็นผู้จ้างวานเท่านั้น อีกทั้งการติดต่อ commission
            จะต้องได้รับการกดยืนยันจากทั้งผู้ซื้อและผู้ขายก่อนจึงจะดำเนินการต่อได้ </p></div>
        <div class="col-sm-3"><p style="color:black">  2.การจ้างงานแบบ commission ต้องมีการแบ่งชำระเป็นสองงวดเท่านั้น หากงวดที่สองไม่ชำระจะถือว่าสัญญาเป็นโมฆะ </p></div>
        <div class="col-sm-3"><p style="color:black">  3.Creator จะสามารถขอยืดเวลาการทำงานได้ 15 วัน หากเลย 15 วันแล้วยังไม่เสร็จ ผู้จ้างวานจะสามารถยื่นขอคืนเงินได้ </p></div>
        <div class="mb-3">
       <div class="mb-3"> <label>รหัสประจำตัวUser</label><br>
        <input class="md-4" id="user_id" name="user_id">
        </div>
        <div class="mb-3">
            <label >รหัสประจำตัวCreator</label><br>
            <input class="md-4" id="user_creator" name="user_id" >
        </div> 
       
         <div class="mb-3">
            <label >ราคา</label>
            <input class="md-4" id="request_price" name="request_price"><label >บาท</label>
        </div> 
        <div class="mb-3">
          <label>ประเภทสี</label><br>
          <input class="form-check-input" type="checkbox" id="color" name="job_color" value="something" >
          <label class="form-check-label">สีขาว-ดำ</label>
          <input class="form-check-input" type="checkbox" id="black-white" name="job_color" value="something" >
          <label class="form-check-label">สี</label>
        </div>

        <div class="mb-3">
            <label for="scale" class="form-label">Scale</label>
            <select class="form-select col mb-1" id="job_scale" name="job_scale" required>
                <option selected disabled value="">Select Category</option>
                <option value="1">Protrait</option>
                <option value="2">Bust-up</option>
                <option value="3">Knee-up</option>
                <option value="4">Full Body</option>
            </select>
        </div>

        <!-- <div class="mb-3">
          <label class="form-label">scaleของงาน</label><br>
          <input class="form-check-input" type="checkbox" id="Protrait" name="job_scale" value="something">
          <label class="form-check-label">Protrait</label>
          <input class="form-check-input" type="checkbox" id="Bust-up" name="job_scale" value="something" >
          <label class="form-check-label">Bust-up</label>
          <input class="form-check-input" type="checkbox" id="Knee-up" name="job_scale" value="something">
          <label class="form-check-label">Knee-up</label>
          <input class="form-check-input" type="checkbox" id="Full Body" name="job_scale" value="something">
          <label class="form-check-label">Full Body</label>
        </div> -->

        <div class="mb-3">
            <label for="detail" class="form-label">รายละเอียดผลงาน</label>
            <textarea name="job_description" id="job_description" cols="30" row="30"class="form-control"></textarea>
        </div>
        <!-- <div class="mb-3">
            <label for="category" class="form-label">category</label><br>
            <input class="md-4" id="category" class="form-control" name="job_category"><label ></label>
        </div>  -->
        <div class="mb-3">
          <label  class="form-label">mature?</label><br>
          <input class="form-check-input" type="checkbox" id="job_mature" name="job_mature" value="nonmature">
          <label class="form-check-label">NO</label>
          <input class="form-check-input" type="checkbox" id="job_mature" name="job_mature" value="mature">
          <label class="form-check-label">YES</label>
        </div>
        <div class="mb-3">
          <label class="form-label">เปิดผลงานเป็นสาธารณะหรือไม่</label><br>
          <input class="form-check-input" type="checkbox" id="job_private" name="job_private" value="0" >
          <label class="form-check-label">ไม่อนุญาต</label>
          <input class="form-check-input" type="checkbox" id="job_private" name="job_private" value="1"  >
          <label class="form-check-label">อนุญาต</label>
        </div>  

        <button class="btn btn-danger" type="button" id="addcommission" onclick="insertMyday()">ยืนยัน</button>
      <button class="btn btn-secondary" type="button">ยกเลิก</button>

    </div>
  </div></body>
</html>