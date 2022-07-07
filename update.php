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
                    <a href="admin-dashboard.php" class="py-3 list-group-item text-white list-group-item-action fw-bold" aria-current="true">
                        Dashboard
                    </a>
                    <a href="user.php" class="py-3 list-group-item list-group-item-action fw-bold text-white border-primary ">User</a>
                    <a href="update.php" class="py-3 list-group-item list-group-item-action fw-bold active text-white border-primary ">Update data</a>
                </div>
            </div>
            <div class="col-8 col-lg-10 overflow-scroll h">
                
            </div>
        </div>
    </div>


    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>