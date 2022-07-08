<?php 
    include('connect.php');

    $pname = $_FILES["photo"]["name"];
    $tmp = $_FILES["photo"]["tmp_name"];
    $type = $_FILES["photo"]["type"];

    if($type == "image/jpeg" or $type == "image/png" or $type == "image/gif"){
        move_uploaded_file($tmp, "image/$pname");
    }

    $name = $_POST['name'];
    $price = $_POST['price'];
    $detail = $_POST['detail'];
    $photo = $pname;

    if(!empty($name) && !empty($price) && !empty($detail)){
        $insert = mysqli_query($conn, "INSERT INTO tblproduct (name, p_detail, price, image) VALUES ('$name','$detail','$price','$photo')");
    }else{
        echo "error";
    }

    header('location: productList.php');
