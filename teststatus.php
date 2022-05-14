<?php
include("/navbar.php");
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
    <link rel="stylesheet" href="status.css">
    <link rel="stylesheet" href="src/css/fontawesome.css">
    <link rel="stylesheet" href="src/css/icon/all.css">

</head>

<body>
    <section class="vh-100" style="background-color: #8c9eff;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
              <div class="card card-stepper text-black" style="border-radius: 16px;">
      
                <div class="card-body p-5">
      
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <div>
                      <h5 class="mb-0">INVOICE <span class="text-primary font-weight-bold">#Y34XDHR</span></h5>
                    </div>
                    <div class="text-end">
                      <p class="mb-0">Expected Arrival <span>01/12/19</span></p>
                      <p class="mb-0">USPS <span class="font-weight-bold">234094567242423422898</span></p>
                    </div>
                  </div>
      
                  <ul id="progressbar-2" class="d-flex justify-content-between mx-0 mt-0 mb-5 px-0 pt-0 pb-2">
                    <li class="step0 active text-center" id="step1"></li>
                    <li class="step0 active text-center" id="step2"></li>
                    <li class="step0 active text-center" id="step3"></li>
                    <li class="step0 text-muted text-end" id="step4"></li>
                  </ul>
      
                  <div class="d-flex justify-content-between">
                    <div class="d-lg-flex align-items-center">
                      <i class="fas fa-clipboard-list fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                      <div>
                        <p class="fw-bold mb-1">Order</p>
                        <p class="fw-bold mb-0">Processed</p>
                      </div>
                    </div>
                    <div class="d-lg-flex align-items-center">
                      <i class="fas fa-box-open fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                      <div>
                        <p class="fw-bold mb-1">Order</p>
                        <p class="fw-bold mb-0">Shipped</p>
                      </div>
                    </div>
                    <div class="d-lg-flex align-items-center">
                      <i class="fas fa-shipping-fast fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                      <div>
                        <p class="fw-bold mb-1">Order</p>
                        <p class="fw-bold mb-0">En Route</p>
                      </div>
                    </div>
                    <div class="d-lg-flex align-items-center">
                      <i class="fas fa-home fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                      <div>
                        <p class="fw-bold mb-1">Order</p>
                        <p class="fw-bold mb-0">Arrived</p>
                      </div>
                    </div>
                  </div>
      
                </div>
      
              </div>
            </div>
          </div>
        </div>
    </section>

  <script> feather.replace() </script>

</body>