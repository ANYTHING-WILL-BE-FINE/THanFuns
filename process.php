<?php include_once("src/php/connect_db.php");?>
<?php

$action = $_POST['action'];

if($action == "insertCommission") {

  $user_id = $_POST['user_id'];
  $creator_id = $_POST['creator_id'];
  $request_price = $_POST['request_price'];
  $job_color = $_POST['job_color'];
  $job_scale = $_POST['job_scale']; 
  $job_description = $_POST['job_description'];
  // $category = $_POST['category'];
  $job_mature = $_POST['job_mature'];
  $job_private = $_POST['job_private'];
  // $commission_id = $_POST['commission_id'];
 $result = mysqli_query($conn, 'SELECT COUNT(commission_id) AS value_sum FROM mkt_commission'); 
          $row = mysqli_fetch_assoc($result); 
          $sum = $row['value_sum']+1;
          $commission_id = 'C'.sprintf('%08d', $sum);
          // echo  $commission_id;
  $resultt = mysqli_query($conn, 'SELECT COUNT(payment_id) AS value_sum FROM acc_paybuy'); 
          $row = mysqli_fetch_assoc($resultt); 
          $sum = $row['value_sum']+1;
          $payment_id = 'PT'.sprintf('%08d', $sum);
          // echo  $payment_id;
  $first_pay = $_POST['first_pay'];
  $job_co_right_mode = $_POST['job_co_right_mode'];
  $datetime_limit = $_POST['datetime_limit'];
  $commission_status = $_POST['commission_status'];
 

  $sql = "INSERT INTO mkt_commission(commission_status,user_id,creator_id,request_price,job_color,job_scale,job_description,job_mature,job_private,commission_id,first_pay,job_co_right_mode,datetime_limit)
   VALUES ($commission_status,$user_id,$creator_id,$request_price,$job_color,$job_scale,'$job_description',$job_mature,$job_private,'$commission_id',$first_pay,$job_co_right_mode,'$datetime_limit')";
  $sqll="INSERT INTO acc_paybuy(payment_id,commission_id,payer_id,payment_mode,price_total)
  VALUE ('$payment_id','$commission_id',$user_id,1,$first_pay)";
  $mysql = mysqli_query($conn, $sql);
  $mysql = mysqli_query($conn, $sqll);
  if ($mysql === TRUE) {
    echo "New record has been added successfully !";
    // echo  $commission_status;
 } else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
 }
}
  
else {

    //  while ($row = mysqli_fetch_assoc($mysql)) {
    //      echo "<h5>Table: {$row['tags_label']} </h5>";
    // }
  }

    mysqli_close($conn);
    
?>
