<?php include("src/php/connect_db.php");?>
<?php
    // print_r($_POST)
    $file_id = $_POST['file_id'];
    // $product_name = $_POST[product_name];
    // $description = $_POST[description];
    // $tags_label = $_POST[tags_label];
    // $label = $_POST[label];
    // $mature_mode = $_POST[mature_mode];
    // $sale_mode = $_POST[sale_mode];

    mysqli_query($conn, "INSERT INTO pth_file (file_path)
                                VALUE ('$file_id')");
?>
