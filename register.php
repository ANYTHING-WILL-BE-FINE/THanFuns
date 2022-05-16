<?php include_once("src/php/connect_db.php");?>
<?php

$action = $_POST['action'];

if($action == "register"){
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeatpassword = ['repeatpassword'];
    $result = mysqli_query($conn, 'SELECT COUNT(user_id) AS value_sum FROM acc_user'); 
        $row = mysqli_fetch_assoc($result); 
        $sum = $row['value_sum']+1;
        $user_id = sprintf('%08d', $sum);
        echo  $user_id;

        $sql = "INSERT INTO acc_user (user_id,username,email,password)
                value($user_id,'$username','$email','$password')";

        $mysql = mysqli_query($conn, $sql);
        if ($mysql === TRUE) {
          echo "New record has been added successfully !";
           // echo  $commission_status;
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }

}else{}

mysqli_close($conn);

?>