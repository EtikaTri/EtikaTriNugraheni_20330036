<?php
session_start();
if(isset($_SESSION['username'])) {
    header("Location: login.php");
    die();
}
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
         <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    </head>

   <body class="bg-dark-dark">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-6 col-md-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                            <div class="login-form">
                                <form action="cek_login.php" method="post">
                                    <div class="form-group">
                                        <label><b>Username</b></label>
                                        <input class="form-control form-control-user" type="text" name="username" placeholder="Username ">
                                    </div>
                                    <div class="form-group">
                                        <label><b>Password</b></label>
                                        <input class="form-control form-control-user" type="password" name="password" placeholder="Password ">
                                    </div>
                                    <br>
                                    <div>
                                        <span>
                                        <center>
                                        <button class="btn btn-md btn-outline-danger" type="reset">Reset&nbsp;&nbsp;</button>
                                    </span> &nbsp; &nbsp;
                                        <span>
                                        <button class="btn btn-md btn-outline-primary" type="submit">Login&nbsp;</button>
                                        </center>
                                    </span>
                                    </div>
                                </form>
                                <center>
                                <div class="register-link">
                                    <br>
                                    <p>Sistem Informasi E-Arsip Kalurahan Seloharjo</p>
                                </div>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Jquery JS-->
        <script src="vendor/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap JS-->
        <script src="vendor/bootstrap-4.1/popper.min.js"></script>
        <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
        <!-- Vendor JS       -->
        <script src="vendor/slick/slick.min.js">
        </script>
        <script src="vendor/wow/wow.min.js"></script>
        <script src="vendor/animsition/animsition.min.js"></script>
        <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
        </script>
        <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendor/counter-up/jquery.counterup.min.js">
        </script>
        <script src="vendor/circle-progress/circle-progress.min.js"></script>
        <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="vendor/chartjs/Chart.bundle.min.js"></script>
        <script src="vendor/select2/select2.min.js">
        </script>

        <!-- Main JS-->
        <script src="js/main.js"></script>

        <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
        <script src="alert/js/sweetalert.min.js"></script>
        <script src="alert/js/qunit-1.18.0.js"></script>

    </body>

    </html>
    <!-- end document-->