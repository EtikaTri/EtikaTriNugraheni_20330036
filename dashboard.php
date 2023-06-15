<?php
session_start();
if (empty($_SESSION['id_pengguna']) or empty($_SESSION['username'])) 
{
  echo "<script>
      alert('Maaf, untuk mengakses halaman ini, silahkan login terlebih dahulu..!');
      document.location='login.php';
     </script>";
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

    <title>E-Arsip</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="login.php">
                <div class="sidebar-brand-icon">
                    
                    <i class="fas fa-home"></i>
               
                </div>

                <div class="sidebar-brand-text mx-3">E-Arsip Kalurahan </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- Divider -->
            

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="admin.php?halaman=departemen">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Data Departemen</span></a>

            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="admin.php?halaman=pengirim_surat">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Data Pengirim</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="admin.php?halaman=arsip_surat">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Arsip Surat</span></a>
            </li>

            
        

            <!-- Divider -->
            <hr class="sidebar-divider">

            

            
            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mt-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 pt-2 pb-2 mt-3 text-gray-800">Selamat Datang Admin!</h1>
                    <br>
                    
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                     <!-- Nav Item - User Information -->
                        <a href="logout.php" class="btn btn-danger square-btn-adjust" title="Logout">Logout</a>
                                   
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <marquee behavior="" direction="" style="font-size: 19px; color: maroon;">Selamat Datang Di Sistem Informasi E-Arsip Kalurahan Seloharjo </marquee>

                   
                    <!-- Content Row -->
                    <div class="row">


                    <!-- Earnings (Monthly) Card Example -->
                       <img class="mb-4" src="img/kelurahan.jpg" alt="" width="500" >
                       <!-- Earnings (Monthly) Card Example -->
                       <div class="col-lg-6">
                        <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary text-justify">Luas wilayah Desa Seloharjo adalah 48 hektar, terbagi menjadi 16 Pedukuhan dan 73 RT:</h6>
                                </div>
                        <img class="mb-4" src="img/data.jpg" alt="" width="500">

                        <div class="col-lg-10 width= 300">
                        <div class="card shadow mb-8 width= 500">
                                <div class="card-header py-3 width= 100">
                                    <h6 class="m-0 font-weight-bold text-primary text-center">VISI DAN MISI</h6>
                                </div>
                                <div class="card-body text-drak text-justify">
                                      Filosofi pembangunan Desa Seloharjo digali dari khasanah budaya serta filosofi luhur dari akronim nama Seloharjo, sebagai hasil ide dari para pemangku praja di Desa Seloharjo yang merupakan cita-cita para pemangku praja terdahulu untuk mewujudkan pembangunan dan kemajuan desa.


                                      
                                   
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <!--end-->
                
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            
<footer class="bg-white text-center text-drak pt-2 pb-2 mt-3">Copyright 2023 | E-Arsip</footer>
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                
                <div class="modal-body">Apakah anda yakin ingin keluar ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>