<?php 
    include('connect.php');
    if(isset($_POST['addbtn'])){
        $addname = $_POST['addname'];
        $addemail = $_POST['addemail'];
        $addpswd = $_POST['addpassword'];
        $addrole = $_POST['addrole'];
        $addsql = mysqli_query($conn, "INSERT INTO user (name, email, password, role) VALUES ('$addname', '$addemail', '$addpswd', '$addrole')");
            if($addsql){
                echo "success";
            }else{
                echo "error";
            }
            header('location: user.php');
    }

                                                            
 ?>