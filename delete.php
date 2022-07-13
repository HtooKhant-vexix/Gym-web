<?php 
include('connect.php');

$product=mysqli_query($conn, "DELETE FROM tblproduct WHERE product_id=$_GET[pdelid]");
if($product){
    header('location: productList.php');
}

$user=mysqli_query($conn, "DELETE FROM user WHERE id= $_GET[delid]");
if($user){
    header('location: user.php');
}
?>