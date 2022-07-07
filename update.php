<?Php
session_start();



?>


<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
    <style>
        .h{
            height: 100vh;
        }
    </style>
</head>
<body class="">
    <div class="container-fluid">
        <div class="row d-flex h-100">
            <div class="col-4 col-lg-2 overflow-scroll bg-black h">
                <p class="h1 text-white text-center p-2 border-bottom border-primary"><span class="text-primary fw-bold">VEX</span></p>
                <div class="p-1 d-flex my-3">
                    <img src="./image/pfp.jpg" height="50" class="rounded-circle me-2" alt="">
                    <div class="ms-2 d-inline">
                        <p class=" text-white fw-bold d-inline"><?php echo $_SESSION['name']; ?></p><br>
                        <p class=" text-white-50 fw-bold d-inline"><?php echo $_SESSION['role']; ?></p>
                    </div>
                </div>
                <div class="list-group list-group-flush mt-5">
                    <a href="admin-dashboard.php" class="py-3 list-group-item text-white list-group-item-action fw-bold border-primary" aria-current="true">
                        Dashboard
                    </a>
                    <a href="user.php" class="py-3 list-group-item list-group-item-action fw-bold text-white border-primary ">User</a>
                    <a href="update.php" class="py-3 list-group-item list-group-item-action fw-bold active text-white border-primary ">Update data</a>
                </div>
            </div>
            <div class="col-8 col-lg-10 overflow-scroll h">
            <div class="best-features header-text">
      <div class="container">
        
        <div class="bg-white pt-5">
<div class="row hedding m-0 pl-3 pt-0 pb-3">
<h2>Product Detail</h2>
</div>
<?php
  $productid = $_REQUEST['itemid'];
  $selectp = mysqli_query($conn,"SELECT * FROM tblproduct WHERE tblproduct.product_id = '" . $productid . "'");
  $rowp1 = mysqli_fetch_assoc ($selectp);

?>
<div class="row m-0">
<div class="col-lg-4 left-side-product-box pb-3">
<img src="photo/<?php echo $rowp1['image']; ?>" class="border p-3">
<span class="sub-img">
<img src="photo/<?php echo $rowp1['image']; ?>" class="border p-2">
<img src="photo/<?php echo $rowp1['image']; ?>" class="border p-2">
<img src="photo/<?php echo $rowp1['image']; ?>" class="border p-2">
</span>
</div>
<div class="col-lg-8">
<div class="right-side-pro-detail border p-3 m-0" style="background: #fafafa;">
<div class="row">
<div class="col-lg-12">
<span>Product Code</span>
<p class="m-0 p-0"><?php echo $rowp1['product_code']; ?></p>
</div>
<div class="col-lg-12">
<p class="m-0 p-0 price-pro"><?php echo $rowp1['price']; ?> MMK</p>
<hr class="p-0 m-0">
</div>
<div class="col-lg-12 pt-2">
<h5>Product Detail</h5>
<span><?php echo $rowp1['p_detail']; ?></span><hr class="m-0 pt-2 mt-2">
</div>
<div class="col-lg-12">
<h6>Quantity :</h6>
<form method="post" action="index.php?page=cart&action=add&pdid=<?php echo $_REQUEST['itemid']; ?>">
<input type="number" class="form-control text-center w-100" value="1" name="qty" id="qty">

</div>
<div class="col-lg-12 mt-3">
<div class="row">
<div class="col-lg-6 pb-2">
  
<!--<a href="index.php?pg=cart&action=add&pdid=<?php echo $_REQUEST['pid']; ?>" class="btn btn-danger w-100">Add To Cart</a>-->

<?php
  if(@$_SESSION['customer_id']=="")
  {
    

?>
<a href="index.php?page=login" class="btn btn-danger w-100">Add To Cart</a>
<?php
  }
  else
  {

?>

<button type="submit" class="btn btn-danger w-100">Add To Cart</button>

<!-- <a href="index.php?page=cart&action=add&pdid=<?php echo $productid; ?>&qty=" class="btn btn-danger w-100">Add To Cart</a>  -->

<!-- <button id="submit" onclick="javascript:window.location.href='index.php?page=cart&action=add&pdid=<?php echo $_REQUEST['itemid']; ?>&qty=' + document.getElementById('qty').value" class="btn btn-danger w-100">Add To Cart</button> -->
<?php
  }
?>

 </form>
</div>
<div class="col-lg-6">
<a href="index.php?page=productlist.php" class="btn btn-success w-100">Shop Now</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12 text-center pt-3">
<h4>More Product</h4>
</div>
</div>



</div>
</div>

      </div>
            </div>
        </div>
    </div>


    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>