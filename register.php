<?php

require 'function.php'; //untuk menghubungkan dgn function.php

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/login.css">
    <style>
        .btn-blue {
            background-color: #2FA4FF;
            border-radius: 120px;
            color: white;
        }
        .btn-blue:hover {
            background-color : white;
            border : #2FA4FF solid 3px;
            color: #2FA4FF;
        }
    </style>
</head>

<body>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 login-section-wrapper">
                    <div class="row me-5">
                        <img src="img/logo.png" height="80px" width="80px" alt="logo" class="col-3">
                        <p style="font-size: 2rem; font-family:'Roboto Slab', sans-serif;" class="pt-3 col-8">Maps Wisata</p>
                    </div>
                    <div class="login-wrapper my-auto">
                        <form method="post">
                            <div class="form-group">
                                <label for="username">username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="username">
                            </div>
                            <div class="form-group mb-4">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="passsword">
                            </div>
                            <button type="submit" name="register" class="btn btn-blue btn-block w-100">Register </button>
                        </form>
                        <a href="#!" class="forgot-password-link">Forgot password?</a>
                        <p class="login-wrapper-footer-text">Already have an account? <a href="login.php" class="text-reset">Login</a></p>
                    </div>
                </div>
                <div class="col-sm-6 px-0 d-flex justify-content-center" style="background-color: #2FA4FF;">
                    <a href="login.php"><img src="img/sidereg.png" alt="login image" class="vh-100"></a>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>