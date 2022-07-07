<?php 
include('connect.php');
mysqli_query($conn, "DELETE FROM user WHERE id=$_GET[delid]");
header('location: user.php')
?>