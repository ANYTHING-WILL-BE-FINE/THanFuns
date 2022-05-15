<?php include_once("src/php/connect_db.php");?>
<?php

$action = $_POST['action'];

$con = mysqli_connect('localhost', 'a6_admin', 'cpe231_kass','acc_user');

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO 'acc_user' (username,email,password
                      )
value('$username','$email','$password')";

$rs = mysqli_query($con, $sql);

?>