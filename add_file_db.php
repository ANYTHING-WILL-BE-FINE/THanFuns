<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include("src/php/connect_db.php");  

$creator_id = $_POST['creator_id'];
$product_name = $_POST['creator_id'];
$description = $_POST['description'];
$tags_label = $_POST['tags_label'];

$file_id = (isset($_POST['file_id']) ? $_POST['file_id'] : '');

//ฟังก์ชั่นวันที่
    date_default_timezone_set('Asia/Bangkok');
	$date = date("Ymd");	
//ฟังก์ชั่นสุ่มตัวเลข
    $numrand = (mt_rand());
//เพิ่มไฟล์
$upload=$_FILES['file_id'];
if($upload !='') {   //not select file
        //โฟลเดอร์ที่จะ upload file เข้าไป 
        $path="photo/";  

        //เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
        $type = strrchr($_FILES['file_id']['name'],".");
            
        //ตั้งชื่อไฟล์ใหม่
        $newname = 'PVS'.$numrand.$date.$type;
        $path_copy=$path.$newname;
        $path_link="file_id/".$newname;

        //คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
        move_uploaded_file($_FILES['file_id']['tmp_name'],$path_copy);  	
	}
	// เพิ่มไฟล์เข้าไปในตาราง uploadfile
		$sql = "INSERT INTO pth_file (file_id) 
		VALUES('$newname')";
		
		$mysql = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
	
	mysqli_close($conn);
	// javascript แสดงการ upload file
	
    exit;

	if($mysql){
	echo "<script type='text/javascript'>";
	echo "alert('Upload File Succesfuly');";
	echo "window.location = 'form.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to upload again');";
	echo "</script>";
}
?>