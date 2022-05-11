<?php

include("connect_db.php");

// $query = $conn->prepare('show tables');
// $query->execute();

// while($rows = $query->fetch(PDO::FETCH_ASSOC)){
//      var_dump($rows);
// }



$sql = "Show tables";
$result = $conn->query($sql);

if (!$result) {
    echo "DB Error, could not list tables\n";
    echo 'MySQL Error: ' . mysqli_error();
    exit;
}

while ($row = mysqli_fetch_row($result)) {
    echo "<h5>Table: {$row[0]} </h5>";
}

mysqli_free_result($result);
?>