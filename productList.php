<?Php
session_start();
include('connect.php');

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
                    <a href="user.php" class="py-3 list-group-item list-group-item-action fw-bold  text-white border-primary ">User</a>
                    <a href="productList.php" class="py-3 list-group-item active list-group-item-action fw-bold text-white border-primary ">Update data</a>
                </div>
            </div>
            <div class="col-8 col-lg-10 overflow-scroll h">
            <div class="row">
                <div class="col">
                    <div class="card mt-5 border-0 bg-dark">
                        <div class="card-header d-flex justify-content-between bg-dark border-bottom border-primary">
                            <h1 class="text-white fw-bold">
                                Product list
                            </h1>
                            <!-- <a href="" class="btn btn-primary">Add</a> -->
                            <div class="div">
                                <form action="logout.php" method="POST">
                                    <button type="submit" class="btn btn-danger float-end btn-lg ms-3" name="logoutbtn" onclick="return confirm('Are you sure?');">Logout</button>
                                    <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        Add product
                                    </button>
                                </form>
                                

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header bg-secondary" >
                                        <h5 class="modal-title fw-bold fs-4 text-white" id="staticBackdropLabel">Add product</h5>
                                        <!-- <div class="">
                                            <button class="btn btn-secondary" href=""></button>
                                        </div> -->
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="upload.php" method="POST" enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Name</label>
                                                <input type="text" class="form-control" name="name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Price</label>
                                                <input type="text" class="form-control" name="price">
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Details</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="detail"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Photo</label>
                                                <input type="file" class="form-control" name="photo">
                                            </div>
                                        
                                    </div>
                                    <div class="modal-footer bg-secondary">
                                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary px-4">Add</button>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-body bg-dark mt-3 p3">
                            <?php 
                            $sql = mysqli_query($conn, "SELECT * FROM tblproduct"); 
                            ?>
                            <table class="table table-dark">
                                <tr class="fs-5">
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>price</th>
                                    <th>detail</th>
                                    <th>action</th>
                                </tr>
                                <?php while($select = mysqli_fetch_assoc($sql)): ?>
                                <tr>
                                    <td><?php echo $select['id'] ?></td>
                                    <td>
                                        <img src="./image/<?php echo $select['image'] ?>" height="100" width="100" alt="">
                                    </td>
                                    <td><?php echo $select['name'] ?></td>
                                    <td><?php echo $select['price'] ?></td>
                                    <td><?php echo $select['p_detail'] ?></td>
                                    <td>action</td>
                                </tr>
                                <?php endwhile ?>
                            </table>
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