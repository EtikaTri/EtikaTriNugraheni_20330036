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
            <hr class="sidebar-divider"></ul>
        <div id="content-wrapper" class="d-flex flex-column">
          
        
                        
<ul class="navbar-nav ml-auto">                       
<div class="card mt-0">
</div>
</ul>

  <div class="card-header bg-dark text-white">

    Data Arsip Surat
  </div>
  <div class="card-body">
    <a href="?halaman=arsip_surat&hal=tambahdata" class="btn btn-success mb-3">Tambah Data</a>
    <table class="table table-borderd table-hovered table-striped">
      <tr>
        <th>No</th>
        <th>No Surat</th>
        <th>Tanggal Surat</th>
        <th>Tanggal Diterima</th>
        <th>Perihal</th>
        <th>Tujuan</th>
        <th>Pengirim</th>
        <th>File</th>
        <th>Aksi</th>
      </tr>
      <?php
          $tampil = mysqli_query($koneksi, "
                    SELECT 
                      tbl_arsip.*,
                      tbl_departemen.nama_departemen,
                      tbl_pengirim_surat.nama_pengirim, tbl_pengirim_surat.no_hp
                    FROM 
                      tbl_arsip, tbl_departemen, tbl_pengirim_surat
                    WHERE 
                      tbl_arsip.id_departemen = tbl_departemen.id_departemen
                      and tbl_arsip.id_pengirim = tbl_pengirim_surat.id_pengirim_surat
                    ");
          $no = 1;
          while ($data=mysqli_fetch_array($tampil)): 
          
      ?>
      <tr>
        <td><?=$no++?></td>
        <td><?=$data['no_surat']?></td>
        <td><?=$data['tanggal_surat']?></td>
        <td><?=$data['tanggal_diterima']?></td>
        <td><?=$data['perihal']?></td>
        <td><?=$data['nama_departemen']?></td>
        <td><?=$data['nama_pengirim']?> / <?=$data['no_hp']?></td>
        <td>
          <?php 
            //uji apakah filenya ada atau tidak
            if (empty($data['file'])) {
              echo " - ";
            }else{

          ?>
            <a href="file/<?=$data['file']?>" target="$_blank">Lihat File </a>
          <?php 
              }
          ?>
        </td>
        <td>
            <a href="?halaman=arsip_surat&hal=edit&id=<?=$data['id_arsip']?>" class="btn btn-warning btn-md" title="Ubah Data"><i class="fa fa-edit"> </i></a>

          <a onclick="return confirm('Apakah anda yakin ingin menghapus data?')" href="?halaman=arsip_surat&hal=hapus&id=<?=$data['id_arsip']?>" class="btn btn-danger btn-md mt-0" title="Hapus Data"><i class="fa fa-trash"> </i></a>

        
        </td>
      </tr>
    <?php endwhile; ?>
    </table>
  </div>
</div>

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

