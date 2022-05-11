<?php include("src/php/connect_db.php");?>
<?php

if(isset($_POST['file_path']))
{    
     $file_path = $_POST['file_path'];
     $sql = "SELECT*FROM pth_file";
     $mysql = mysqli_query($conn, $sql);
     if ($mysql) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }

     while ($row = mysqli_fetch_row($mysql)) {
        echo "<h5>Table: {$row['file_path']} </h5>";
    }

     mysqli_close($conn);
}


    // // print_r($_POST)
    // $file_path = $_POST['file_path'];
    // // $product_name = $_POST[product_name];
    // // $description = $_POST[description];
    // // $tags_label = $_POST[tags_label];
    // // $label = $_POST[label];
    // // $mature_mode = $_POST[mature_mode];
    // // $sale_mode = $_POST[sale_mode];

    // mysqli_query($conn, "INSERT INTO pth_file (file_path)
    //                             VALUE ('$file_path')");

    // if(mysqli_query($conn)){
    //     echo'<p> success </p>';
    //     echo'<a href="submitvernavbar.php" > Back </a>';
    // }else{
    //     echo 'Not';
    //     echo mysqli_connect_error($conn);
        
    // }
?>
