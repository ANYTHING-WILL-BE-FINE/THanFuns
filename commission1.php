<?php include("src/php/connect_db.php"); ?>
<!DOCTYPE html>
<html lang ="en">
<head>
<title>ThanFun</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="src/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="bar.css">
    
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
          creator_id: $("#creator_id").val(),
          request_price: $("#request_price").val(),
          job_color:0,
          job_scale:$("#job_scale").val(),
          job_mature:1,
          job_private:0,
          job_description: $("#job_description").val(),
          first_pay:234,
          job_co_right_mode:0,
          datetime_limit:$("#datetime_limit").val(),
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
   <!-- <form action="process.php" method="post"> -->

    <!--- navbar --->
    <nav class="navbar navbar-expand-md navbar-light bg-light px-2">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="photo\logo.png" alt="" width="100" class=" d-inline-block align-text-top mb-2 me-4">
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarlogo">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarlogo">

                <ul class="navbar-nav">
                    <div class="input-group mb-lg-0" >
                        <input type="text" class="form-control" placeholder="Search..." aria-label="Search...">
                        <div class="input-group-text">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                <i data-feather="search" height="21"></i>
                                </a>
                            </li>
                        </div>
                    </div>
                </ul>
                
                <ul class="navbar-nav ms-auto mb-lg-0">
                    <li>
                        <a href="#" class="nav-link " aria-current="page">LOGOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <i data-feather="mail" ></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <i data-feather="bell"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <i data-feather="user"></i>
                        </a>
                    </li>
                    
                    <a class="btn btn-primary" href="#" role="button">SUBMIT</a>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">

            <!--- sidebar --->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light px-2 sidebar collpase ">
                <ul class="nav mt-2 d-flex flex-md-column flex-row flex-nowrap justify-content-between">
                    <li class="nav-item">
                        <a class="nav-link active mb-2" aria-current="home" href="#">
                            <i data-feather="home"></i>
                            <span class="ml-1 d-none hidden d-sm-inline">HOME</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active mb-2" aria-current="discovery" href="#">
                            <i data-feather="compass"></i>
                            <span class="ml-1 d-none hidden d-sm-inline">DISCOVERY</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active mb-2" aria-current="ranking" href="#">
                            <i data-feather="award"></i>
                            <span class="ml-1 d-none hidden d-sm-inline">RANKING</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active mb-2" aria-current="timeline" href="#">
                            <i data-feather="file-text"></i>
                            <span class="ml-1 d-none hidden d-sm-inline">TIMELINE</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="setting" href="#">
                            <i data-feather="settings"></i>
                            <span class="ml-1 d-none hidden d-sm-inline">SETTING</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!--- fixedbuttom --->
            <nav id="bottom" class="col-md-3 col-lg-2 d-md-block bottom collpase bottom">
                <div class="bg-light fixed-bottom bottom">
                    <ul class="nav d-flex flex-md-column flex-row flex-nowrap justify-content-between bottom">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="home" href="#">
                                <i data-feather="home"></i>
                                <span class="ml-1 d-none hidden d-sm-inline"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="discovery" href="#">
                                <i data-feather="compass"></i>
                                <span class="ml-1 d-none hidden d-sm-inline"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="ranking" href="#">
                                <i data-feather="award"></i>
                                <span class="ml-1 d-none hidden d-sm-inline"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="timeline" href="#">
                                <i data-feather="file-text"></i>
                                <span class="ml-1 d-none hidden d-sm-inline"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="setting" href="#">
                                <i data-feather="settings"></i>
                                <span class="ml-1 d-none hidden d-sm-inline"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!--- content --->
            <div class="col-md-9 col-lg-10 ml-sm-auto px-md-4 py-4">
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
            <input class="md-4" id="creator_id" name="user_id" >
        </div> 
       
         <div class="mb-3">
            <label >ราคา</label>
            <input class="md-4" id="request_price" name="request_price"><label >บาท</label>
        </div> 
        <div class="mb-3">
            <label >วันส่งงาน</label>
            <input class="md-4" id="datetime_limit" name="request_price" placeholder=" YYY-MM-DD"><label ></label>
        </div> 
        <div class="mb-3">
          <label>ประเภทสี</label><select class="form-select mt-3">
          <option selected disabled value="">Select Color</option>
          <option>สีขาว-ดำ</option>
          <option>สี</option>
         </select>
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
        <label>mature?</label><select class="form-select mt-3">
          <option selected disabled value="">Select Mature</option>
          <option>no</option>
          <option>yes</option>
         </select>
        </div>
        <div class="mb-3">
        <label>เปิดผลงานเป็นสาธารณะหรือไม่?</label><select class="form-select mt-3">
          <option selected disabled value="">Select Public</option>
          <option>ไม่อนุญาต</option>
          <option>อนุญาต</option>
         </select>
        </div>  

        <button class="btn btn-danger" type="button" id="addcommission" onclick="insertMyday()">ยืนยัน</button>
      <button class="btn btn-secondary" type="button">ยกเลิก</button>

    </div>
  </div>
  
  </div>
                
                </div>
            
            </div>
            
            </div>
</div>
            <!-- </form> -->
            
            
            <script>
            function preview() {
            frame.src = URL.createObjectURL(event.target.files[0]);
            }
            </script>
            
            <script> feather.replace() </script>
            
            <script type="text/javascript">
            $(document).ready(function() {
              $('input[type="checkbox"]').click(function() {
                  var inputValue = $(this).attr("value");
                  $("." + inputValue).toggle();
              });
            });
            </script>
            
            
            
            
            
            <script> feather.replace()</script>
</body>
</html>