<?php
include("src/php/connect_db.php");
// $conn <<---- 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>ThanFun</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/bootstrap.min.css">

</head>

<body>
    <form action="process.php" method="post">
        
        <div class="mt-0 mb-3">
        <label for="formtitle" class="form-label">Title</label>
            <input type="text" class="form-control" name="file_path" placeholder="Title..." required>
            <!-- <img id="frame" class="img-fluid img-thumbnail mx-auto rounded mx-auto d-block mt-3 " width="720" height="360"/> -->
        </div>

        <!-- <div class="mb-3">
            <label for="formtitle" class="form-label">Title</label>
            <input type="text" class="form-control" name="product_name" placeholder="Title..." required>
        </div>
        
        <div class="mb-3">
            <label for="fordescription" class="form-label">Description</label>
            <textarea type="text" class="form-control" name="description" rows="4" placeholder="Description..."></textarea>
        </div>
        
        <div class="mb-3">
            <label for="formtag" class="form-label">Tag</label>
            <input type="text" class="form-control" name="tags_label" placeholder="Tag #...">
        </div>
        
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select col mb-1" name="label" required>
                <option selected disabled value="">Select Category</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>

        <div class="mb-3 form-check">
            <label class="form-check-label" for="mature_mode">
            <input type="checkbox" class="form-check-input" name="mature_mode" value="mature_mode">
            Mature Content</label>
        </div>
        
        <div class="mb-3 form-check">
                    <label class="form-check-label" for="check2">
                    <input type="checkbox" class="form-check-input" id="check2" value="check2">
                    I want to sold this artwork</label>
                    <div class="check2 selectt">
                        <select class="form-select col mb-2" name="sale_mode" required>
                            <option selected disabled value="sale_mode">Auction</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            </select>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Starting Bid" aria-label="Starting Bid" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Bid" aria-label="Bid" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Autobuy" aria-label="Autobuy">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Time period" aria-label="Time period" required>
                            </div>
                        </div>
                    </div>
        </div> -->

        <button type="submit" class="btn btn-primary mb-4">Submit</button>    
    </form>

</body>
</html>
