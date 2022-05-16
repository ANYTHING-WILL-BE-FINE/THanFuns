<?php include("src/php/connect_db.php"); ?>
<?php $sql = "SELECT username FROM acc_user
              WHERE user_id = 6338";
    $result = $conn->query($sql); ?>
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
                    <img src="https://i.pinimg.com/564x/3a/a3/f0/3aa3f017fdcbee862278bd7b7c1ec64b.jpg"
                      alt="Generic placeholder image" class="img-fluid img-thumbnail mt-5 mb-2 rounded-circle" 
                      style="width: 150px; z-index: 1">
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
                      <p class="mb-1 h5">1026</p>
                      <!-- <i data-feather="heart"></i> -->
                      <p class="small text-muted mb-0">Likes</p>
                    </div>
                    <div>
                      <p class="mb-1 h5">478</p>
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
                            <div align="center"><a href="https://www.facebook.com/profile.php?id=100002404106020"><i data-feather="facebook"></i></a></div>
                            <div class="ms-5"><div align="center"><a href="https://www.instagram.com/primsrps/"style="color:indianred"><i data-feather="instagram"></i></a></div></div>
                            <div class="ms-5"><div align="center"><a href="https://www.twitch.tv/johnolsen_"style="color:purple"><i data-feather="twitch"></i></a></div></div>
                            <div class="ms-5"><div align="center"><a href=""style="color:cyan"><i data-feather="twitter"></i></a></div></div>
                            <div class="ms-5"><div align="center"><a href="https://www.youtube.com/c/MRHEARTROCKERz"style="color:red"><i data-feather="youtube"></i></a></div></div>
                            
                            
                        </div>
                      
                      
                      <!-- <p class="font-italic mb-0">primsrps</p> -->
                    </div>
                  </div>
                  <div class="d-flex justify-content-between align-items-center mb-4">
                    <p class="lead fw-normal mb-0">photos</p>
                    <!-- <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p> -->
                  </div>
                  <div class="row g-2">
                    <div class="col mb-2">
                        <a href="test4.html"><img src="photo/1.jpg"
                        alt="image 1" class="w-100 rounded-3"></a>
                    </div>
                    <div class="col mb-2">
                        <a href="test4.html"><img src="photo/129620692420220515.jpg"
                        alt="image 1" class="w-100 rounded-3"></a>
                    </div>
                  </div>
                  <div class="row g-2">
                    <div class="col">
                        <a href="test4.html"><img src="https://i.pinimg.com/564x/fa/62/b2/fa62b224162bca157bd10ec714cd0b7f.jpg"
                        alt="image 1" class="w-100 rounded-3"></a>
                    </div>
                    <div class="col">
                        <a href="test4.html"><img src="https://i.pinimg.com/564x/40/7a/de/407ade5f0291c23639a78bd810cf0d9c.jpg"
                        alt="image 1" class="w-100 rounded-3"></a>
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