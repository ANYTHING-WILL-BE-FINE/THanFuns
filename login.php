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
  
                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign in</p>
  
                  <form class="mx-1 mx-md-4">
  
                    <div class="d-flex flex-row align-items-center mb-4">
                        <i data-feather="user"></i>
                        <p>&emsp;</p>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" id="username" class="form-control" />
                        <label class="form-label" for="username">Username</label>
                      </div>
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4">
                        <i data-feather="lock"></i>
                        <p>&emsp;</p>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" id="password" class="form-control" />
                        <label class="form-label" for="password">Password</label>
                      </div>
                    </div>
  

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="button" class="btn btn-primary btn-lg">Log in</button>
                    </div>
                    <p class="small fw-bold mt-2 pt-1 mb-0 text-center">Don't have an account? <a href="pageregister.php"
                      class="link-danger">Register</a></p>
  
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