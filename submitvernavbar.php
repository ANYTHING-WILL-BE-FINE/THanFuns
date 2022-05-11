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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="src/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <link rel="stylesheet" href="submit.css">

    <style type="text/css">
        .selectt {
            color: rgb(0, 0, 0);
            padding: 0px;
            display: none;
            margin-top: 15px;
            background: rgb(255, 255, 255)
        }
        label {
            margin-right: 20px;
        }
    </style>
</head>

<body>
    <form action="process.php" method="post">

    <!--- navbar --->
    <nav class="navbar  navbar-expand-md navbar-light bg-light px-2">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="photo\logo.png" alt="" width="100" class=" d-inline-block align-text-top mb-2 me-4">
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarlogo">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarlogo">

                <ul class="navbar-nav">
                    <div class="input-group mb-lg-0" >
                        <input type="text" class="form-control" placeholder="Search..." aria-label="Search...">
                        <div class="input-group-text">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                <i data-feather="search" height="21"></i>
                                </a>
                            </li>
                        </div>
                    </div>
                </ul>
                
                <ul class="navbar-nav ms-auto mb-lg-0">
                    <li>
                        <a href="#" class="nav-link " aria-current="page">LOGOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <i data-feather="mail" ></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <i data-feather="bell"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <i data-feather="user"></i>
                        </a>
                    </li>
                    
                    <a class="btn btn-primary" href="#" role="button">SUBMIT</a>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">

            <!--- sidebar --->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light px-2 sidebar collpase ">
                <ul class="nav mt-2 d-flex flex-md-column flex-row flex-nowrap justify-content-between">
                    <li class="nav-item">
                        <a class="nav-link active mb-2" aria-current="home" href="#">
                            <i data-feather="home"></i>
                            <span class="ml-1 d-none hidden d-sm-inline">HOME</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active mb-2" aria-current="discovery" href="#">
                            <i data-feather="compass"></i>
                            <span class="ml-1 d-none hidden d-sm-inline">DISCOVERY</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active mb-2" aria-current="ranking" href="#">
                            <i data-feather="award"></i>
                            <span class="ml-1 d-none hidden d-sm-inline">RANKING</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active mb-2" aria-current="timeline" href="#">
                            <i data-feather="file-text"></i>
                            <span class="ml-1 d-none hidden d-sm-inline">TIMELINE</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="setting" href="#">
                            <i data-feather="settings"></i>
                            <span class="ml-1 d-none hidden d-sm-inline">SETTING</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!--- fixedbuttom --->
            <nav id="bottom" class="col-md-3 col-lg-2 d-md-block bottom collpase">
                <div class="bg-light fixed-bottom bottom">
                    <ul class="nav d-flex flex-md-column flex-row flex-nowrap justify-content-between">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="home" href="#">
                                <i data-feather="home"></i>
                                <span class="ml-1 d-none hidden d-sm-inline"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="discovery" href="#">
                                <i data-feather="compass"></i>
                                <span class="ml-1 d-none hidden d-sm-inline"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="ranking" href="#">
                                <i data-feather="award"></i>
                                <span class="ml-1 d-none hidden d-sm-inline"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="timeline" href="#">
                                <i data-feather="file-text"></i>
                                <span class="ml-1 d-none hidden d-sm-inline"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="setting" href="#">
                                <i data-feather="settings"></i>
                                <span class="ml-1 d-none hidden d-sm-inline"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!--- content --->
            <div class="col-md-9 col-lg-10 ml-sm-auto px-md-4 py-4">
                <div class="mt-0 mb-3">
                    <label for="formFile" class="form-label">SUBMIT YOUR ARTWORK</label>
                    <input class="form-control" type="file" accept=".jpg,.gif,.png" id="file_id" onchange="preview()" required>
                    <img id="frame" class="img-fluid img-thumbnail mx-auto rounded mx-auto d-block mt-3 " width="720" height="360"/>
                </div>
               
                <div class="mb-3">
                    <label for="formtitle" class="form-label">Title</label>
                    <input type="text" class="form-control" id="product_name" placeholder="Title..." required>
                </div>
        
                <div class="mb-3">
                    <label for="fordescription" class="form-label">Description</label>
                    <textarea type="text" class="form-control" id="description" rows="4" placeholder="Description..."></textarea>
                </div>
        
                <div class="mb-3">
                    <label for="formtag" class="form-label">Tag</label>
                    <input type="text" class="form-control" id="tags_label" placeholder="Tag #...">
                </div>
        
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select col mb-1" id="label" required>
                        <option selected disabled value="">Select Category</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
        
                <div class="mb-3 form-check">
                    <label class="form-check-label" for="mature_mode">
                    <input type="checkbox" class="form-check-input" id="mature_mode" value="mature_mode">
                    Mature Content</label>
                </div>

                <div class="mb-3 form-check">
                    <label class="form-check-label" for="check2">
                    <input type="checkbox" class="form-check-input" id="check2" value="check2">
                    I want to sold this artwork</label>
                    <div class="check2 selectt">
                        <select class="form-select col mb-2" id="auction" required>
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
                </div>

                <div class="d-grid col-4 mx-auto">
                    <button type="submit" class="btn btn-primary mb-4">Submit</button>
                </div>

             </div>

        </div>
        
    </div>
    </form>
    

    <script>
    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }
    </script>

    <script> feather.replace() </script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $('input[type="checkbox"]').click(function() {
                var inputValue = $(this).attr("value");
                $("." + inputValue).toggle();
            });
        });
    </script>

</body>
</html>
