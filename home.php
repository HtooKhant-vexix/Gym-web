
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VEX</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

    <?php
    include ('connect.php');

    // $_SESSION['role']="admin";
    $_SESSION['role']="empty";
    $_SESSION['count']=0;

    if(isset($_POST['regbtn'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pswd = $_POST['pswd'];
        $cpswd = $_POST['cpswd'];
        $_SESSION['regname']=$name;
        if(!empty($name) && !empty($email) && !empty($pswd) && !empty($cpswd) && $pswd == $cpswd ){
            $sql = mysqli_query($conn, "INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$pswd')");
            // $_SESSION['un'] = $row;
            $_SESSION['count']=$sql;
        }
    }   


    if(isset($_POST['loginbtn'])){
        $email = $_POST['email'];
        $pswd = $_POST['pswd'];
        
        if(!empty($email) && !empty($pswd)){
            $sql = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' AND password = '$pswd' ");
            $role = mysqli_fetch_assoc($sql);
            if($role){
                $_SESSION['role'] = $role['role'];
                $_SESSION['name'] = $role['name'];
            }
        
            if($_SESSION['role']=="admin"){
                header('location: index.php?page=admin');
            }
        }
    }
    ?>

<body class="bg-dark" style="height: 3000px;">
    <div class="container-fluid bg-black  position-sticky top-0 index">
        <div class="container">
            <div class="row">
                <div class="col">
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid">
                            <a class="display-4 text-decoration-none me-4 fw-bold mb-1" href="#">VEX</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php?page=home">Home</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">About</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Product</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Contact us</a>
                                </li>
                            </ul>
                            <div class="d-flex" role="search">
                                <button class="btn btn-primary"><i class="fa fa-solid fa-cart-shopping"></i></button>
                                <!-- logout -->
                                <?php if($_SESSION['role']=="user" or $_SESSION['role']=="admin"): ?>
                                    <a href="logout.php" class="btn btn-outline-primary">Log out</a>
                                    <span class="fs-5 text-white fw-bold ms-3 px-4 pt-1 bg-secondary rounded rounded-pill"> <?php echo $_SESSION['name']?></span>
                                <?php endif ?>
                                <!-- register  name-->
                                <?php if($_SESSION['count']== 1): ?>
                                    <a href="logout.php" class="btn btn-outline-primary">Log out</a>
                                    <span class="fs-5 text-white fw-bold ms-3 px-4 pt-1 bg-secondary rounded rounded-pill"> <?php echo $_SESSION['regname']?></span>
                                <?php endif ?>
                                <!-- Button trigger modal -->
                                <?php if($_SESSION['role']!="user" && $_SESSION['role']!="admin" && $_SESSION['count']!= 1): ?>
                                <button class="btn btn-outline-primary ms-4"  data-bs-toggle="modal" data-bs-target="#exampleModal">Register</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog ">
                                        <div class="modal-content bg-secondary">
                                                <div class="modal-header bg-secondary border-primary">
                                                    <h1 class=" fw-bold text-light text-center" >Create new account</h1>
                                                    <button type="button" class="btn-close text-primary" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                    <?php 
                                                       ?>
                                                <form action="index.php?page=home" method="post" class="modal-body bg-dark border-primary">
                                                    <div class="mb-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="name" name="name" placeholder="Username">
                                                            <label for="name">Username</label>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="form-floating">
                                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                                            <label for="email">Email address</label>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="form-floating">
                                                                <input type="password" class="form-control" id="pswd" name="pswd" placeholder="Password">
                                                                <label for="pswd">Password</label>
                                                        </div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <div class="form-floating">
                                                            <input type="password" class="form-control" name="cpswd" id="cpswd" placeholder="Confirm password">
                                                            <label for="cpswd">Confirm password</label>
                                                        </div>
                                                    </div>
                                                    <div class=" d-flex justify-content-between">
                                                        <!-- Button trigger modal -->
                                                        <a href="login" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#loginModal">Already have an account?</a>
                                                        <!-- .. -->
                                                        <div class="">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary ms-4" name="regbtn">Create</button>
                                                        </div>
                                                    </div>
                                                </form>
                                        </div>
                                    </div>
                                </div>
                                <?php endif ?>
                                    <!-- Modal -->
                                    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog ">
                                        <div class="modal-content bg-secondary">
                                                <div class="modal-header bg-secondary border-primary">
                                                    <h1 class=" fw-bold text-light text-center" >Create new account</h1>
                                                    <button type="button" class="btn-close text-primary" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="index.php?page=home" method="post" class="modal-body bg-dark border-primary">
                                                    <div class="mb-3">
                                                        <div class="form-floating">
                                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                                            <label for="email">Email address</label>
                                                        </div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <div class="form-floating">
                                                                <input type="password" class="form-control" id="pswd" name="pswd" placeholder="Password">
                                                                <label for="pswd">Password</label>
                                                        </div>
                                                    </div>
                                                    <div class=" d-flex justify-content-between">
                                                        <a href="login" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModal">Do not have any account?</a>
                                                        <div class="">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary ms-4" name="loginbtn">Login</button>
                                                        </div>
                                                    </div>
                                                </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- end -->
                            </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- landing -->
<div class=" container-fluid gymbg">
    <div class=" container">
        <div class="row min-vh-70">
            <div class="col-lg-8 mt-5">
                <h1 class="display-2 fw-bold text-primary text-center text-lg-start">GET FIT <br> GET HEALTHY</h1>
                <p class="text-light w-75 mt-2 mx-auto text-center text-lg-start mx-lg-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, quaerat praesentium! Perferendis delectus maiores doloribus ipsum placeat perspiciatis excepturi quod pariatur laboriosam quaerat quasi ducimus minima possimus quis hic earum quisqua.</p>
                <button class="btn btn-primary d-block btn-lg mt-2 mx-auto mx-lg-0" >SHOP NOW</button>
            </div>
        </div>
    </div>
</div>
<!-- ads -->
<div class="container-fluid mminus">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 p-3">
                <div class="car">
                    <div class="card-body cbg g1">
                    </div>
                </div>
            </div>
            <div class="col-lg-4 p-3">
                <div class="car">
                    <div class="card-body cbg g2">
                    </div>
                </div>
            </div>
            <div class="col-lg-4 p-3">
                <div class="car">
                    <div class="card-body cbg g3">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- best seller  -->
<div class="container-fluid mt-5">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card bg-transparent">
                    <div class="card-header bg-transparent d-flex justify-content-between bg-transparent border-bottom border-primary">
                        <h4 class=" text-primary h2 fw-bold">The best seller</h4>
                        <div class="div">
                            <i class=" fa fa-solid fa-angle-left fs-1 px-3 text-primary"></i>
                            <i class=" fa fa-solid fa-angle-right px-3 fs-1 text-primary"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 col-md-3 col-lg-2">
                                <div class="card border-0 bg-black">
                                    <img src="./image/g2.jpg" height="" class=" card-img-top" alt="">
                                    <div class="p-2">
                                        <h6 class="fw-bold text-white text-center">hello</h6>
                                        <p class="text-center text-white-50 mb-0">200000mmk</p>
                                    </div>
                                    <div class=" justify-content-between d-flex mb-2 px-2">
                                        <button class="btn btn-primary">Detail</button>
                                        <button class="btn btn-primary"><i class="fa-solid fa-cart-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 col-lg-2">
                                <div class="card border-0 bg-black">
                                    <img src="./image/g2.jpg" height="" class=" card-img-top" alt="">
                                    <div class="p-2">
                                        <h6 class="fw-bold text-white text-center">hello</h6>
                                        <p class="text-center text-white-50 mb-0">200000mmk</p>
                                    </div>
                                    <div class=" justify-content-between d-flex mb-2 px-2">
                                        <button class="btn btn-primary">Detail</button>
                                        <button class="btn btn-primary"><i class="fa-solid fa-cart-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 col-lg-2">
                                <div class="card border-0 bg-black">
                                    <img src="./image/g2.jpg" height="" class=" card-img-top" alt="">
                                    <div class="p-2">
                                        <h6 class="fw-bold text-white text-center">hello</h6>
                                        <p class="text-center text-white-50 mb-0">200000mmk</p>
                                    </div>
                                    <div class=" justify-content-between d-flex mb-2 px-2">
                                        <button class="btn btn-primary">Detail</button>
                                        <button class="btn btn-primary"><i class="fa-solid fa-cart-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 col-lg-2">
                                <div class="card border-0 bg-black">
                                    <img src="./image/g2.jpg" height="" class=" card-img-top" alt="">
                                    <div class="p-2">
                                        <h6 class="fw-bold text-white text-center">hello</h6>
                                        <p class="text-center text-white-50 mb-0">200000mmk</p>
                                    </div>
                                    <div class=" justify-content-between d-flex mb-2 px-2">
                                        <button class="btn btn-primary">Detail</button>
                                        <button class="btn btn-primary"><i class="fa-solid fa-cart-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 col-lg-2">
                                <div class="card border-0 bg-black">
                                    <img src="./image/g2.jpg" height="" class=" card-img-top" alt="">
                                    <div class="p-2">
                                        <h6 class="fw-bold text-white text-center">hello</h6>
                                        <p class="text-center text-white-50 mb-0">200000mmk</p>
                                    </div>
                                    <div class=" justify-content-between d-flex mb-2 px-2">
                                        <button class="btn btn-primary">Detail</button>
                                        <button class="btn btn-primary"><i class="fa-solid fa-cart-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 col-lg-2">
                                <div class="card border-0 bg-black">
                                    <img src="./image/g2.jpg" height="" class=" card-img-top" alt="">
                                    <div class="p-2">
                                        <h6 class="fw-bold text-white text-center">hello</h6>
                                        <p class="text-center text-white-50 mb-0">200000mmk</p>
                                    </div>
                                    <div class=" justify-content-between d-flex mb-2 px-2">
                                        <button class="btn btn-primary">Detail</button>
                                        <button class="btn btn-primary"><i class="fa-solid fa-cart-plus"></i></button>
                                    </div>
                                </div>
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