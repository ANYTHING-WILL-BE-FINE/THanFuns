<?php include_once("src/php/connect_db.php");?>

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

    <link rel="stylesheet" href="bar.css">
    <link rel="stylesheet" href="status.css">
    <link rel="stylesheet" href="src/css/icon/all.css">
    
    <script>
        function insertMyday(){
            $.ajax({
            type: "POST", 
            url:'register.php',
            data:{
              username: $("#username").val(),
              email: $("#email").val(),
              password: $("#password").val(),
              action : 'register'},
            success: function(data){
            console.log(data);
            },
            error: function(xhr, status, error){
            console.error(xhr);
            }
            });
        }


        function check_pass() {
        if (document.getElementById('password').value ==
                document.getElementById('repeatpassword').value) {
            document.getElementById('submit').disabled = false;
        } else {
            document.getElementById('submit').disabled = true;
        }
}
    </script>


    </head>

<body>
    
    <section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
  
                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
  
                  <form class="mx-1 mx-md-4" action="register.php" method="post">
  
                    <div class="d-flex flex-row align-items-center mb-4">
                        <i data-feather="user"></i>
                        <p>&emsp;</p>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" id="username" name="username" class="form-control" />
                        <label class="form-label" for="username">Username</label>
                      </div>
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4">
                        <i data-feather="mail"></i>
                        <p>&emsp;</p>
                      <div class="form-outline flex-fill mb-0">
                        <input type="email" id="email" name="email" class="form-control" />
                        <label class="form-label" for="email">Your Email</label>
                      </div>
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4">
                        <i data-feather="lock"></i>
                        <p>&emsp;</p>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" id="password" name="password" class="form-control" />
                        <label class="form-label" for="password">Password</label>
                      </div>
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4">
                        <i data-feather="key"></i>
                        <p>&emsp;</p>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" id="repeatpassword" nmae="repeatpassword" class="form-control" onchange='check_pass();' />
                        <label class="form-label" for="password">Repeat your password</label>
                      </div>
                    </div>
  

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="button" id= "submit" class="btn btn-primary btn-lg" " onclick = 'insertMyday()' >Register</button>
                    </div>

                    <p class="small fw-bold mt-2 pt-1 mb-0 text-center">Already have an account? 
                      <a class="link-danger" href = "login.php" >Login</a ></p>
  
                  </form>
  
                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
  
                  <img src="photo\logo.png"
                    class="img-fluid" alt="Sample image">
  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script> feather.replace()</script>
    
</body>
</html>