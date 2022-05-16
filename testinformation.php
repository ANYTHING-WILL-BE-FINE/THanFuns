<?php include_once("src/php/connect_db.php");?>
<?php

$action = $_POST['action'];

if($action == "information") {

$user_pic = $_POST['user_pic'];
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

$result = mysqli_query($conn, 'SELECT COUNT(user_id) AS value_sum FROM acc_user'); 
        $row = mysqli_fetch_assoc($result); 
        $sum = $row['value_sum']+1;
        $user_id = sprintf('%08d', $sum);
        echo  $user_id;

$sql = "INSERT INTO acc_user (user_id,pic_user,
                      nickname,first_name,last_name,gender,date_birth,
                      phone,address,user_role,
                      id_card,papercard_pic,user_w_card_pic,
                      )
value ($user_id,'$user_pic','$nickname','$first_name','$last_name','$gender','$date_birth','$phone','$address','$role','$idnum','$idcard','$idpic')";

$mysql = mysqli_query($conn, $sql);

if ($mysql === TRUE) {
  echo "New record has been added successfully !";
   // echo  $commission_status;
} else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
}


$bank_account_no = $_POST['bank_account_no'];
$bank_account_name = $_POST['bank_account_name'];
$bank_info = $_POST['bank_info'];
$bankpic = $_POST['bankpic'];

$resultt = mysqli_query($conn, 'SELECT COUNT(acc_bank_id) AS value_sum FROM acc_banking'); 
        $row = mysqli_fetch_assoc($result); 
        $sum = $row['value_sum']+1;
        $acc_bank_id = sprintf('%08d', $sum);
        echo  $acc_bank_id;

$sql2 = "INSERT INTO 'acc_banking' (acc_bank_id,bank_account_no,
                      bank_account_name,bank_info,bank_verify_pic
                      )
value($acc_bank_id,'$bank_account_no','$bank_account_name','$bank_info','$bankpic')";

$rs2 = mysqli_query($conn, $sql2);
if ($mysql === TRUE) {
  echo "New record has been added successfully !";
   // echo  $commission_status;
} else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
}
}else{}

mysqli_close($conn);

?>