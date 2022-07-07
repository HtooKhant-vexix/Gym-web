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
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>hello</h1>
                <div class="col-lg-4 left-side-product-box pb-3">
                    <img src="image/<?php echo $rowp1['image']; ?>" class="border p-3">
                </div>
            </div>
        </div>




        <div class="col-lg-8">
<div class="right-side-pro-detail border p-3 m-0" style="background: #fafafa;">
<div class="row">
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
  if($_SESSION['role']=="")
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
</body>
</html>