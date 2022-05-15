<?php

include_once("connect_db.php");

$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

  if ($contentType === "application/json") {  } 
  else {
      exit("NO");
  }

$content = trim(file_get_contents("php://input"));
$decoded = json_decode($content, true);    
$user_id = $decoded['user_id'];
$payment_id = $decoded['payment_id'];
$action = $decoded['action']; 

if($action == "payment"){

    if(is_null($payment_id)){
        exit("NO");
    }

   

    $sql = "SELECT * FROM acc_paybuy WHERE payment_id  =  '$payment_id' ";
    $mysql = mysqli_query($conn, $sql);
    if ($mysql) 
	{ 
		// it return number of rows in the table. 
		$row = mysqli_num_rows($mysql); 

        
        if($row){
            $paybuy = mysqli_fetch_assoc($mysql);
            $product_id = $paybuy['product_id'];
            $commission_id = $paybuy['commission_id'];

            $sql = "SELECT * FROM acc_user WHERE user_id  =  $user_id AND user_role='A' ";
            $mysql = mysqli_query($conn, $sql);
            $row = mysqli_num_rows($mysql);
            
            if($row){
                exit("ADMIN");
            }

            if(is_null($product_id)){
                #com
                $sql = "SELECT * FROM mkt_commission WHERE commission_id = $commission_id AND creator_id = $user_id ";
                $mysql = mysqli_query($conn, $sql);
                $row = mysqli_num_rows($mysql); 
                if($row){
                    exit("CRETOR");
                }
            }
            else {
                $sql = "SELECT * FROM mkt_product WHERE product_id  = $product_id AND creator_id = $user_id ";
                $mysql = mysqli_query($conn, $sql);
                $row = mysqli_num_rows($mysql); 
                if($row){
                    exit("CRETOR");
                }
            }
            
            $sql = "SELECT * FROM acc_paybuy WHERE payment_id  =  '$payment_id' AND payer_id = $user_id ";
            $mysql = mysqli_query($conn, $sql);
            $row = mysqli_num_rows($mysql); 

            if($row){
                exit("PAYER");
            }
        }
        else{
            exit("NO");
        }

        

        exit("NO");

		
		// close the result. 
		// mysqli_free_result($result); 
	} 
    else {
        exit("NO");
    }
    
}
else{
    exit("NO");
}
mysqli_close($conn);

?>