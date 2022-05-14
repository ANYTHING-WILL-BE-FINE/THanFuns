<?php include_once("src/php/connect_db.php");?>
<?php

$action = $_POST['action'];

if($action == "insertCommission") {
  
  $iduser = $_POST['iduser'];
  $idcreator = $_POST['idcreator'];
  $price = $_POST['price'];
  $color = $_POST['color'];
  $scale = $_POST['scale']; 
  $description = $_POST['description'];
  // $category = $_POST['category'];
  $mature = $_POST['mature'];
  $publiceArt = $_POST['publiceArt'];
  $idcommission = $_POST['idcommission'];
  $firstpay = $_POST['firstpay'];
  $mode = $_POST['mode'];
  $datetime = $_POST['datetime'];
  $extend = $_POST['extend'];
  $status = $_POST['status'];
  $sql = "INSERT INTO mkt_commission(user_id,creator_id,request_price,job_color,job_scale,job_description,job_mature,job_private,commission_id,first_pay,job_co_right_mode,datetime_limit,extend_time_status,commission_status)
   VALUES ($iduser,$idcreator,$price,$color,$scale,'$description',$mature,$publiceArt,$idcommission,$firstpay,$mode,'$datetime')";
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
