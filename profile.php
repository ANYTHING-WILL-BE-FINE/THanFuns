<?php include("src/php/connect_db.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <title>Anything will be fine</title>
    <link rel="stylesheet" href="src/css/bootstrap.min.css" />
    <script src="src/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container-fluid"align="left">
    <div class="mt-5 ms-5"> 
      <div class="row">
      <div class="col-3" align="left">
        <img
          src="https://i.pinimg.com/474x/18/ba/ec/18baecaf3a1257d1a51f27da6ca80e3e.jpg" 
          width="300" height="300"
          class="rounded-circle"
          alt="profilepic"
          
        />
      </div>
        <div class="col-6">
          <h1>NAME EEE</h1>
          <p>
            fdkslkfldsfks;flds;fksdsald;s'ald;'sald;a'ld;s'ald;a'ld;sa'<br />ldas;'dls;a'lldfkopektfoekfldskfldsfklsfkdlskfl;kdkapriw[
          </p>
          <button type="button" class="btn btn-outline-primary" data-bs-toggle="button">FOLLOW</button>
        </div>
      </div>
    </div>
  
   
  
    <div class="mt-5">
    <div class="row">
      <div class="col-md-4" align="center">
          <!-- <img
          src="https://i.pinimg.com/564x/97/88/1a/97881a6721c59f83d7aa201fa85edcb0.jpg"
          wigth="100%"
        /> -->
        <div class="photo">
          <?php
          $sql="SELECT file_path FROM pth_file";
          $result = mysqli_query($conn, $sql);
          if($result -> num_rows > 0) {
            while($row = $result -> fetch_row()) {
              ?>
              <img src="<?php echo isset($row['file_path']);
              }}?>">  
        </div>
        <div class="card-body">
          <h5>productname</h5>
          <button
            type="button"
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#myModal"
          >
            Learn more
          </button>
        </div>
      </div>
      <div class="col-md-4" align="center">
        <img
          src="https://i.pinimg.com/564x/f0/f1/1c/f0f11cab27fd41515f36d109828bc092.jpg"
          wigth="450"
          height="830"
        />
        <div class="card-body">
          <h5>productname</h5>
          <button
            type="button"
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#Model"
          >
            Learn more
          </button>
        </div>
      </div>
      <div class="col-md-4" align="center">
        <img
          src="https://i.pinimg.com/originals/17/3f/9c/173f9c8d0badfa096df6b47b21e99a69.gif"
          wigth="450"
          height="830"
        />
        <div class="card-body">
          <h5>productname</h5>
          <button
            type="button"
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#Model1"
          >
            Learn more
          </button>
        </div>
      </div>
    </div>
  </div>
</div>


    ------------------------------------------------------------------------------------------------------------------------------------------------------

    <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">ProductName</h4>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
            ></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <img
              src="https://i.pinimg.com/564x/97/88/1a/97881a6721c59f83d7aa201fa85edcb0.jpg"
              wigth="300"
              height="500"
            />
            <p>รายละเอียดผลงาน</p>
            <h4>ราคา 2,800 บาท</h4>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-success"
              data-bs-dismiss="modal"
            >
              buy
            </button>
            <button
              type="button"
              class="btn btn-danger"
              data-bs-dismiss="modal"
            >
              Close
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal" id="Model">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">ProductName</h4>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
            ></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <img
              src="https://i.pinimg.com/564x/f0/f1/1c/f0f11cab27fd41515f36d109828bc092.jpg"
              wigth="400"
              height="600"
            />
            <p>รายละเอียดผลงาน</p>
            <h4>ราคา 4,950 บาท</h4>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-success"
              data-bs-dismiss="modal"
            >
              buy
            </button>
            <button
              type="button"
              class="btn btn-danger"
              data-bs-dismiss="modal"
            >
              Close
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal" id="Model1">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">ProductName</h4>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
            ></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <img
              src="https://i.pinimg.com/originals/17/3f/9c/173f9c8d0badfa096df6b47b21e99a69.gif"
              wigth="400"
              height="600"
            />
            <p>รายละเอียดผลงาน</p>
            <h4>ราคา 10,050 บาท</h4>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-success"
              data-bs-dismiss="modal"
            >
              buy
            </button>
            <button
              type="button"
              class="btn btn-danger"
              data-bs-dismiss="modal"
            >
              Close
            </button>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
