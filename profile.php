<?php include("src/php/connect_db.php"); ?>
<?php $sql = "SELECT username FROM acc_user
              WHERE user_id = 6338";
    $result = $conn->query($sql); ?>
<?php $a = "SELECT contact_type FROM acc_contact
              WHERE user_id = 6338;";
    $resultt = $conn->query($a); ?>
    <?php $b = "SELECT contact_app FROM acc_contact
              WHERE user_id = 6338;";
    $resulttt = $conn->query($b); ?>
    <?php $c = "SELECT contact_type FROM acc_contact
              WHERE user_id = 6338;";
    $resultt = $conn->query($c); ?>
    <?php $d = "SELECT pth_file.file_path FROM mkt_product_file
                INNER JOIN pth_file ON mkt_product_file.file_id=pth_file.file_id
                WHERE pth_file.file_id LIKE 'V%';";
    $resultttt = $conn->query($d); 
    ?>
    <?php $e = "SELECT file_path FROM pth_file
    WHERE file_id LIKE 'V%4';";
    $resulttttt = $conn->query($e); 
    ?>
    <?php $f = "SELECT COUNT(user_id) FROM acc_like;";
    $resultttttt = $conn->query($f); 
    ?>
    <?php $g = "SELECT COUNT(user_id) FROM acc_following;";
    $resulttttttt = $conn->query($g); 
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <title>Anything will be fine</title>
    <link rel="stylesheet" href="src/css/bootstrap.min.css" />
    <script src="src/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="test5.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="bar.css">
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
                        <a class="nav-link active mb-2" aria-current="home" href="feed.html">
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
                <div class="h-100 gradient-custom-2">
        <div class="container py-5 h-100 coi-6 ">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-9 col-xl-7">
              <div class="card">
                <div class="rounded-top text-white d-flex flex-row" style="background-color: rgb(136, 149, 207); height:200px;">
                  <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                  
                  <?php $rowwwww = $resulttttt->fetch_assoc();
                    echo '<img src="'.$rowwwww['file_path'].'"class="img-fluid img-thumbnail mt-5 mb-2 rounded-circle" 
                    style="width: 150px; z-index: 1">';
                    ?>
                    <!-- <img src="https://i.pinimg.com/564x/3a/a3/f0/3aa3f017fdcbee862278bd7b7c1ec64b.jpg"
                      alt="Generic placeholder image" class="img-fluid img-thumbnail mt-5 mb-2 rounded-circle" 
                      style="width: 150px; z-index: 1"> -->
                    <button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark"
                      style="z-index: 1;">
                      Edit profile
                    </button>
                    
                  </div>
                  
                  <div class="ms-3" style="margin-top: 130px;">
                  <?php $row = $result->fetch_assoc();
                        echo $row['username']; ?>
                    <!-- <h5>PUDDINGKAI</h5> -->
                    <!-- <p></p> -->
                  </div>
                </div>
                <div class="p-4 text-black" style="background-color: #f8f9fa;">
                    
                  <div class="d-flex justify-content-end text-center py-1">
                      
                    
                    <!-- <div>
                      <p class="mb-1 h5">253</p>
                      <i data-feather="heart"></i>
                      <p class="small text-muted mb-0">Likes</p>
                    </div> -->
                    <div class="px-3">
                      <!-- <p class="mb-1 h5">1026</p> -->
                      <!-- <i data-feather="heart"></i> -->
                      <?php
                       $count= mysqli_fetch_Column($resultttttt);
                      echo '<p class="mb-1 h5">'.$count.'</p>';
                      ?>
                    
                      <p class="small text-muted mb-0">Likes</p>
                    </div>
                    <div>
                    <?php
                       $countt= mysqli_fetch_Column($resulttttttt);
                      echo '<p class="mb-1 h5">'.$countt.'</p>';
                      ?>
                      <!-- <p class="mb-1 h5">478</p> -->
                      <p class="small text-muted mb-0">Following</p>
                    </div>
                  </div>
                </div>
                <div class="card-body p-4 text-black">
                  <div class="mb-5">
                    <p class="lead fw-normal mb-1">About</p>
                    <div class="p-4" style="background-color: #f8f9fa;">
                        <!-- <p class="font-italic mb-1">Thailand</p> -->
                        <div class="d-flex flex-row bd-highlight mb-2 ms-3">
                            <?php $roww = $resultt->fetch_assoc();
                                // echo $roww['contact_type'];
                                  if($roww['contact_type']==1){
                                    echo '<div align="center"><a href="https://www.instagram.com/primsrps/"style="color:#ff007f"><i data-feather="instagram"></i></a></div>';

                                  }elseif($roww['contact_type']==2){
                                    echo '<div align="center"><a href=""style="color:gray"><i data-feather="mail"></i></a></div>';
                                  }else{
                                    echo '<div align="center"><a href=""style="color:green"><i data-feather="phone"></i></a></div>';
                                  }?>
                              <?php $rowww = $resulttt->fetch_assoc();
                              if($rowww['contact_app']==1){
                                echo '<div class="ms-5"><div align="center"><a href="https://www.facebook.com/profile.php?id=100002404106020"style="color:blue"><i data-feather="facebook"></i></a></div></div>';
                              }elseif($rowww['contact_app']==2){
                                echo '<div class="ms-5"><div align="center"><a href=""style="color:red"><i data-feather="youtube"></i></a></div></div>';
                              }elseif($rowww['contact_app']==3){
                                echo '<div class="ms-5"><div align="center"><a href=""style="color:cyan"><i data-feather="twitter"></i></a></div></div>';
                              }elseif($rowww['contact_app']==4){
                                echo '<div class="ms-5"><div align="center"><a href=""style="color:purple"><i data-feather="twitch"></i></a></div></div>';
                              }else{
                                echo '<div class="ms-5"><div align="center"><a href=""style="color:black"><i data-feather="tv"></i></a></div></div>';
                              }?> 
                        </div>
                    </div>
                  </div>
                  <div class="d-flex justify-content-between align-items-center mb-4">
                    <p class="lead fw-normal mb-0">photos</p>
                    <!-- <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p> -->
                  </div>
                  <div class="row g-2">
                    <div class="col mb-2">
                      <?php  while( $rowwww= mysqli_fetch_assoc($resultttt)){
                          echo '<a href="test4.php"><img src="'.$rowwww['file_path'].'" class="col-4 w-50"></a>';}
                      ?>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    
    </div>
                
</div>

</div>

</div>
<!-- </form> -->


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