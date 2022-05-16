<?php include_once("src/php/connect_db.php");?>
<?php 
    $sql = "SELECT request_price FROM mkt_commission
            WHERE commission_id = '1' ";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>ThanFun</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="src/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <link rel="stylesheet" href="src/css/icon/all.css">
    <link rel="stylesheet" href="bar.css">
    <link rel="stylesheet" href="status.css">
    <link rel="stylesheet" href="src/css/style.css">

    <!-- <script>
        function insertMyday(){
            $.ajax({
            type: "POST", 
            url:'statusupdate.php',
            data:{
                commission_id: '1',
                action : 'status'},
            success: function(data){
            console.log(data);
            },
            error: function(xhr, status, error){
            console.error(xhr);
            }
            });
        }

        function show() {
            if()
        }
    </script> -->

</head>

<body>
    <!-- <form action="process.php" method="post"> -->

    <!--- navbar --->
    <nav class="navbar navbar-expand-md navbar-light bg-light px-0">
        <div class="container-fluid">
            <a class="navbar-brand hidden" href="#">
                <img src="photo\logo.png" alt="" width="100" class=" d-inline-block align-text-top mb-2 me-4">
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarlogo">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarlogo">

                <ul class="navbar-nav">
                    <div class="input-group mt-2 mt-mb-0 mb-lg-0" >
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
    <!--- navbar end --->

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
            <!--- sidebar end --->

            <!--- fixedbuttom --->
            <nav id="bottom" class="col-md-3 col-lg-2 d-md-block bottom collpase bottom">
                <div class="bg-light fixed-bottom bottom">
                    <ul class="nav d-flex flex-md-column flex-row flex-nowrap justify-content-between bottom">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="home" href="#">
                                <i data-feather="home"></i>
                                <!-- <i class="fas fa-home fa-2x"></i> -->
                                <span class="ml-1 d-none hidden d-sm-inline"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="discovery" href="#">
                                <i data-feather="compass"></i>
                                <!-- <i class="fas fa-compass fa-2x"></i> -->
                                <span class="ml-1 d-none hidden d-sm-inline"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="ranking" href="#">
                                <i data-feather="award"></i>
                                <!-- <i class="fas fa-crown fa-2x"></i> -->
                                <span class="ml-1 d-none hidden d-sm-inline"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="timeline" href="#">
                                <i data-feather="file-text"></i>
                                <!-- <i class="fas fa-list fa-2x"></i> -->
                                <span class="ml-1 d-none hidden d-sm-inline"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="setting" href="#">
                                <i data-feather="settings"></i>
                                <!-- <i class="fas fa-gear fa-2x"></i> -->
                                <span class="ml-1 d-none hidden d-sm-inline"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!--- fixedbuttom end --->

            <!--- content --->
            <div class="col-md-9 col-lg-10 ml-sm-auto px-md-4 py-4" style="background-color: #ffffff;">
                <div class="row d-flex justify-content-center align-items-center mb-4">
                        <div class="card text-black" style="border-radius: 30px; ">
                            <div class="card-body p-4" >
                                <div class="text-center mt-5 mb-4">
                                        <h5><span class="font-weight-bold" style="color: #282382;">PROGRESS</span></h5>
                                </div>
                                <div class="">

                                    <div id="progress" class="d-flex flex-row justify-content-between align-items-center align-content-center px-0 mb-0">
                                        <div class="d-flex justify-content-center align-items-center" id="img1"></div>
                                        <div class="flex-fill" id="onecolor1">
                                            <p><h6 class="text-muted text-center mt-1 mb-0 small hidden2" >ผู้ว่าจ้างชำระเงิน</h6></p>
                                        </div>
                                        <span class="dot1" id="dot1"></span>
                                        <div class="flex-fill text-center" id="twocolor">
                                            <p><h6 class="text-muted mt-1 mb-0 small hidden2" >ผู้วาดทำตามคำขอ</h6></p>
                                        </div>
                                        <span class="dot2" id="dot2"></span>
                                        <div class="flex-fill" id="onecolor2">
                                            <p><h6 class="text-muted text-center mt-1 mb-0 small hidden2" >ผู้ว่าจ้างชำระเงิน</h6>
                                            <h6 class="text-muted text-center mt-0 mb-0 small hidden2" >รอบที่ 2</h6></p>
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center" id="img2"></div>
                                    </div>
                                    <!-- <div class="d-flex flex-row justify-content-between align-items-center align-content-center px-0 mb-0 row mb-3">
                                        <h5 class="col-2 text-center" >user</h5>
                                        <h5 class="col-8"></h5>
                                        <h5 class="col-2 text-center" >creator</h5>
                                    </div> -->
                                </div>

                                <div class="row mt-5 mb-3">
                                    <h5 class="col-lg-2 col-md-3 col-sm-4 col-5 text-end" >ราคาสินค้า</h5>
                                    <h5 class="col-lg-8 col-md-6 col-sm-4 col-2 text-start" ></h5>
                                    <h5 class="col-lg-2 col-md-3 col-sm-4 col-5 text-start" >
                                        <?php $row = $result->fetch_assoc();
                                            echo $row['request_price']; ?>
                                    </h5>
                                </div>

                                <div class="row mb-3">
                                    <h5 class="col-lg-2 col-md-3 col-sm-4 col-5 text-end" >ส่วนลด</h5>
                                    <h5 class="col-lg-8 col-md-6 col-sm-4 col-2 text-start" ></h5>
                                    <h5 class="col-lg-2 col-md-3 col-sm-4 col-5 text-start" >0</h5>
                                </div>

                                <div class="row mb-3">
                                    <h5 class="col-lg-2 col-md-3 col-sm-4 col-5 text-end" >รวม</h5>
                                    <h5 class="col-lg-8 col-md-6 col-sm-4 col-2 text-start" ></h5>
                                    <h5 class="col-lg-2 col-md-3 col-sm-4 col-5 text-start" >1000</h5>
                                </div>

                                <div class="row mb-3">
                                    <h5 class="col-lg-2 col-md-3 col-sm-4 col-5 text-end" >มัดจำ</h5>
                                    <h5 class="col-lg-8 col-md-6 col-sm-4 col-2 text-start" ></h5>
                                    <h5 class="col-lg-2 col-md-3 col-sm-4 col-5 text-start" >0</h5>
                                </div>

                                <div class="row mb-3">
                                    <h5 class="col-lg-2 col-md-3 col-sm-4 col-5 text-end" >สถานะ</h5>
                                    <h5 class="col-lg-8 col-md-6 col-sm-4 col-2 text-start" ></h5>
                                    <h5 class="col-lg-2 col-md-3 col-sm-4 col-5 text-start" >
                                    
                                    </h5>
                                </div>
            
                            </div>
                        </div>
                    </div>

                <div class="d-grid col-6 col-sm-3 mx-auto">
                    <button type="submit" class="btn btn-primary mb-5">ติดต่อครีเอเตอร์</button>
                </div>

            </div>
            <!--- content end --->

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

</body>
</html>
