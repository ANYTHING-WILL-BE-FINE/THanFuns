<?php include("src/php/connect_db.php"); ?>
<?php $result = mysqli_query($conn, 'SELECT SUM(commission_id) AS value_sum FROM mkt_commission'); 
          $row = mysqli_fetch_assoc($result); 
          $sum = $row['value_sum']+1;
          ?>