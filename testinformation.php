<?php include_once("src/php/connect_db.php");?>
<?php

$action = $_POST['action'];

$con = mysqli_connect('localhost', 'a6_admin', 'cpe231_kass','acc_user');

$file = $_POST['file'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$date_birth = $_POST['date_birth'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$nickname = $_POST['nickname'];
$role = $_POST['role'];
$idnum = $_POST['idnum'];
$idcard = $_POST['idcard'];
$idpic = $_POST['idpic'];

$sql = "INSERT INTO 'acc_user' (pic_user,
                      nickname,first_name,last_name,gender,date_birth,
                      phone,address,user_role,
                      id_card,papercard_pic,user_w_card_pic,
                      )
value('$file','$nickname','$first_name','$last_name','$gender','$date_birth','$phone','$address','$role','$idnum','$idcard','$idpic')";

$rs = mysqli_query($con, $sql);
if($rs)
{
	echo "Contact Records Inserted";
}
else
{
	echo "Are you a genuine visitor?";
	
}
?>