<?php
   session_start();
  include('connect.php');
  $productid = $_REQUEST['itemid'];
  $selectp = mysqli_query($conn,"SELECT * FROM tblproduct WHERE tblproduct.id = '" . $productid . "'");
  $rowp1 = mysqli_fetch_assoc ($selectp);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body class="bg-dark">
    <div class="container-fluid">
      <div class="container">
        <div class="row  min-vh-100  align-items-center">
          <div class="col-lg-9 mx-auto">
            <div class="card">
              <div class="card-header bg-black align-items-center d-flex justify-content-between">
                <h1 class="fw-bold text-white">Product details</h1>
                  <a href="home.php" class="text-decoration-none text-white btn btn-secondary">Back</a>
              </div>
              <div class="card-body">
                <div class="row h-100 align-items-center">
                  <div class="col-lg-5 h-100">
                    <img src="image/<?php echo $rowp1['image']; ?>" width="100%" class="h-100">
                  </div>
                  <div class="col-lg-7 h-100 ">
                    <div class="card border-3 border-dark">
                      <form method="post" action="index.php?page=cart&action=add&pdid=<?php echo $_REQUEST['itemid']; ?>"class="h-100">
                      <div class="card-body">
                        <h4> <span class="fw-bold"> Name: </span><?php echo $rowp1['name']; ?></h4>
                        <h4> <span class="fw-bold"> Price: </span><?php echo $rowp1['price']; ?>MMK</h4>
                        <h4> <span class="fw-bold"> Detail: </span><?php echo $rowp1['p_detail']; ?></h4>
                      </div>
                      <div class="card-footer bg-dark">
                        <input type="number" class="form-control text-center w-100 mt-1" value="1" name="qty" id="qty"> 
                        <div class="d-flex justify-content-between">
                          <button type="submit" class="btn btn-danger w-50 mt-3">Add To Cart</button>
                          <button type="submit" class="btn btn-success w-25 mt-3">Buy</button>
                        </div>
                        
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>