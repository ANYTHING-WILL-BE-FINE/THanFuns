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
  $commission_id = $_POST['commission_id'];
  $first_pay = $_POST['first_pay'];
  $job_co_right_mode = $_POST['job_co_right_mode'];
  $datetime_limit = $_POST['datetime_limit'];

  $sql = "INSERT INTO mkt_commission(user_id,creator_id,request_price,job_color,job_scale,job_description,job_mature,job_private,commission_id,first_pay,job_co_right_mode,datetime_limit)
   VALUES ($user_id,$creator_id,$request_price,$job_color,$job_scale,'$job_description',$job_mature,'$job_private',$commission_id,$first_pay,$job_co_right_mode,'$datetime_limit')";
  $mysql = mysqli_query($conn, $sql);
  if ($mysql === TRUE) {
    echo "New record has been added successfully !";
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
    
// }


    // // print_r($_POST)
    // $file_path = $_POST['file_path'];
    // // $product_name = $_POST[product_name];
    // // $description = $_POST[description];
    // // $tags_label = $_POST[tags_label];
    // // $label = $_POST[label];
    // // $mature_mode = $_POST[mature_mode];
    // // $sale_mode = $_POST[sale_mode];

    // mysqli_query($conn, "INSERT INTO pth_file (file_path)
    //                             VALUE ('$file_path')");

    // if(mysqli_query($conn)){
    //     echo'<p> success </p>';
    //     echo'<a href="submitvernavbar.php" > Back </a>';
    // }else{
    //     echo 'Not';
    //     echo mysqli_connect_error($conn);
        
    // }
?>
