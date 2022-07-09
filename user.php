<?Php
session_start();

//select
include('connect.php');
$sql=mysqli_query($conn, "SELECT * FROM user");

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
<body class="bg-dark">
<?php   
    $user_status=false;
    if(isset($_POST['ubtn'])){
        $upname=$_POST['upname'];
        $upemail = $_POST['upemail'];
        $id = $_POST['idd'];
        // $arole = $_POST['admin'];
        $urole = $_POST['role'];
        $select = $_POST['sel'];

        $user_update=mysqli_query($conn, "UPDATE user SET name='$upname', email='$upemail', role='$select' WHERE id=$id");
        if($user_update){
          
            header('location: user.php');
            echo "<script>
            swal('Good job!', 'You clicked the button!', 'succ');
        </script>";
        }else{
            die('ERROR:'. mysqli_error($conn));
        }
    }
    if(isset($_GET['id_update'])){
        $user_status="true";
        $uid = $_GET['id_update'];
        $update = mysqli_query($conn, "SELECT * FROM user WHERE id=$uid");
        $uuser = mysqli_fetch_assoc($update);
        $uname = $uuser['name'];
        $uemail = $uuser['email'];
        $urole = $uuser['role'];
    }
    
    ?>
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
                    <a href="admin-dashboard.php" class="py-3 text-white list-group-item list-group-item-action fw-bold border-primary" aria-current="true">
                        Dashboard
                    </a>
                    <a href="user.php" class="py-3 list-group-item list-group-item-action active fw-bold  text-white border-primary ">User</a>
                    <a href="productList.php" class="py-3 list-group-item list-group-item-action fw-bold text-white border-primary ">Update data</a>
                </div>
            </div>
            <div class="col-8 col-lg-10 overflow-scroll h">
                <div class="container-fluid mt-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card border-0 rounded">
                                <div class="card-header bg-black">
                                    <div class="row">
                                        <div class="col-md-6">
                                                <h3 class="card-title"><a href="admin-dashboard.php" style="text-decoration: none;" class="text-white fw-bold">User list</a></h3>
                                        </div>
                                        <div class="col-md-6">
                                            <form action="logout.php" class="d-flex justify-content-end" method="POST">
                                                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                    Add user
                                                </button>
                                                <button type="submit" class="btn btn-danger ms-3" name="logoutbtn" onclick="return confirm('Are you sure?');">Logout</button>
                                            </form>
                                                <!-- Modal -->
                                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header bg-secondary" >
                                                        <h5 class="modal-title fw-bold fs-4 text-white"  id="staticBackdropLabel">Add user</h5>
                                                        <!-- <div class="">
                                                            <button class="btn btn-secondary" href=""></button>
                                                        </div> -->
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="userInsert.php" method="POST" enctype="multipart/form-data">
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">Name</label>
                                                                <input type="text" class="form-control" name="addname">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">Email</label>
                                                                <input type="text" class="form-control" name="addemail">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">Password</label>
                                                                <input type="password" class="form-control" name="addpassword">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Role</label>
                                                                <select class="form-control" name = "addrole">
                                                                    <option>Select user role</option>
                                                                    <option  name="admin">admin</option>
                                                                    <option name="user">user</option>
                                                                </select>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer bg-secondary">
                                                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary px-4"  name="addbtn">Add</button>
                                                    </div>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body bg-secondary">
                                    <div class="row">
                                        <div class="col-12">
                                            <table class="table table-bordered table-hover bg-white mb-0 rounded">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($users = mysqli_fetch_assoc($sql)){?>
                                            <tr>
                                                <td><?php echo $users['id']; ?></td>
                                                <td><?php echo $users['name']; ?></td>
                                                <td><?php echo $users['email']; ?></td>
                                                <td><?php echo $users['role']; ?></td>
                                                <td>
                                                    <a href="user.php?id_update=<?php echo $users['id']; ?>" class="btn btn-primary">Edit</a>
                                                    <a href="delete.php?delid=<?php echo $users['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if($user_status == true): ?>
                                <div class="card mt-4 border-0 shadow w-25">
                                    <div class="card-header bg-black">
                                        <h4 class="text-white fw-bold">Edition</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                                <input type="hidden" value="<?php echo $uid?>" name="idd">
                                                <div class="mb-3"><label>Name</label>
                                                <input type="text" name="upname" value="<?php echo  $uname; ?>" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                <label>Email</label>
                                                <input type="text" name="upemail" value="<?php echo  $uemail; ?>"  class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label>Role</label>
                                                <select class="form-control" name = "sel">
                                                    <option>Select user role</option>
                                                    <option  name="admin" 
                                                    <?php if($urole=="admin"): ?> selected <?php endif ?>
                                                    >admin</option>
                                                    <option name="user"
                                                    <?php if($urole=="user"): ?> selected <?php endif ?>
                                                    >user</option>
                                                </select>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-black">
                                        <input type="submit" value="Update" class="btn btn-primary float-end" name="ubtn">
                                    </div>
                                </div>
                            </form>
                                <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
            
    </div>
    </div>


    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>