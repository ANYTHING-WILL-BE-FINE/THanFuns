<?php include("src/php/connect_db.php"); ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ThanFun</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="src/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <link rel="stylesheet" href="src/css/fontawesome.css">
    <link rel="stylesheet" href="bar.css">
    <link rel="stylesheet" href="status.css">
    <link rel="stylesheet" href="src/css/icon/all.css">
    
    
        <style type="text/css">
            .selectt {
                color: rgb(0, 0, 0);
                padding: 0px;
                display: none;
                margin-top: 15px;
                background: rgb(255, 255, 255)
            }
            label {
                margin-right: 20px;
            }
        </style>
        <script>
      function insertMyDay(){
      $.ajax({
      type: "POST", 
      url: 'testinformation.php',
      data:{
        user_pic: $("#user_pic").val(),
        first_name: $("#first_name").val(),
        last_name: $("#last_name").val(),
        date_birth:$("#date_birth").val(),
        gender:$("#gender").val(),
        address:$("#address").val(),
        phone:$("#phone").val(),
        nickname: $("#nickname").val(),
        role:$("#role").val(),
        idnum:$("#idnum").val(),
        idcard:$("#idcard").val(),
        idpic:$("#idpic").val(),

//           $file = $_POST['file'];
// $first_name = $_POST['first_name'];
// $last_name = $_POST['last_name'];
// $date_birth = $_POST['date_birth'];
// $gender = $_POST['gender'];
// $address = $_POST['address'];
// $phone = $_POST['phone'];
// $nickname = $_POST['nickname'];
// $role = $_POST['role'];
// $idnum = $_POST['idnum'];
// $idcard = $_POST['idcard'];
// $idpic = $_POST['idpic'];

// $sql = "INSERT INTO 'acc_user' (pic_user,
//                       nickname,first_name,last_name,gender,date_birth,
//                       phone,address,user_role,
//                       id_card,papercard_pic,user_w_card_pic,
//                       )

          // iduser: document.getElementById("iduser"),
          // idcreator: document.getElementById("idcreator"),
          // price: document.getElementById("price"),
          // description: document.getElementById("description"),
          // category: $('input[id="category"]:checked'),
          // job_private: $('input[id="job_private"]:checked'),
          action : 'information'},
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

    <form class="container col-md-5 justify-content-center"  >
        <div class="profile-pic">
            <label class="-label" for="file">
              <span class="glyphicon glyphicon-camera"></span>
            </label>
            <div class="card-body text-center">
                <img src="https://www.img.in.th/images/4614360009d52083321f6cce10c05398.th.png" 
                alt="Generic placeholder image" 
                class="rounded-circle"
                style="width: 130px;" border="0" />
            </div>
            <div class="mb-3">
            <label for="user_pic" class="form-label">Change Profile</label>
            <input class="form-control" type="file" id="user_pic">
          </div>
    
            
          </div>

          <br>

          <div>
              <label for="fname">First name</label>
          <input type="text" id="first_name" name="first_namee" placeholder="First Name" required>
          </div>
          <div>
              <label for="lname">Last name</label>
          <input type="text" id="last_name" name="last_name" placeholder="Last Name" required>
        </div>
          

          <br>
          Date of Birth <br> <input type = "date" id="date_birth" name="date_birth" required>
          <br>

          <label for="gender"> Gender</label>
        <select name="gender" id="gender" required>
	    <option value="0" selected>Gender</option>
	    <option value="1">Male</option>
	    <option value="2">Female</option>
        </select>

        <div class="row mb-1">
            <label for="address" class="col-sm-2 col-form-label">Address</label> <br>
            <textarea class="form-control" id="address" rows="4" placeholder="Input your address" required></textarea>
        </div>

        <label for="phone">Phone number</label>
        <input type="tel" id="phone" name="phone" required>

        <label for="nickname">Nickname</label>
        <input type="nickname" id="nickname" name="nickname" required>

        <br>
        <label for="role"> Role</label>
        <select name="role" id="role" required>
	    <option value="0" selected>Role</option>
	    <option value="1">Member</option>
	    <option value="2">Creator</option>
	    <option value="3">Admin</option>
        </select>
        

        <div>
            <label for="idnum">รหัสบัตรประชาชน</label>
        <input type="text" id="idnum" name="idnum" placeholder="idcard" required>
        </div>
        <div class="mb-3">
            <label for="idcard" class="form-label">รูปบัตรประชาชน</label>
            <input class="form-control" type="file" id="idcard" required>
          </div>
          <div class="mb-3">
            <label for="idpic" class="form-label">รูปถ่ายกับบัตรประชาชน</label>
            <input class="form-control" type="file" id="idpic" required>
          </div>
        

        <div>
            <label for="bank_account_no">เลขบัญชีธนาคาร</label>
          <input type="varchar(30)" id="bank_account_no" name="bank_account_no" placeholder="bank_account_no" >
        </div>
        <div>
            <label for="bank_account_name">ชื่อบัญชีธนาคาร</label>
          <input type="varchar(100)" id="bank_account_name" name="bank_account_name" placeholder="bank_account_name">
        </div>
        <div>
            <label for="bank_info">สาขาธนาคาร</label>
          <input type="varchar(100)" id="bank_info" name="bank_info" placeholder="bank_info">
        </div>
        <div class="mb-3">
            <label for="bankpic" class="form-label">สำเนาบัญชีธนาคาร</label>
            <input class="form-control" type="file" id="formFile">
          </div>
          
          <br>
        <button type="button" class="btn btn-primary" onclick="insertMyDay();">Submit</button>
    </form>


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