<?php

//<!-- https://www.bootdey.com/snippets/tagged/stepper -->
$act = $_GET['act'];

$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

if ($contentType === "application/json") {
    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content, true);    
    $payment_id = $decoded['payment_id']; 
    $action = $decoded['action'];
    $role = $decoded['role'];

    if(!is_null($role)){

        if($action == "structRunbuitd"){

            exit('
            <div id="headd"></div>
            <div class="container-xl">
            <div id="stepPay">
            </div>
            <div class="padding-bottom-3x mb-1">
            <div class="row pt-5">
            <div id="leftPayModule" class="col"></div>
            <div id="rightPayModule" class="col-sm-12 col col-md-auto ps-md-5">
            <div class="sticky-top">
                <div id="PCcontacts" >
                </div>
                <div id="checkCOright">
                </div>
                <div id="orderSummary">
                </div>
            </div>
            </div>
            </div>
            </div>
            <div id="linebrak" class="mt-5 m-2 w-100" style="height:1px;background-color: black;">
            </div>
            <div id="nextbutton">
            </div>
            </div>
            <div id="foot">
            </div>
            ');

        }

        
        if($action ==  "headerPaymentQ"){

        }

        include_once("connect_db.php");
        $sql = "SELECT * FROM acc_paybuy INNER JOIN mkt_product ON acc_paybuy.product_id=mkt_product.product_id WHERE payment_id ='$payment_id';";
        $mysql = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($mysql);
        $payment_status = $row['payment_status'];
        $acc_banking_id = $row['acc_banking_id'];
        $product_id = $row['product_id'];
        $payer_id = $row['payer_id'];
        $payment_mode = $row['payment_mode'];
        $product_name =  $row['product_name'];
        $description =  $row['description'];
        $price = $row['default_price'];
        $creator_id = $row['creator_id'];
        $co_right_mode = $row['co_right_mode'];
        $total_price = $row['price_total']; 
        
        
        if($action=="gotonext406"){
            $payment_status += 1;
            $esql = "UPDATE acc_paybuy  
                    SET payment_status = $payment_status
                    WHERE payment_id ='$payment_id';";
    
            $emysql = mysqli_query($conn, $esql);
            exit("GO1001");
        
        }
        
        elseif($action=="gotoback406"){
            $payment_status -= 1;
            $esql = "UPDATE acc_paybuy  
                    SET payment_status = $payment_status
                    WHERE payment_id ='$payment_id';";
    
            $emysql = mysqli_query($conn, $esql);
            exit("GO1001");
        
        }
        elseif($action =="bankamcom5ing"){
            $sh_acc_banking_id = $decoded['sh_acc_banking_id'];

            $esql = "UPDATE acc_paybuy  
                            SET acc_banking_id = $sh_acc_banking_id
                            WHERE payment_id ='$payment_id';";
    
                            $emysql = mysqli_query($conn, $esql);
            echo"UYW" ;

        }
        elseif($action=="notusingCode999"){
            $codeNS = $decoded['promotion_code'];
            $esql = "SELECT SUM(discount) as sumsumde FROM acc_paybuy_code WHERE payment_id ='$payment_id' AND promotion_code ='$codeNS'";
                        $emysql = mysqli_query($conn, $esql);
                        $sum_bfda = mysqli_fetch_assoc($emysql);
                        $sum_bfd = $sum_bfda['sumsumde'];

                        if(!is_null($sum_bfd)){
                            $srp = "SELECT price_total FROM acc_paybuy WHERE payment_id ='$payment_id';";
                            $obd = mysqli_query($conn, $srp);
                            $fecadt = mysqli_fetch_assoc($obd);
                            $sum_bfd = $sum_bfd + $fecadt['price_total'] ;

                            $esql = "UPDATE acc_paybuy  
                            SET price_total = $sum_bfd
                            WHERE payment_id ='$payment_id';";
    
                            $emysql = mysqli_query($conn, $esql);
                        }

            $esql = "DELETE FROM acc_paybuy_code WHERE  payment_id ='$payment_id' AND promotion_code ='$codeNS'";
            $emysql = mysqli_query($conn, $esql);
            echo "YES";
        }
        elseif($action=="usingCode999"){

            $codeNS = $decoded['promotion_code'];

            $esql = "SELECT SUM(discount) as sumsumde FROM acc_paybuy_code WHERE payment_id ='$payment_id' AND promotion_code IN (SELECT promotion_code FROM mkt_promotion WHERE promotion_status= 0 )";
                        $emysql = mysqli_query($conn, $esql);
                        $sum_bfda = mysqli_fetch_assoc($emysql);
                        $sum_bfd = $sum_bfda['sumsumde'];

                        if(!is_null($sum_bfd)){
                            $srp = "SELECT price_total FROM acc_paybuy WHERE payment_id ='$payment_id';";
                            $obd = mysqli_query($conn, $srp);
                            $fecadt = mysqli_fetch_assoc($obd);
                            $sum_bfd = $sum_bfd + $fecadt['price_total'] ;

                            $esql = "UPDATE acc_paybuy  
                            SET price_total = $sum_bfd
                            WHERE payment_id ='$payment_id';";
    
                            $emysql = mysqli_query($conn, $esql);
                        }

            $esql = "DELETE FROM acc_paybuy_code WHERE  payment_id ='$payment_id' AND promotion_code IN (SELECT promotion_code FROM mkt_promotion WHERE promotion_status= 0 )";
            $emysql = mysqli_query($conn, $esql);

            $esql = "SELECT * FROM mkt_promotion WHERE promotion_code ='$codeNS' ";
            $emysql = mysqli_query($conn, $esql);
            $codedetail = mysqli_fetch_assoc($emysql);
            $today_dt = new DateTime(date("Y-m-d"));
            $expire_dt = new DateTime($codedetail['duedate_end']);


            if($codedetail['promotion_status'] && $expire_dt > $today_dt){
                // echo "NOSUS101";
                if($codedetail['cod_counting'] > 0 || $codedetail['cod_counting'] == -1){
                    // echo "NOSUS102";
                    if($codedetail['cod_counting'] > 0){
                        $esql = "UPDATE mkt_promotion
                        SET cod_counting = cod_counting-1
                        WHERE promotion_code ='$codeNS' ;";
                        $emysql = mysqli_query($conn, $esql);

                        if($codedetail['cod_counting'] - 1 == 0){
                            $esql = "UPDATE mkt_promotion
                        SET promotion_status = 0
                        WHERE promotion_code ='$codeNS' ;";
                        $emysql = mysqli_query($conn, $esql);
                        }

                    }

                    if(!$codedetail['cod_use_together']){

                        $esql = "SELECT SUM(discount) as sumsumde FROM acc_paybuy_code WHERE payment_id ='$payment_id' ";
                        $emysql = mysqli_query($conn, $esql);
                        $sum_bfda = mysqli_fetch_assoc($emysql);
                        $sum_bfd = $sum_bfda['sumsumde'];

                        if(!is_null($sum_bfd)){
                            $srp = "SELECT price_total FROM acc_paybuy WHERE payment_id ='$payment_id';";
                            $obd = mysqli_query($conn, $srp);
                            $fecadt = mysqli_fetch_assoc($obd);
                            $sum_bfd = $sum_bfd + $fecadt['price_total'] ;

                            $esql = "UPDATE acc_paybuy  
                            SET price_total = $sum_bfd
                            WHERE payment_id ='$payment_id';";
    
                            $emysql = mysqli_query($conn, $esql);
                        }
                        
                        $esql = "DELETE FROM acc_paybuy_code WHERE payment_id ='$payment_id'";
                        $emysql = mysqli_query($conn, $sql);
                    
                    }else{
                        $esql = "SELECT SUM(discount) as sumsumde FROM acc_paybuy_code WHERE payment_id ='$payment_id' ";
                        $emysql = mysqli_query($conn, $esql);
                        $sum_bfda = mysqli_fetch_assoc($emysql);
                        $sum_bfd = $sum_bfda['sumsumde'];

                        if(!is_null($sum_bfd)){
                            $srp = "SELECT price_total FROM acc_paybuy WHERE payment_id ='$payment_id';";
                            $obd = mysqli_query($conn, $srp);
                            $fecadt = mysqli_fetch_assoc($obd);
                            $sum_bfd = $sum_bfd + $fecadt['price_total'] ;

                            $esql = "UPDATE acc_paybuy  
                            SET price_total = $sum_bfd
                            WHERE payment_id ='$payment_id';";
    
                            $emysql = mysqli_query($conn, $esql);
                        }

                        $esql = "DELETE FROM acc_paybuy_code WHERE payment_id ='$payment_id' AND promotion_code IN (SELECT promotion_code FROM mkt_promotion WHERE cod_use_together = 0 )";
                        $emysql = mysqli_query($conn, $sql);
        
                    }

                    if($codedetail['promotion_type'] == 'P'){
                        $discount = $price * $codedetail['discount'] / 100 ;

                        if($discount > $codedetail['cod_maximum_discount']){
                            $discount =$codedetail['cod_maximum_discount'];
                        }
                    }else{
                        $discount = $codedetail['discount'];
                    }

                   
                    $sql = "INSERT INTO acc_paybuy_code(payment_id,promotion_code,discount)  VALUES ('$payment_id','$codeNS', $discount )";
                    $mysql = mysqli_query($conn, $sql);


                    if(!is_null($discount)){
                        $srp = "SELECT price_total FROM acc_paybuy WHERE payment_id ='$payment_id';";
                        $obd = mysqli_query($conn, $srp);
                        $fecadt = mysqli_fetch_assoc($obd);
                        $sum_bfd = $fecadt['price_total'] - $discount ; 

                        $esql = "UPDATE acc_paybuy  
                        SET price_total = $sum_bfd
                        WHERE payment_id ='$payment_id';";

                        $emysql = mysqli_query($conn, $esql);
                    }

                    // $esql = "UPDATE acc_paybuy  
                    //     SET price_total = price_total-$discount
                    //     WHERE payment_id ='$payment_id';";

                    // $emysql = mysqli_query($conn, $esql);

                    // echo "SUS101";

                }

                // echo "NOSUS702";
      
               
    
               
            }

            // echo "NOSUS703";

            

        }
        elseif($action ==  "stepperqry"){
            $stepper = "<div class='col mb-3 px-5'> <div class=''> <div class='steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x'>
            <div class='step ";
            if($payment_status >= 1){
                $stepper .= " completed ";
            } 
            $stepper .= "'>";
            $stepper .= "<div class='step-icon-wrap'>
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
            $stepper .= "'> <div class='step-icon-wrap'>
                        <div class='step-icon'><i class='far fa-check-circle'></i></div>
                        </div>
                        <h4 class='step-title'>สำเร็จ</h4>
                        </div>
                        </div>
                        </div>
                        </div>";
            echo $stepper;

        }
        elseif($action == "leftcontentQ"){
            $left = '';
            switch ($payment_status) {
                case 1:
                    $left .= '
                                <div class="col ">
                                <div class="rounded border bg-light border-light">
                                <div class="card-body">
                                <div class=" ">';
                    $left .= '<h4 class="fw-bold">สินค้า/บริการ ';
                    if($payment_mode == 0){
                        $left .= '(การซื้อ/ชนะประมูล)';
                    } 
                    elseif($payment_mode == 1){
                        $left .= '(ส่วนมัดจำการจ้างงาน)';
                    }
                    elseif($payment_mode == 2){
                        $left .= '(ส่วนจ่ายค่าจ้างวานที่เหลือ)';
                    } 
                    elseif($payment_mode == 3){
                        $left .= '(การคืนเงิน)';
                    } 
                    $left .='</h4>';
                    $left .='</div>
                            <div class="row d-flex justify-content-md-start justify-content-center align-items-center">
                            <div class="col-auto mb-2  ">
                            <div class="mb-1 rounded bg-image hover-overlay ripple"
                            style="display: block;width: 170px;height: 170px;position: relative;overflow: hidden;">';

                    $sql = "SELECT file_path FROM mkt_product_file INNER JOIN pth_file ON mkt_product_file.file_id = pth_file.file_id WHERE mkt_product_file.product_id = $product_id AND mkt_product_file.show_status=1  ORDER BY mkt_product_file.show_priority;";
                    $mysql = mysqli_query($conn, $sql);
                    $pathweb = mysqli_fetch_assoc($mysql);
                    $left .='<img src="../'.$pathweb['file_path'].'"
                            style="display: block;min-width: 100%;min-height: 100%; position: absolute;top: 0;bottom: 0;left: 0;right: 0;"
                            class="" alt="..." />';
                    $left .='<div class="mask "  style="background-color: rgba(0, 0, 0, 0.6);">
                            <div class="d-flex justify-content-center align-items-center h-100">
                            <p class="text-white mb-0"> <a target="_blank" href=';
                    $left .='"#"';
                    $left .='> <span class="badge badge-light">ดูโพสต์ <i class="fas fa-share"></i></span></a></p>
                            </div>
                            </div>
                            </div>
                            <div>
                            </div>
                            </div>
                            <div class="col-auto">
                            <h4 id="name_of_product" class="card-title text-secondary">';
                    $left   .= $product_name .'</h4>';   
                    
                    $sql = "SELECT * FROM mkt_product_tag INNER JOIN dict_tags ON mkt_product_tag.tags_id =dict_tags.tags_id WHERE product_id=$product_id";
                    $mysql_tags = mysqli_query($conn, $sql);
                    while ($tags = mysqli_fetch_assoc($mysql_tags) ){
                        $left  .= ' <span class="badge rounded-pill badge-primary">#'.$tags['tags_label'].'</span> ';
                   
                    }
                    $left .= '<p>'. $description. '</p>';
                    $left .= '<h3><span class="fw-bold">ราคา ';
                    $left .= '<span id="product_price">'. number_format($price, 2, '.', ',') .' บาท</span></h3>';
               
                    // <button type="button" class="btn btn-primary" data-mdb-toggle="modal"
                    //     data-mdb-target="#staticBackdrop">ดูตัวอย่างไฟล์</button>
                    $left .= '</div></div></div></div>';
                    
                    $left .= '<div class="rounded border bg-light border-light mt-5">
                                <div class="card-body">
                                <div>
                                <h4 class="fw-bold">ส่วนลด</h4>
                                </div>
                               <div>';
                    // $left .= '<div class="form-outline mt-3">
                    //             <input type="search" id="form1" class="form-control" aria-describedby="textExample1" />
                    //             <label class="form-label" for="form1">คลิกเพื่อกรอกรหัสส่วนลด</label>
                    //             </div>
                    //             </div>';

                    $left .=  '<div class="form-floating mt-3 mb-3">
<input type="search" class="form-control  bg-transparent" id="floatingInput" placeholder="CODE">
<label for="floatingInput">กรอกรหัสส่วนลด</label>
</div>';
                    $left .= '<div class="mt-5 ">
                            <h6 class="fw-bold">ส่วนลดที่สามารถใข้งานได้</h6>
                            </div>';
                    $left .= '<div>';

                    $esql = "SELECT SUM(discount) as sumsumde FROM acc_paybuy_code WHERE payment_id ='$payment_id' AND  promotion_code IN (SELECT promotion_code FROM mkt_promotion WHERE promotion_status=0 ) ";
                        $emysql = mysqli_query($conn, $esql);
                        $sum_bfda = mysqli_fetch_assoc($emysql);
                        $sum_bfd = $sum_bfda['sumsumde'];

                        if(!is_null($sum_bfd)){
                            $srp = "SELECT price_total FROM acc_paybuy WHERE payment_id ='$payment_id';";
                            $obd = mysqli_query($conn, $srp);
                            $fecadt = mysqli_fetch_assoc($obd);
                            $sum_bfd = $sum_bfd + $fecadt['price_total'] ;

                            $esql = "UPDATE acc_paybuy  
                            SET price_total = $sum_bfd
                            WHERE payment_id ='$payment_id';";
    
                            $emysql = mysqli_query($conn, $esql);
                        }

                       

                    $esql = "DELETE FROM acc_paybuy_code  WHERE  payment_id ='$payment_id' AND  promotion_code IN (SELECT promotion_code FROM mkt_promotion WHERE promotion_status=0 )";
                    $emysql = mysqli_query($conn, $esql);

                    $esql = "SELECT * FROM mkt_promotion WHERE promotion_status= 1 ";
                    $emysql = mysqli_query($conn, $esql);
                    while($rmo = mysqli_fetch_assoc($emysql)){
                        $today_dt = new DateTime(date("Y-m-d"));
                        $expire_dt = new DateTime($rmo['duedate_end']);
                        if($expire_dt < $today_dt){
                            $codemeda =$rmo['promotion_code'];
                            $esql = "UPDATE mkt_promotion
                                    SET promotion_status = 0
                                    WHERE promotion_code ='$codemeda';";
                                    $emysql = mysqli_query($conn, $esql);
                    }
                }
                    
                    $sql = "SELECT * FROM mkt_promotion WHERE auto_use_free=1 AND promotion_status=1";
                    $mysql_codeP = mysqli_query($conn, $sql);
                    
                    if(mysqli_num_rows($mysql_codeP) > 0){
                        while ($promo = mysqli_fetch_assoc($mysql_codeP) ){
                        $left  .= '
                                    <div class="card mb-3" style="">
                                        <div class="row g-0 d-flex align-items-center  ">
                                            <div class="col-md-2  rounded-start align-self-stretch"
                                    style="background: rgb(255,135,179);background: linear-gradient(125deg, rgba(255,135,179,1) 0%, rgba(199,49,198,1) 28%, rgba(69,233,198,1) 51%, rgba(32,198,232,1) 100%)">
                                            </div>
                                            <div class="col row d-flex align-items-center justify-content-evenly ">
                                                <div class="card-body col-auto col-md col-lg-auto ">
                                                    <p class="card-text">
                                                        <div class="d-flex ่ align-items-center">';

                                                        if($promo['promotion_type'] == 'P'){
                                                            $left  .= '<i class="fas fa-percentage fa-3x"></i>';
                                                        }elseif($promo['promotion_type'] == 'D'){
                                                        $left  .='<i class="fas fa-minus fa-3x"></i>';
                                                        }

                                                        $left  .=     '<div class="ms-3">
                                                                <p class="fw-bold mb-1">'.$promo['name_promotion'].'</p>
                                                                <p class="text-muted mb-0">';
                                                        if($promo['promotion_type'] == 'P'){
                                                            $left  .= $promo['detail'].' ส่วนลด '.$promo['discount'].'% เมื่อใช้ขั้นต่ำ '.$promo['cod_minimum_price'].'บาท ลดสูงสุดถึง  '.$promo['cod_maximum_discount'].' บาท';
                                                        }elseif($promo['promotion_type'] == 'D'){
                                                            $left  .= $promo['detail'].' ส่วนลด '.$promo['discount'].'บาท เมื่อใช้ขั้นต่ำ '.$promo['cod_minimum_price'].'บาท ลดสูงสุดถึง  '.$promo['cod_maximum_discount'].' บาท';
                                                                }
                                                        if($promo['cod_use_together']){
                                                            $left  .= ' *โค้ดสามารถใช้ร่วมกับรายการส่วนลดอื่นได้';
                                                        }else {
                                                            $left  .= ' *โค้ดไม่สามารถใช้ร่วมกับรายการส่วนลดอื่นได้';
                                                        }
                                                                
                                                        $left  .= '</p>
                                                            </div>
                                                        </div>
                                                        <small class="text-danger"><i class="far fa-clock"></i> หมดอายุวันที่ '.$promo['duedate_end'].'</small>
                                                    </p>
                                                </div>
                                                <div class="col-auto ms-auto me-auto mb-3 px-5">';
                                                $sqA = "SELECT * FROM acc_paybuy_code WHERE payment_id ='$payment_id'";
                                                $mysql_codePEW = mysqli_query($conn, $sqA);
                                                if(mysqli_num_rows($mysql_codePEW) > 0){
                                                    while ($promoRW = mysqli_fetch_assoc($mysql_codePEW) ){
                                                            if($promoRW['promotion_code'] == $promo['promotion_code']){

                                                                $left  .=      '<button type="button" class="btn btn-outline-danger" name="codepick" data-mdb-ripple-color="red" value="'.$promo['promotion_code'].'" onclick="unpickupCodeDiscount('."'".$promo['promotion_code']."',"."'".$payment_id."'".')">ไม่เลือก</button>';


                                                            }else{

                                                                $left  .=      '<button type="button" class="btn btn-outline-success" name="codepick" data-mdb-ripple-color="green" value="'.$promo['promotion_code'].'" onclick="pickupCodeDiscount('."'".$promo['promotion_code']."',"."'".$payment_id."'".')">เลือก</button>';

                                                            }
                                                    }
                                                }else{
                                                    $left  .=      '<button type="button" class="btn btn-outline-success" name="codepick" data-mdb-ripple-color="green" value="'.$promo['promotion_code'].'" onclick="pickupCodeDiscount('."'".$promo['promotion_code']."',"."'".$payment_id."'".')">เลือก</button>';

                                                }
                                                
                                              
                                              $left  .= '    </div>
                                            </div>
                                        </div>
                                    </div>
                        ';
                        }
                    }else{
                        $left .= '<div class="mt-5 ">
                        <h6 class="fw-bold">ไม่มีเลยวันนี้</h6>
                        </div>';
                    }

                    $left .= '<div class="d-flex justify-content-center p-5">
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
                            </div>';
                    $left .= '</div> </div></div></div>';
                    break;
                case 2:
                    $sql = "SELECT * FROM acc_banking AS A
                    INNER JOIN dict_banks AS B
                    ON ( A.bank_id = B.bank_id ) 
                    INNER JOIN pth_file AS C
                    ON ( B.bank_pic =  C.file_id)
                    WHERE  A.user_id = $creator_id  AND A.verify_status <> 2
                    ;";
                    $mysql_ACT = mysqli_query($conn, $sql);
                    
                    $left .= '<div class="col ">
                    <div class="rounded border bg-light border-light ">
                        <div class="card-body">
                            <div class=" ">
                                <h4 class="fw-bold">รูปแบบการชำระ</h4>
                                <h5 class="fw-subtitle">รองรับการชำระภายในราชอาณาไทยเท่านั้น</h5>
                            </div>
            
                            <div class="mt-5 ">
                                <h6 class="fw-bold">ที่สามารถเลือกได้</h6>
            
                            </div>
                            <div class="">';
                            if(mysqli_num_rows($mysql_ACT) > 0){
                                while ($accbank = mysqli_fetch_assoc($mysql_ACT) ){
                    
                      $left .='  <div class="card mb-3 " for="'.$accbank['acc_bank_id'].'">
                                    <div class="row g-0 d-flex align-items-center  ">
                                        <div class="rounded-start align-self-stretch"
                                            style="width:12px;background-color:'.$accbank['bank_color_hex'].';">
                                        </div>
                                        <div class="col row d-flex align-items-center justify-content-evenly ">
                                            <div class=" col-auto col-md col-lg-auto ">
                                                <p class="card-text">
                                                    <div class="d-flex row align-items-center">
                                                        <div class="col-md-3  pb-2 pb-md-0">
                                                            <img src="'.$accbank['file_path'].'"
                                                                class="img img-fluid" />
                                                        </div>
                                                        <div class="col-auto ms-3">
                                                            <h5 class="fw-bold mb-1">'.$accbank['bank_account_no'];
                                                            
                                                            if($accbank['verify_status']==3){
                                                                $left .=    ' <span class="text-success"
                                                                    data-mdb-toggle="tooltip"
                                                                    title="บัญชีนี้ส่งข้อมูลยืนยันแล้ว"><i
                                                                        class="far fa-check-circle "></i> </span>';

                                                            }
                                                            $left .=   '</h5>
                                                            <p class="text-muted mb-0">ชื่อ '.$accbank['bank_account_name'].'</p>
                                                            <p class="text-muted mb-0">'.$accbank['bank_label'].' ('.$accbank['bank_info'].')</p>
                                                        </div>
                                                        <div class="col-1 ms-auto me-auto "> </div>
                                                        </div><div class="col-auto m-3">';

                                                        if(isset($acc_banking_id )){
                                                            
                                                            if($acc_banking_id == $accbank['acc_bank_id']){
                                                                $left .=   '<button type="button" class="btn btn-outline-success btn-lg" data-mdb-ripple-color="green" >กำลังเลือกอยู่</button>';
                                                                
                                                            }else{

                                                                $left .=   '<button type="button" class="btn btn-primary btn-lg" data-mdb-ripple-color="dark" onclick="choseingstar('.$accbank['acc_bank_id'].')">เลือก</button>';
                                                        
                                                            }
                                                        }else{

                                                            $left .=   '<button type="button" class="btn btn-primary btn-lg" data-mdb-ripple-color="dark" onclick="choseingstar('.$accbank['acc_bank_id'].')">เลือก</button>';

                                                        }
                                                        
                                                        
                                                                $left .= '
                                                       

                                                    
                                                    
                        
                           
                    </div>

                                                        
            
                                                </p>
            
                                            </div>
            
                                        </div>
            
                                    </div>
            
                                </div>';

                                }
                            }
            
                            
            
                    $left .=' </div> </div></div></div>';
                    break;
                case 3:
                    $left  .= '<div class="col ">
                    <div class="rounded border bg-light border-light">
                        <div class="card-body">
                            <div class=" ">
                                <h4 class="fw-bold">ยืนยันการชำระเงิน</h4>
                                <h5 class="fw-subtitle">เวลาที่เหลือ -:-:- Hrs</h5>
                            </div>


                            <div class="">';
                            $sql = "SELECT * FROM acc_banking AS A
                            INNER JOIN dict_banks AS B
                            ON ( A.bank_id = B.bank_id ) 
                            INNER JOIN pth_file AS C
                            ON ( B.bank_pic =  C.file_id)
                            WHERE  A.acc_bank_id = $acc_banking_id;";
                            $mysql_ACT = mysqli_query($conn, $sql);
                            $accbank = mysqli_fetch_assoc($mysql_ACT);

                            $left  .= '<div class="card mb-3" >
                                    <div class="row g-0 d-flex align-items-center  ">
                                        <div class="rounded-start align-self-stretch"
                                            style="width:12px;background-color:'.$accbank['bank_color_hex'].';">
                                        </div>
                                        <div class="col row d-flex align-items-center justify-content-evenly ">
                                            <div class=" col-auto col-md col-lg-auto ">
                                                <p class="card-text">
                                                    <div class="d-flex row align-items-center">
                                                        <div class="col-md-3  pb-2 pb-md-0">
                                                            <img src="'.$accbank['file_path'].'"
                                                                class="img img-fluid" style="" />
                                                        </div>
                                                        <div class="col-auto ms-3">
                                                            <h5 class="fw-bold mb-1">'.$accbank['bank_account_no'];
                                                            
                                                            if($accbank['verify_status']==3){
                                                                $left .=    ' <span class="text-success"
                                                                    data-mdb-toggle="tooltip"
                                                                    title="บัญชีนี้ส่งข้อมูลยืนยันแล้ว"><i
                                                                        class="far fa-check-circle "></i> </span>';

                                                            }
                                                            $left .=   '</h5>
                                                            <p class="text-muted mb-0">ชื่อ '.$accbank['bank_account_name'].'</p>
                                                            <p class="text-muted mb-0">'.$accbank['bank_label'].' ('.$accbank['bank_info'].')</p>
                                                        </div>
                                                    </div>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                           $left  .= ' </div>
                            <div class="mt-4">
                                <h4>กรอกข้อมูล</h4>
                                <div class="my-3">
                                    <label class="" for="textanou">แจ้งเพิ่มเติม</label>
                                    <textarea class="form-control" id="textanou" aria-label="With textarea"></textarea>

                                </div>
                                <!-- <div class="my-3">
                                    <label class="" for="fd">วันที่ชำระเงิน</label>
                                    <input type="text" class="form-control date datepicker-input" id="fd" name="foo">
                                </div> -->
                                <div class="my-3">
                                    <label class="" for="date">วันที่ชำระเงิน</label>
                                    <input type="date" class="form-control date datepicker-input" id="date" name="fodo">
                                </div>
                                <div class="my-3">
                                    <label class="" for="time">เวลาที่ชำระเงิน</label>
                                    <input type="time" class="form-control " id="time" name="foot" step="2">
                                </div>
                                <div class="my-3">
                                    <label class="" for="ref1">รหัสทำรายการ/เลขที่ทำรายการ (ref 1)</label>
                                    <input type="text" class="form-control " id="ref1" name="wd">
                                </div>
                                <div class="my-3">
                                    <label class="" for="ref2">หมายเลขอ้างอิง (ref 2) * ธ.กรุงเทพ</label>
                                    <input type="text" class="form-control " id="ref2" name="wd">
                                </div>
                                <div class="my-3">
                                    <label class="" for="pic_slip">ส่งเอกสารยืนยัน (ภาพสลีป)</label>
                                    <input type="file" class="form-control" id="pic_slip" accept=".jpg,.png"
                                        name="file_id" onchange="preview()" />
                                </div>
                                <div class="my-3">
                                    <img id="frame" class="img-fluid img-thumbnail mx-auto rounded mx-aut">
                                </div>


                            </div>



                        </div>
                    </div>
                </div>';
                    break;
                case 4:
                    echo "Your favorite color is red!";
                    break;
                case 5:
                    echo "Your favorite color is blue!";
                    break;
                case 6:
                    echo "Your favorite color is green!";
                    break;
                case 7:
                    echo "Your favorite color is green!";
                    break;
                default:
                    echo "Your favorite color is neither red, blue, nor green!";
                    break;
            }
            echo $left;
        }
        elseif($action == "RightcontentQ"){
            $rightQ = '';
            $sql_p = "SELECT * FROM acc_user WHERE user_id=$payer_id ";   
            $sql_c = "SELECT * FROM acc_user WHERE user_id = $creator_id "; 
            $mysql_p = mysqli_query($conn, $sql_p);      
            $mysql_c = mysqli_query($conn, $sql_c);        
            if($payment_mode == 3){
                $payer_detail = mysqli_fetch_array($mysql_c, MYSQLI_ASSOC);
                $earner_detail = mysqli_fetch_array($mysql_p, MYSQLI_ASSOC);
            }else{
                $payer_detail = mysqli_fetch_array($mysql_p, MYSQLI_ASSOC);
                $earner_detail = mysqli_fetch_array($mysql_c, MYSQLI_ASSOC);
            }

            $rightQ .= '
                            <div class="card-body">
                                <div >
                                    <h4 class="fw-bold">การซื้อขายระหว่าง</h4>
                                </div>
                            <div class="stepper d-flex flex-column mt-1 ml-2 ">
                                <div class="d-flex mb-1">
                                    <div class="d-flex flex-column align-items-center" style="width:60px">
                                        <div class="mb-1" style="width:60px; height:120px; position:relative;">';
                                    
            $rightQ .=  '<img src="https://ui-avatars.com/api/?name='.$payer_detail['first_name'].'+'.$payer_detail['last_name'].'&background=random"
                            style="width: 100%; height: 100%; display: block; object-fit: cover; position: absolute; "
                            class="img img-responsive full-width rounded-circle" alt="...">';
            $rightQ .=  '               </div>
                                    <div class="line h-100 "></div>
                                </div>
                                <div class="ms-3">
                                    <h5 class="text-dark">คุณ '.$payer_detail['first_name'].' '.$payer_detail['last_name'].'</h5>
                                    <p class="lead text-muted pb-3">ในฐานะชำระเงิน</p>
                                </div>
                            </div>';
            $rightQ .= '    <div class="d-flex mb-1">
                                <div class="d-flex flex-column pr-4 align-items-center">
                                    <div class="mb-1" style="width:60px; height:60px; position:relative;">';
            $rightQ .= '<img src="https://ui-avatars.com/api/?name='.$earner_detail['first_name'].'+'.$earner_detail['last_name'].'&background=random"
                            style="width: 100%; height: 100%; display: block; object-fit: cover; position: absolute; "
                            class="img img-responsive full-width rounded-circle" alt="...">';
            $rightQ .= '            </div>
                                    <div class="line h-100 d-none"></div>
                                    </div>
                                <div class="ms-3">
                                    <h5 class="text-dark">คุณ '.$earner_detail['first_name'].' '.$earner_detail['last_name'].'</h5>
                                    <p class="lead text-muted pb-3">ในฐานะรับเงิน</p>
                                </div>
                            </div>';
                        // </div>
                    // </div>';
                    // </div>';
            
        
            echo $rightQ;
        }
        elseif($action == "bannerLiQ"){

            $rightQ = "";
            if($payment_mode != 3){
                if ($co_right_mode){
                     $rightQ.= '<div class="alert alert-success d-flex align-items-center" role="alert">
                                <div><i class="fas fa-copyright"></i> สินค้านี้ได้รับอนุญาตให้นำไปใช้ในเชิงพาณิชย์</div>
                                </div>'; 
                }else{
                    $rightQ .= '<div class="alert alert-danger d-flex align-items-center" role="alert">
                                <div> <i class="fas fa-exclamation-triangle"></i> สินค้านี้ไม่อนุญาตให้นำไปใช้ในเชิงพาณิชย์</div>
                                </div>'; 
                }
            }else{
                $rightQ .= '<div class="alert alert-warning d-flex align-items-center" role="alert">
                                <div> <i class="fas fa-exclamation-triangle"></i> ระบบคืนเงิน กำลังทดลอง !</div>
                                </div>'; 
            }
            echo $rightQ;
        }
        elseif($action == "RightSummary"){
            $rightQL = "";
            $rightQL .= '<div class="shadow-2-strong  card-body p-4 rounded-5 border-1 border border-warning">
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
                                        <td>';
             $rightQL .= '                  <p class="fw-normal mb-1 text-danger"><i class="fas fa-caret-up "></i> ยอดรวมที่ต้องชำระ</p>
                                            <p class="text-muted mb-0">';
             if($payment_mode == 0){
                $rightQL .= 'ค่าชำระสินค้าจากการซื้อหรือชนะประมูล';
            } 
            elseif($payment_mode == 1){
                $rightQL .= 'ค่าชำระจากส่วนมัดจำการจ้างงาน';
            }
            elseif($payment_mode == 2){
                $rightQL .= 'ค่าชำระจากส่วนค่าจ้างวานที่เหลือ';
            } 
            elseif($payment_mode == 3){
                $rightQL .= 'การชำระเงินคืน';
            } 
            $rightQL .= '                   </p>
                                        </td>
                                        <td class="align-right text-end fw-bold text-danger"><i class="fas fa-plus"></i>';
            $rightQL .=  number_format($price, 2, '.', ',') ;        
            $rightQL .= '               </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="fw-normal mb-1 text-success"><i class="fas fa-caret-down "></i>
                                                ส่วนลดรวม</p>
                                            <p class="text-muted mb-0">ตามที่เลือกไว้</p>
                                        </td>
                                        <td class="align-right text-end fw-bold text-success"><i
                                                class="fas fa-minus"></i> ';
            $rightQL .=  number_format($price-$total_price, 2, '.', ',') ;
            $rightQL .= '               </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4 class="fw-bold mb-1">Total</h4>
                                        </td>
                                        <td class="align-right text-end">
                                            <h4 class=" fw-bold text-decoration-underline">';
            $rightQL .=  number_format($total_price, 2, '.', ',') ;
            $rightQL .= '                   </h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>';

            echo $rightQL;
        }elseif($action == "LowBtnShort"){

            $bott = "";
            // $bott .= '<div class="mt-5 m-2 w-100" style="height:1px;background-color: black;">
            // </div>';
    
            $bott .= '<div class=" p-4 ">
                <div class="row d-flex justify-content-center">
                    <div class="col-auto mb-3">
                        <button type="button" class="btn btn-dark btn-lg"';
                        

                        switch ($payment_status) {
                            case 1:
                                break; 
                            case 2:
                                if(is_null($acc_banking_id) || empty($acc_banking_id) ){
                                    $bott .= "disabled";
                                }
                                $bott .= 'onclick="gotonextsection('."'".$payment_id."'".","."'gotonext406'".')"';
                                break; 
                            case 3:
                                if(is_null($acc_banking_id) || empty($acc_banking_id) ){
                                    $bott .= "disabled";
                                }
                                $bott .= 'onclick="gotonextsection('."'".$payment_id."'".","."'gotonext406'".')"';
                                break;
                            case 4:
                                $bott .= 'onclick="sendformMata('."'".$payment_id."'".","."'Qus1'".')"';
                                break;
                            case 5:
                                $bott .= 'onclick="gotonextsection('."'".$payment_id."'".","."'gotonext406'".')"';
                                break;
                            case 6:
                                $bott .= 'onclick="gotonextsection('."'".$payment_id."'".","."'gotonext406'".')"';
                                break;
                            default:
                                $bott .= 'onclick="gotonextsection('."'".$payment_id."'".","."'gotonext406'".')"';



                        }                       
                        

                        $bott .=  '>ถัดไป</button>
                    </div>
                    <div class="col-auto mb-3">';
                    $bott .=  '<button type="button" class="btn btn-outline-dark btn-lg"';
                    if($payment_status < 2){
                        $bott .= "disabled ";
                    }
                    $bott .= 'onclick="gotonextsection('."'".$payment_id."'".","."'gotoback406'".')"';
                    $bott .= '>ย้อนกลับ</button>
                    </div>
                    <div class="col-auto mb-3">
                        <button type="button" class="btn btn-danger btn-lg"
                            data-mdb-ripple-color="dark">ยกเลิก</button>
                    </div>
                </div>
            </div>';

            echo $bott;
    


             
        }







    
        // $sql = "SELECT * FROM acc_paybuy WHERE payment_id  =  '$payment_id'";
        // $mysql = mysqli_query($conn, $sql);
        // $row = mysqli_fetch_row($mysql);
        //   $payment_status = $row[4];
        //   $product_id = $row[1];
        //   $payer_id = $row[3];
        // $row = mysqli_fetch_all($mysql, MYSQLI_ASSOC);
        // $reply = json_encode($row);
        // mysqli_free_result($row);
    
    } 
 }

// if($action == 'qpagedt'){
//     include_once("connect_db.php");
//     // $conn

//     $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

//     if ($contentType === "application/json") {
//       $content = trim(file_get_contents("php://input"));
//       $decoded = json_decode($content, true);    
//       $payment_id = $decoded['payment_id']; 

  
//       $sql = "SELECT * FROM acc_paybuy WHERE payment_id  =  '$payment_id'";
//       $mysql = mysqli_query($conn, $sql);
//       $row = mysqli_fetch_row($mysql);
//         $payment_status = $row[4];
//         $product_id = $row[1];
//         $payer_id = $row[3];
//       $row = mysqli_fetch_all($mysql, MYSQLI_ASSOC);
//       $reply = json_encode($row);
      // mysqli_free_result($row);
  
    // }  
    // header("Content-Type: application/json; charset=UTF-8");
    // echo $reply;
    



           
           
            
    






// echo $data;


// echo '<div class="form-floating mb-3">
// <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
// <label for="floatingInput">Email address</label>
// </div>';






//     mysqli_close($conn);

// }

// #stap


// #endregion


?>