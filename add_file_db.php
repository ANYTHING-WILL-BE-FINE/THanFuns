<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include("src/php/connect_db.php");  

$auction = $_POST['auction'];

if($auction == "submit"){

    $product_id = $_POST['product_id'];
    $creator_id = $_POST['creator_id'];
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $tags_label = $_POST['tags_label'];
    $category_id = $_POST['category_id'];
    $default_price = $_POST['default_price'];
    $access_mode = $_POST['access_mode'];
    $product_status = $_POST['product_status'];
    $mature_mode = $_POST['mature_mode'];
    $sale_mode = $_POST['sale_mode'];
    $co_right_mode =$_POST['co_right_mode'];
    $quantity = $_POST['quantity'];


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
            $sql = "INSERT INTO pth_file (file_id,user_id) 
            VALUES('$newname',$creator_id)";

            // $sql = "INSERT INTO mkt_product (product_id,creator_id,product_name,description,tags_label,category_id,default_price,access_mode,product_status,mature_mode,sale_mode,co_right_mode,quantity)
            // VALUES ($product_id,$creator_id,'$product_name','$description','$tags_label',$category_id,$default_price,4,1,1,3,2,1)";

            
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
}

?>