<?php

$url = "";
$eal = substr_count($_SERVER['REQUEST_URI'], "/");
// echo $eal;
for( $i = $eal ; $i > 2 ; $i = $i-1){
    $url .= "..\\";
} 
$servername = "funs.mysql.database.azure.com";
$username = "a6_admin";
$password = "cpe231_kass";
$dbname = "thanfuns";
$conn = mysqli_init();
if (!$conn) {
    die('mysqli_init failed');
}

if (!$conn->options(MYSQLI_INIT_COMMAND, 'SET AUTOCOMMIT = 0')) {
    die('Setting MYSQLI_INIT_COMMAND failed');
}

if (!$conn->options(MYSQLI_OPT_CONNECT_TIMEOUT, 10)) {
    die('Setting MYSQLI_OPT_CONNECT_TIMEOUT failed');
}

mysqli_ssl_set($conn,NULL,NULL, $url. "src\DigiCertGlobalRootCA.crt.pem", NULL, NULL);

if (!$conn->real_connect($servername, $username, $password, $dbname, 3306, MYSQLI_CLIENT_SSL)) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}

// mysqli_real_connect($conn, $servername, $username, $password, $dbname, 3306, MYSQLI_CLIENT_SSL);
// if (mysqli_connect_errno($conn)) {
// die('Failed to connect to MySQL: '.mysqli_connect_error());
// }

// echo 'Success... ' . $conn->host_info . "\n";

// $conn->close();
?>