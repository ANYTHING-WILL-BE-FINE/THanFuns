<?php

//<!-- https://www.bootdey.com/snippets/tagged/stepper -->
$action = $_GET['action'];

if($action == 'qpagedt'){
    include_once("connect_db.php");
    // $conn

    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

    if ($contentType === "application/json") {
      $content = trim(file_get_contents("php://input"));
      $decoded = json_decode($content, true);    
      $payment_id = $decoded['payment_id']; 

  
      $sql = "SELECT * FROM acc_paybuy WHERE payment_id  =  '$payment_id'";
      $mysql = mysqli_query($conn, $sql);
      $row = mysqli_fetch_row($mysql);
        $payment_status = $row[4];
        $product_id = $row[1];
        $payer_id = $row[3];
      $row = mysqli_fetch_all($mysql, MYSQLI_ASSOC);
      $reply = json_encode($row);
      // mysqli_free_result($row);
  
    }  
    // header("Content-Type: application/json; charset=UTF-8");
    // echo $reply;
    
$stepper = "<div class='col mb-3 px-5'> <div class=''> <div class='steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x'>
            <div class='step ";
if($payment_status >= 1){
    $stepper .= " completed ";
} 

$stepper .= "'>
                <div class='step-icon-wrap'>
                    <div class='step-icon'><i class='fas fa-shopping-cart'></i></div>
                </div>
                <h4 class='step-title'>สินค้า</h4>
            </div>
            <div class='step ";
           
            if($payment_status >= 2){
                $stepper .= " completed ";
            } 
            
            $stepper .= "'>
                <div class='step-icon-wrap'>
                    <div class='step-icon'><i class='fas fa-percentage'></i></div>
                </div>
                <h4 class='step-title'>ยืนยันและโค้ดส่วนลด</h4>
            </div>
            <div class='step ";
            if($payment_status >= 3){
                $stepper .= " completed ";
            } 
            $stepper .= "'>
                <div class='step-icon-wrap'>
                    <div class='step-icon'><i class='fas fa-wallet'></i></div>
                </div>
                <h4 class='step-title'>เลือกช่องทางชำระ</h4>
            </div>
            <div class='step ";
            if($payment_status >= 4){
                $stepper .= " completed ";
            } 
            $stepper .= "'>
                <div class='step-icon-wrap'>
                    <div class='step-icon'><i class='fas fa-receipt'></i></div>
                </div>
                <h4 class='step-title'>ยืนยันการชำระเงิน</h4>
            </div>
            <div class='step  ";
            if($payment_status >= 5){
                $stepper .= " completed ";
            } 
            $stepper .= "'>
                <div class='step-icon-wrap'>
                    <div class='step-icon'><i class='fas fa-balance-scale'></i></div>
                </div>
                <h4 class='step-title'>ตรวจสอบ</h4>
            </div>
            <div class='step  ";
            if($payment_status >= 7){
                $stepper .= " completed ";
            } 
            $stepper .= "'>
                <div class='step-icon-wrap'>
                    <div class='step-icon'><i class='far fa-check-circle'></i></div>
                </div>
                <h4 class='step-title'>สำเร็จ</h4>
            </div>
        </div>
    </div>
</div>";

echo $stepper;



$data = '
<div class="padding-bottom-3x mb-1">
            <div class="row pt-5">
                <div class="col ">
                    <div class="rounded border bg-light border-light">
                        <div class="card-body">
                            <div class=" ">
                                <h4 class="fw-bold">สินค้า/บริการ</h4>
                            </div>
                            <div class="row d-flex justify-content-md-start justify-content-center align-items-center">
                                <div class="col-auto mb-2  ">
                                    <div class="mb-1 rounded bg-image hover-overlay ripple"
                                        style="display: block;width: 170px;height: 170px;position: relative;overflow: hidden;">
                                        <img src="https://pbs.twimg.com/media/FRIdtZwaQAE0h1z?format=jpg&name=900x900"
                                            style="display: block;min-width: 100%;min-height: 100%; position: absolute;top: 0;bottom: 0;left: 0;right: 0;"
                                            class="" alt="..." />
                                        <div class="mask " style="background-color: rgba(0, 0, 0, 0.6);">
                                            <div class="d-flex justify-content-center align-items-center h-100">
                                                <p class="text-white mb-0"> <a href="#"> <span
                                                            class="badge badge-light">ดูโพสต์ <i
                                                                class="fas fa-share"></i></span></a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <h4 id="name_of_product" class="card-title text-secondary">';
                                    
                                    
                                    $sql = "SELECT * FROM mkt_product WHERE product_id=$product_id ";
                                    $mysql = mysqli_query($conn, $sql);
                                    $product = mysqli_fetch_array($mysql, MYSQLI_ASSOC);
                                    
                                    $data .=  $product['product_name'];
                                    $data .= '</h4>';
                                    
                                    $sql = "SELECT * FROM mkt_product_tag INNER JOIN dict_tags ON mkt_product_tag.tags_id =dict_tags.tags_id WHERE product_id=$product_id";
                                    $mysql_tags = mysqli_query($conn, $sql);
                                    
                                    
                                    /* fetch associative array */
                                    $cot = 0;
        
                                    while ($tags = mysqli_fetch_assoc($mysql_tags) ){
                                        $data .= ' <span class="badge rounded-pill badge-primary">#'.$tags['tags_label'].'</span> ';
                                        $cot += 1;
                                    }
                             
                                    
                                    $data .= '<p>'. $product['description'] . '</p>
                                    <h3><span class="fw-bold">ราคา <span id="product_price">'. $product['default_price'] .' บาท</span></h3>
                               
                                    <button type="button" class="btn btn-primary" data-mdb-toggle="modal"
                                        data-mdb-target="#staticBackdrop">ดูตัวอย่างไฟล์</button>
            

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="rounded border bg-light border-light mt-5">
                        <div class="card-body">
                            <div class=" ">
                                <h4 class="fw-bold">ส่วนลด</h4>
                            </div>
                            
                            <div>
                                <div class="form-outline mt-3">
                                    <input type="search" id="form1" class="form-control" aria-describedby="textExample1" />
                                    <label class="form-label" for="form1">คลิกเพื่อกรอกรหัสส่วนลด</label>
                                  
                                </div>
                                <!--- <div id="textExample1" class="form-text">
                                 ดีลดี ๆ มีได้ในทุกวัน !
                                 </div> --->
                            </div>
                            <div class="mt-5 ">
                                <h6 class="fw-bold">ส่วนลดที่สามารถใข้งานได้</h6>

                            </div>
                            <div class="">

                                <div class="card mb-3" style="">
                                    <div class="row g-0 d-flex align-items-center  ">
                                        <div class="col-md-2  rounded-start align-self-stretch"
                                            style="background: rgb(255,135,179);background: linear-gradient(125deg, rgba(255,135,179,1) 0%, rgba(199,49,198,1) 28%, rgba(69,233,198,1) 51%, rgba(32,198,232,1) 100%)">


                                        </div>
                                        <div class="col row d-flex align-items-center justify-content-evenly ">
                                            <div class="card-body col-auto col-md col-lg-auto ">

                                                <p class="card-text">
                                                    <div class="d-flex ่ align-items-center">
                                                        <i class="fas fa-parking fa-3x"></i>
                                                        <div class="ms-3">
                                                            <p class="fw-bold mb-1">ลดแบบไม่มีวันหยุด</p>
                                                            <p class="text-muted mb-0">ส่วนลด 500 บาท ขั้นต่ำ 250บาท</p>
                                                        </div>
                                                    </div>
                                                    <small class="text-danger"><i class="far fa-clock"></i> หมดอายุ ใน 5
                                                        ปี</small>
                                                </p>

                                            </div>
                                            <div class="col-auto ms-auto me-auto mb-3 px-5">
                                                <button type="button" class="btn btn-outline-success"
                                                    data-mdb-ripple-color="green">เลือก</button>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="d-flex justify-content-center p-5">
                                    <nav aria-label="...">
                                        <ul class="pagination">
                                            <li class="page-item">
                                                <a class="page-link">Previous</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item active" aria-current="page">
                                                <a class="page-link" href="#">2 <span
                                                        class="visually-hidden">(current)</span></a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col col-md-auto ps-md-5">
                    <div class="card-body">
                        <div class=" ">
                            <h4 class="fw-bold">การซื้อขายระหว่าง</h4>
                        </div>
                        <div class="stepper d-flex flex-column mt-1 ml-2 ">
                            <div class="d-flex mb-1">
                                <div class="d-flex flex-column align-items-center" style="width:60px">
                                    <div class="mb-1" style="width:60px; height:120px; position:relative;">';
                                    
                                    
                                    $sql = "SELECT * FROM acc_user WHERE user_id=$payer_id ";
                                    $mysql = mysqli_query($conn, $sql);
                                    $payer = mysqli_fetch_array($mysql, MYSQLI_ASSOC);
                                    $crter_id = $product['creator_id']; 
                                    $sql = "SELECT * FROM acc_user WHERE user_id = $crter_id ";
                                    $mysql = mysqli_query($conn, $sql);
                                    $crter = mysqli_fetch_array($mysql, MYSQLI_ASSOC);
                                  
                                    $data .='<img src="https://ui-avatars.com/api/?name='.$payer['first_name'].'+'.$payer['last_name'].'&background=random"
                                            style="width: 100%; height: 100%; display: block; object-fit: cover; position: absolute; "
                                            class="img img-responsive full-width rounded-circle" alt="...">
                                    </div>
                                    <div class="line h-100 "></div>
                                </div>
                                <div class="ms-3">
                                    <h5 class="text-dark">คุณ '.$payer['first_name'].' '.$payer['last_name'].'</h5>
                                    <p class="lead text-muted pb-3">ในฐานะผู้ซื้อ</p>
                                </div>
                            </div>
                            <div class="d-flex mb-1">
                                <div class="d-flex flex-column pr-4 align-items-center">
                                    <div class="mb-1" style="width:60px; height:60px; position:relative;">
                                        <img src="https://ui-avatars.com/api/?name='.$crter['first_name'].'+'.$crter['last_name'].'&background=random"
                                            style="width: 100%; height: 100%; display: block; object-fit: cover; position: absolute; "
                                            class="img img-responsive full-width rounded-circle" alt="...">
                                    </div>
                                    <div class="line h-100 d-none"></div>
                                </div>
                                <div class="ms-3">
                                    <h5 class="text-dark">คุณ '.$crter['first_name'].' '.$crter['last_name'].'</h5>
                                    <p class="lead text-muted pb-3">ในฐานะผู้ขาย</p>
                                </div>
                            </div>

                        </div>';
                        
                        
                        if ($product['co_right_mode']){
                            $data .= '<div class="alert alert-success d-flex align-items-center"
                            role="alert">

                            <div>
                            <i class="fas fa-copyright"></i> สินค้านี้
                                ได้รับอนุญาตให้นำไปใช้ในเชิงพาณิชย์
                            </div>
                        </div>'; 
                        }else{
                            $data .= '<div class="alert alert-danger d-flex align-items-center"
                            role="alert">

                            <div>
                                <i class="fas fa-exclamation-triangle"></i> สินค้านี้
                                ไม่อนุญาตให้นำไปใช้ในเชิงพาณิชย์
                            </div>
                        </div>'; 
                        }
                        


                        
                        $data .= ' </div>
                    <div class="shadow-2-strong  card-body p-4 rounded-5 border-1 border border-warning">
                        <h5 class="text-center">Order Summary</h5>
                        <h6 class="text-center text-muted">ID #'.$payment_id.'</h6>
                        <hr />
                        <div class="table-responsive">
                            <table class="table align-middle mb-0 bg-white">
                                <thead class="bg-light">
                                    <tr>

                                        <th>ชื่อ</th>
                                        <th class="align-right text-end">บาท</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                        <td>
                                            <p class="fw-normal mb-1 text-danger"><i class="fas fa-caret-up "></i>
                                                ภาพวาราคาพี</p>
                                            <p class="text-muted mb-0">ประเภทสินค้าขายตรง</p>
                                        </td>

                                        <td class="align-right text-end fw-bold text-danger"><i class="fas fa-plus"></i>
                                            1,920</td>

                                    </tr>
                                    <tr>

                                        <td>
                                            <p class="fw-normal mb-1 text-success"><i class="fas fa-caret-down "></i>
                                                ราคาคูปอง</p>
                                            <p class="text-muted mb-0">Finance</p>
                                        </td>
                                        <td class="align-right text-end fw-bold text-success"><i
                                                class="fas fa-minus"></i> 500</td>

                                    </tr>
                                    <tr>

                                        <td>
                                            <h4 class="fw-bold mb-1">Total</h4>

                                        </td>

                                        <td class="align-right text-end">
                                            <h4 class=" fw-bold text-decoration-underline">1,420</h4>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>




                    </div>
                </div>


            </div>
        </div>
        <div class="mt-5 m-2 w-100" style="height:1px;background-color: black;">
        </div>

        <div class=" p-4 ">
            <div class="row d-flex justify-content-center">
                <div class="col-auto mb-3">
                    <button type="button" class="btn btn-dark btn-lg">ยืนยันการสั่งซื้อ</button>
                </div>
                <div class="col-auto mb-3">
                    <button type="button" class="btn btn-outline-dark btn-lg"
                        data-mdb-ripple-color="dark">ยกเลิก</button>
                </div>
            </div>
        </div>





';








echo $data;


echo '<div class="form-floating mb-3">
<input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
<label for="floatingInput">Email address</label>
</div>';






    mysqli_close($conn);

}

#stap


#endregion


?>