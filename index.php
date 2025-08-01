<?php
require_once 'loader.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <title>
        Register Form
    </title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
    <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.2.0" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="assets/js/main.js">
    </script>
</head>

<body>
    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto mt-5">
        <div class="card card-plain">
            <div class="card-header">
                <h4 class="font-weight-bolder">Register</h4>
            </div>
            <div class="card-body">
                <form action="" method="post" id="form">
                    <div class="input-group input-group-outline mb-3">
                        <input type="text" class="form-control" id="name" placeholder="Full Name" required />
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <input type="email" class="form-control" id="email" placeholder="email@example.com" required />
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <input type="password" class="form-control" id="password" placeholder="Password" required />
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <input type="password" class="form-control" id="confirmpassword" placeholder="Confirm Password" required />
                    </div>
                    <div class="form-check form-check-info text-start ps-0">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                        <label class="form-check-label" for="flexCheckDefault">
                            I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                        </label>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-lg bg-gradient-dark btn-lg w-100 mt-4 mb-0">Sign Up</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <p class="mb-2 text-sm mx-auto">
                    Already have an account?
                    <a href="template/login.php" class="text-primary text-gradient font-weight-bold">Sign in</a>
                </p>
            </div>
        </div>
    </div>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
</body>

</html>