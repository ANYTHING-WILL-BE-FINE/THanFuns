<?php
  include_once("connect_db.php");

  // Save this to json.php ------------------------------------------------------------------------
  $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

  if ($contentType === "application/json") {
    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content, true);    
    $product_id = $decoded['product_id']; 

    $sql = "SELECT * FROM mkt_product WHERE product_id=  $product_id ";
    $mysql = mysqli_query($conn, $sql);
    
    $row = mysqli_fetch_all($mysql, MYSQLI_ASSOC);
    $reply = json_encode($row);
    // mysqli_free_result($row);

  }  
  header("Content-Type: application/json; charset=UTF-8");
  echo $reply;

  mysqli_close($conn);
  

  
  // ----------------------------------------------------------------------------------------------
?>

    
    