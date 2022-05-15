<?php include_once("src/php/connect_db.php");?>
<?php

$action = $_POST['action'];

if($action == "update") {

  $commission_id = $_POST['commission_id'];
  $commission_status = $_POST['commission_status'];
 

  $sql = " UPDATE mkt_commission SET commission_status = $commission_status WHERE commission_id = '$commission_id' ";
  $mysql = mysqli_query($conn, $sql);
  if ($mysql === TRUE) {
    echo "New record has been added successfully !";
    // echo  $commission_status;
 } else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
 }
}

if($action == 'status'){
  
  $commission_id = $_POST['commission_id'];
  $commission_status = $_POST['commission_status'];

}

    mysqli_close($conn);
    
?>
