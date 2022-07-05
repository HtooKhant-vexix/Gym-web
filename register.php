

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container-fluid bgimg">
        <div class="container">
            <div class="row min-vh-100 justify-content-center align-items-center">
                <div class="col-lg-6 col-xl-5">
                    <div class="card border-0 shadow">
                        <div class="card-header border-0 bg-info">
                            <h1 class=" fw-bold text-light text-center" >Create new account</h1>
                        </div>
                        <form action="index.php?page=" method="POST">
                            <div class="card-body bg-secondary p-4">
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" placeholder="Email">
                                        <label for="email">Email address</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="pswd" placeholder="Password">
                                        <label for="pswd">Password</label>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="cpswd" placeholder="Confirm password">
                                        <label for="cpswd">Confirm password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-info d-flex justify-content-between p-4">
                                <a href="login.php" class="text-light">Already have an account?</a>
                                <button class="btn btn-light px-4 py-2" type="submit" name="loginbtn">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>