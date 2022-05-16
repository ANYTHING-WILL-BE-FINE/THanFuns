<?php include("src/php/connect_db.php"); ?>
<?php $sql = "SELECT username FROM acc_user
              WHERE user_id = 6338";
    $result = $conn->query($sql); ?>

<?php $a = "SELECT description FROM mkt_product
              WHERE creator_id = 6338;";
    $resultt = $conn->query($a); ?>
    
    <?php $b = "SELECT product_name FROM mkt_product
              WHERE creator_id = 6338;";
    $resulttt = $conn->query($b); ?> 

    <?php $d = "SELECT file_path FROM pth_file
              WHERE user_id = 6338;";
    $resultttt = $conn->query($d); 
    ?>
    <?php $e = "SELECT file_path FROM pth_file
    WHERE file_id LIKE 'V%4';";
    $resulttttt = $conn->query($e); 
    
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
    <link rel="stylesheet" href="src/css/fontawesome.css">
    <link rel="stylesheet" href="bar.css">
    <link rel="stylesheet" href="status.css">
    <link rel="stylesheet" href="src/css/icon/all.css">
    
    
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
    
    <!-- <form action="process.php" method="post"> -->

    <!--- navbar --->
    <nav class="navbar navbar-expand-md navbar-light bg-light px-2">
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
            <nav id="bottom" class="col-md-3 col-lg-2 d-md-block bottom collpase bottom">
                <div class="bg-light fixed-bottom bottom">
                    <ul class="nav d-flex flex-md-column flex-row flex-nowrap justify-content-between bottom">
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

            
            <div class="container mt-5 mb-5 justify-content-center" >
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="d-flex justify-content-between p-2 px-3">
                                <div class="d-flex flex-row align-items-center"> <img src="https://pbs.twimg.com/profile_images/378800000346467287/ce6a8754abf7e84e796395cf4d576839_400x400.jpeg" width="50" class="rounded-circle">
                                    <div class="d-flex flex-column ml-2"> 
                                        <p>
                                        <?php $row = $result->fetch_assoc();
                        echo $row['username']; ?> add <?php $row = $resulttt->fetch_assoc();
                        echo $row['product_name']; ?>
                                       </p>
                                            <small class="text-primary">13 May 2022</small> 
                                        </div> 
                                    
                                        
                                </div>
                                <div class="d-flex flex-row mt-1 ellipsis"> <small class="mr-2">20 mins</small> <i class="fa fa-ellipsis-h"></i> </div>
                                <?php $rowwwww = $resulttttt->fetch_assoc();
                                echo '<img src="'.$rowwwww['file_path'].'"class="img-fluid">';?>
                            <div class="p-2">
                                <p> <?php $row = $resultt->fetch_assoc();
                        echo $row['description']; ?></p>
                                <hr>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex flex-row icons d-flex align-items-center"> <i class="fa fa-heart"></i> <i class="fa fa-smile-o ml-2"></i> </div>
                                    <div class="d-flex flex-row muted-color"> <span>2 comments</span> <span class="ml-2">Share</span> </div>
                                </div>
                                <hr>
                                <div class="comments">
                                    <div class="d-flex flex-row mb-2"> <img src="https://i.imgur.com/9AZ2QX1.jpg" width="40" class="rounded-image">
                                        <div class="d-flex flex-column ml-2"> <span class="name">Daniel Frozer</span> <small class="comment-text">I like this alot! thanks alot</small>
                                            <div class="d-flex flex-row align-items-center status"> <small>Like</small> <small>Reply</small> <small>Translate</small> <small>18 mins</small> </div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row mb-2"> <img src="https://i.imgur.com/1YrCKa1.jpg" width="40" class="rounded-image">
                                        <div class="d-flex flex-column ml-2"> <span class="name">Elizabeth goodmen</span> <small class="comment-text">Thanks for sharing!</small>
                                            <div class="d-flex flex-row align-items-center status"> <small>Like</small> <small>Reply</small> <small>Translate</small> <small>8 mins</small> </div>
                                        </div>
                                    </div>
                                    <div class="comment-input"> <input type="text" class="form-control">
                                        <div class="fonts"> <i class="fa fa-camera"></i> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


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

            <script> feather.replace()</script>
</body>
</html>