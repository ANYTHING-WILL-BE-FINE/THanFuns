<?php include("src/php/connect_db.php"); ?>
<?php
    $sql = "SELECT * FROM mkt_commission";
    $mysql = mysqli_query($conn, $sql);
    while( $result= mysqli_fetch_assoc($mysql)){
        echo "<h1>".$result['commission_id']."</h1>";
    }
    // $result= mysqli_fetch_assoc($mysql)
    //     echo $result;

?>
    
    